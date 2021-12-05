<link rel="stylesheet" href="<?php echo public_url() ?>/js/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url() ?>/js/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script>
    (function(d) {
        var e = 0;
        d.widget("ui.autocomplete", {
            options: {
                appendTo: "body",
                autoFocus: false,
                delay: 300,
                minLength: 1,
                position: {
                    my: "left top",
                    at: "left bottom",
                    collision: "none"
                },
                source: null
            },
            pending: 0,
            _create: function() {
                var a = this,
                    b = this.element[0].ownerDocument,
                    g;
                this.element.addClass("ui-autocomplete-input").attr("autocomplete", "off").attr({
                    role: "textbox",
                    "aria-autocomplete": "list",
                    "aria-haspopup": "true"
                }).bind("keydown.autocomplete", function(c) {
                    if (!(a.options.disabled || a.element.propAttr("readOnly"))) {
                        g =
                            false;
                        var f = d.ui.keyCode;
                        switch (c.keyCode) {
                            case f.PAGE_UP:
                                a._move("previousPage", c);
                                break;
                            case f.PAGE_DOWN:
                                a._move("nextPage", c);
                                break;
                            case f.UP:
                                a._move("previous", c);
                                c.preventDefault();
                                break;
                            case f.DOWN:
                                a._move("next", c);
                                c.preventDefault();
                                break;
                            case f.ENTER:
                            case f.NUMPAD_ENTER:
                                if (a.menu.active) {
                                    g = true;
                                    c.preventDefault()
                                }
                                case f.TAB:
                                    if (!a.menu.active) return;
                                    a.menu.select(c);
                                    break;
                                case f.ESCAPE:
                                    a.element.val(a.term);
                                    a.close(c);
                                    break;
                                default:
                                    clearTimeout(a.searching);
                                    a.searching = setTimeout(function() {
                                        if (a.term !=
                                            a.element.val()) {
                                            a.selectedItem = null;
                                            a.search(null, c)
                                        }
                                    }, a.options.delay);
                                    break
                        }
                    }
                }).bind("keypress.autocomplete", function(c) {
                    if (g) {
                        g = false;
                        c.preventDefault()
                    }
                }).bind("focus.autocomplete", function() {
                    if (!a.options.disabled) {
                        a.selectedItem = null;
                        a.previous = a.element.val()
                    }
                }).bind("blur.autocomplete", function(c) {
                    if (!a.options.disabled) {
                        clearTimeout(a.searching);
                        a.closing = setTimeout(function() {
                            a.close(c);
                            a._change(c)
                        }, 150)
                    }
                });
                this._initSource();
                this.response = function() {
                    return a._response.apply(a, arguments)
                };
                this.menu = d("<ul></ul>").addClass("ui-autocomplete").appendTo(d(this.options.appendTo || "body", b)[0]).mousedown(function(c) {
                    var f = a.menu.element[0];
                    d(c.target).closest(".ui-menu-item").length || setTimeout(function() {
                        d(document).one("mousedown", function(h) {
                            h.target !== a.element[0] && h.target !== f && !d.ui.contains(f, h.target) && a.close()
                        })
                    }, 1);
                    setTimeout(function() {
                        clearTimeout(a.closing)
                    }, 13)
                }).menu({
                    focus: function(c, f) {
                        f = f.item.data("item.autocomplete");
                        false !== a._trigger("focus", c, {
                                item: f
                            }) && /^key/.test(c.originalEvent.type) &&
                            a.element.val(f.value)
                    },
                    selected: function(c, f) {
                        var h = f.item.data("item.autocomplete"),
                            i = a.previous;
                        if (a.element[0] !== b.activeElement) {
                            a.element.focus();
                            a.previous = i;
                            setTimeout(function() {
                                a.previous = i;
                                a.selectedItem = h
                            }, 1)
                        }
                        false !== a._trigger("select", c, {
                            item: h
                        }) && a.element.val(h.value);
                        a.term = a.element.val();
                        a.close(c);
                        a.selectedItem = h
                    },
                    blur: function() {
                        a.menu.element.is(":visible") && a.element.val() !== a.term && a.element.val(a.term)
                    }
                }).zIndex(this.element.zIndex() + 1).css({
                    top: 0,
                    left: 0
                }).hide().data("menu");
                d.fn.bgiframe && this.menu.element.bgiframe()
            },
            destroy: function() {
                this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete").removeAttr("role").removeAttr("aria-autocomplete").removeAttr("aria-haspopup");
                this.menu.element.remove();
                d.Widget.prototype.destroy.call(this)
            },
            _setOption: function(a, b) {
                d.Widget.prototype._setOption.apply(this, arguments);
                a === "source" && this._initSource();
                if (a === "appendTo") this.menu.element.appendTo(d(b || "body", this.element[0].ownerDocument)[0]);
                a === "disabled" &&
                    b && this.xhr && this.xhr.abort()
            },
            _initSource: function() {
                var a = this,
                    b, g;
                if (d.isArray(this.options.source)) {
                    b = this.options.source;
                    this.source = function(c, f) {
                        f(d.ui.autocomplete.filter(b, c.term))
                    }
                } else if (typeof this.options.source === "string") {
                    g = this.options.source;
                    this.source = function(c, f) {
                        a.xhr && a.xhr.abort();
                        a.xhr = d.ajax({
                            url: g,
                            data: c,
                            dataType: "json",
                            autocompleteRequest: ++e,
                            success: function(h) {
                                this.autocompleteRequest === e && f(h)
                            },
                            error: function() {
                                this.autocompleteRequest === e && f([])
                            }
                        })
                    }
                } else this.source =
                    this.options.source
            },
            search: function(a, b) {
                a = a != null ? a : this.element.val();
                this.term = this.element.val();
                if (a.length < this.options.minLength) return this.close(b);
                clearTimeout(this.closing);
                if (this._trigger("search", b) !== false) return this._search(a)
            },
            _search: function(a) {
                this.pending++;
                this.element.addClass("ui-autocomplete-loading");
                this.source({
                    term: a
                }, this.response)
            },
            _response: function(a) {
                if (!this.options.disabled && a && a.length) {
                    a = this._normalize(a);
                    this._suggest(a);
                    this._trigger("open")
                } else this.close();
                this.pending--;
                this.pending || this.element.removeClass("ui-autocomplete-loading")
            },
            close: function(a) {
                clearTimeout(this.closing);
                if (this.menu.element.is(":visible")) {
                    this.menu.element.hide();
                    this.menu.deactivate();
                    this._trigger("close", a)
                }
            },
            _change: function(a) {
                this.previous !== this.element.val() && this._trigger("change", a, {
                    item: this.selectedItem
                })
            },
            _normalize: function(a) {
                if (a.length && a[0].label && a[0].value) return a;
                return d.map(a, function(b) {
                    if (typeof b === "string") return {
                        label: b,
                        value: b
                    };
                    return d.extend({
                        label: b.label ||
                            b.value,
                        value: b.value || b.label
                    }, b)
                })
            },
            _suggest: function(a) {
                var b = this.menu.element.empty().zIndex(this.element.zIndex() + 1);
                this._renderMenu(b, a);
                this.menu.deactivate();
                this.menu.refresh();
                b.show();
                this._resizeMenu();
                b.position(d.extend({
                    of: this.element
                }, this.options.position));
                this.options.autoFocus && this.menu.next(new d.Event("mouseover"))
            },
            _resizeMenu: function() {
                var a = this.menu.element;
                a.outerWidth(Math.max(a.width("").outerWidth(), this.element.outerWidth()))
            },
            _renderMenu: function(a, b) {
                var g = this;
                d.each(b, function(c, f) {
                    g._renderItem(a, f)
                })
            },
            _renderItem: function(a, b) {
                return d("<li></li>").data("item.autocomplete", b).append(d("<a></a>").text(b.label)).appendTo(a)
            },
            _move: function(a, b) {
                if (this.menu.element.is(":visible"))
                    if (this.menu.first() && /^previous/.test(a) || this.menu.last() && /^next/.test(a)) {
                        this.element.val(this.term);
                        this.menu.deactivate()
                    } else this.menu[a](b);
                else this.search(null, b)
            },
            widget: function() {
                return this.menu.element
            }
        });
        d.extend(d.ui.autocomplete, {
            escapeRegex: function(a) {
                return a.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,
                    "\\$&")
            },
            filter: function(a, b) {
                var g = new RegExp(d.ui.autocomplete.escapeRegex(b), "i");
                return d.grep(a, function(c) {
                    return g.test(c.label || c.value || c)
                })
            }
        })
    })(jQuery);
    (function(d) {
        d.widget("ui.menu", {
            _create: function() {
                var e = this;
                this.element.addClass("ui-menu ui-widget ui-widget-content ui-corner-all").attr({
                    role: "listbox",
                    "aria-activedescendant": "ui-active-menuitem"
                }).click(function(a) {
                    if (d(a.target).closest(".ui-menu-item a").length) {
                        a.preventDefault();
                        e.select(a)
                    }
                });
                this.refresh()
            },
            refresh: function() {
                var e = this;
                this.element.children("li:not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role", "menuitem").children("a").addClass("ui-corner-all").attr("tabindex",
                    -1).mouseenter(function(a) {
                    e.activate(a, d(this).parent())
                }).mouseleave(function() {
                    e.deactivate()
                })
            },
            activate: function(e, a) {
                this.deactivate();
                if (this.hasScroll()) {
                    var b = a.offset().top - this.element.offset().top,
                        g = this.element.scrollTop(),
                        c = this.element.height();
                    if (b < 0) this.element.scrollTop(g + b);
                    else b >= c && this.element.scrollTop(g + b - c + a.height())
                }
                this.active = a.eq(0).children("a").addClass("ui-state-hover").attr("id", "ui-active-menuitem").end();
                this._trigger("focus", e, {
                    item: a
                })
            },
            deactivate: function() {
                if (this.active) {
                    this.active.children("a").removeClass("ui-state-hover").removeAttr("id");
                    this._trigger("blur");
                    this.active = null
                }
            },
            next: function(e) {
                this.move("next", ".ui-menu-item:first", e)
            },
            previous: function(e) {
                this.move("prev", ".ui-menu-item:last", e)
            },
            first: function() {
                return this.active && !this.active.prevAll(".ui-menu-item").length
            },
            last: function() {
                return this.active && !this.active.nextAll(".ui-menu-item").length
            },
            move: function(e, a, b) {
                if (this.active) {
                    e = this.active[e + "All"](".ui-menu-item").eq(0);
                    e.length ? this.activate(b, e) : this.activate(b, this.element.children(a))
                } else this.activate(b,
                    this.element.children(a))
            },
            nextPage: function(e) {
                if (this.hasScroll())
                    if (!this.active || this.last()) this.activate(e, this.element.children(".ui-menu-item:first"));
                    else {
                        var a = this.active.offset().top,
                            b = this.element.height(),
                            g = this.element.children(".ui-menu-item").filter(function() {
                                var c = d(this).offset().top - a - b + d(this).height();
                                return c < 10 && c > -10
                            });
                        g.length || (g = this.element.children(".ui-menu-item:last"));
                        this.activate(e, g)
                    }
                else this.activate(e, this.element.children(".ui-menu-item").filter(!this.active ||
                    this.last() ? ":first" : ":last"))
            },
            previousPage: function(e) {
                if (this.hasScroll())
                    if (!this.active || this.first()) this.activate(e, this.element.children(".ui-menu-item:last"));
                    else {
                        var a = this.active.offset().top,
                            b = this.element.height();
                        result = this.element.children(".ui-menu-item").filter(function() {
                            var g = d(this).offset().top - a + b - d(this).height();
                            return g < 10 && g > -10
                        });
                        result.length || (result = this.element.children(".ui-menu-item:first"));
                        this.activate(e, result)
                    }
                else this.activate(e, this.element.children(".ui-menu-item").filter(!this.active ||
                    this.first() ? ":last" : ":first"))
            },
            hasScroll: function() {
                return this.element.height() < this.element[d.fn.prop ? "prop" : "attr"]("scrollHeight")
            },
            select: function(e) {
                this._trigger("selected", e, {
                    item: this.active
                })
            }
        })
    })(jQuery);
</script>
<script type="text/javascript">
    $(function() {
        $("#text-search").autocomplete({
            source: "<?php echo site_url('product/search/1') ?>",
        });
    });
</script>

<div class="topbar-mobile hidden-lg hidden-md">
    <div class="active-mobile">
        <div class="language-popup dropdown">
            <a id="label" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
                <span>English</span>
                <span class="ion-chevron-down"></span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="label">
                <li><a href="#">English</a></li>
                <li><a href="#">Vietnamese</a></li>
            </ul>
        </div>
    </div>
    <div class="right-nav">
        <div class="active-mobile">
            <div class="header_user_info popup-over e-scale hidden-lg hidden-md dropdown">
                <div data-toggle="dropdown" class="popup-title dropdown-toggle" title="Account">
                    <i class="ion-android-person"></i><span> Account</span>
                </div>
                <ul class="links dropdown-menu list-unstyled">
                    <li>
                        <a id="customer_login_link" href="#" title="Sign in"><i class="ion-log-in"></i> Login</a>
                    </li>
                    <li>
                        <a id="customer_register_link" href="#" title="Register"><i class="ion-ios-personadd"></i> Register</a>
                    </li>
                    <li>
                        <a class="account" rel="nofollow" href="#" title="My account"><i class="ion-ios-person"></i> My account</a>
                    </li>
                    <li>
                        <a id="wishlist-total" title="Wishlist" href="#"><i class="ion-ios-heart"></i> Wishlist</a>
                    </li>
                    <li>
                        <a href="#" title="Check out"><i class="ion-ios-cart"></i> Check out</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="active-mobile search-popup pull-right">
            <div class="search-popup dropdown" data-toggle="modal" data-target="#myModal">
                <i class="ion-search fa-3a"></i>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="top-nav v2 hidden-xs hidden-sm">
    <div class="container">
        <div class="row">

            <div class="col-md-5 col-sm-5">
                <div class="left-nav">
                    <div class="location dropdown">
                        <a id="label1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="icon"><i class="ion-ios-location" aria-hidden="true"></i></span>
                            <span>Our Store</span>
                            <span class="ion-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="label1">
                            <li><a href="#">New York</a></li>
                            <li><a href="#">California</a></li>
                        </ul>
                    </div>
                    <div class="language dropdown">
                        <a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
                            <span>English</span>
                            <span class="ion-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="label2">
                            <li><a href="#">English</a></li>
                            <li><a href="#">Vietnamese</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-7">
                <div class="right-nav">
                    <ul>
                        <?php if (isset($user_info)) : ?>
                            <li><a href="<?php echo site_url('user/index') ?>"><i class="ion-ios-personadd fa-1a" aria-hidden="true"></i><?php echo $user_info->name ?></a></li>

                            <li><a href="<?php echo site_url('user/logout') ?>"><i class="ion-log-in fa-1a" aria-hidden="true"></i>logout</a></li>
                        <?php else : ?>
                            <li><a href="<?php echo site_url('user/register') ?>"><i class="ion-ios-personadd fa-1a" aria-hidden="true"></i>create account</a></li>
                            <li><a href="<?php echo site_url('user/login') ?>"><i class="ion-log-in fa-1a" aria-hidden="true"></i>login</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="nav-search" id="search">
                        <form action="<?php echo site_url('product/search') ?>" class="search-form v3" method="get">
                            <input type="text" name="s" role="textbox" class="ui-autocomplete-input form-control" aria-haspopup="true" aria-autocomplete="list" placeholder="Search..." value="<?php echo isset($key) ? $key : "" ?>" id="text-search" autocomplete="off">
                            <button type="submit" class="search-icon v3 fa-3"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-8 col-xs-8  logo">
                <a href="<?php echo base_url() ?>" title="Localware electronics store"><img style="border-radius: 50%; height: 120px" src="<?php echo public_url() ?>site/image/logo.png" alt="images" class="img-reponsive"></a>
            </div>
            <div class="col-md-9 col-sm-4 col-xs-4  nextlogo">
                <div class="block block-2 v3">
                    <div class="cart">

                        <a href="<?php echo base_url('cart') ?>" title="" id="cart" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="photo photo-cart">
                                <img src="<?php echo public_url() ?>site/image/cart.png" alt="images" class="img-reponsive">
                                <span class="lbl"><?php echo $total_items ?></span>
                            </div>
                            <p class="inform inform-cart">
                                <span class="strong">CART<br></span>

                                <!-- <span class="price-cart"><?php echo number_format($total_amount) ?> VNĐ</span> -->

                            </p>
                        </a>

                        <div class="dropdown-menu dropdown-cart" aria-labelledby="label2">
                            <ul>
                                <li>
                                    <div class="item-order">
                                        <div class="item-photo">
                                            <a href="#"><img src="<?php echo public_url() ?>/site/image/cart1.png" alt="images" class="img-responsive"></a>
                                        </div>
                                        <div class="item-content">
                                            <h3><a href="#" title="">iPad Pro MLMX2CL/A</a></h3>
                                            <p class="price black">$199.69</p>
                                            <p class="quantity">x1</p>
                                        </div>
                                    </div>
                                    <div class="btn-delete"><a href="#" title="" class="btndel">x</a></div>
                                </li>
                                <li>
                                    <div class="item-order">
                                        <div class="item-photo">
                                            <a href="#"><img src="<?php echo public_url() ?>/site/image/cart1.png" alt="images" class="img-responsive"></a>
                                        </div>
                                        <div class="item-content">
                                            <h3><a href="#" title="">iPad Pro MLMX2CL/A</a></h3>
                                            <p class="price black">$199.69</p>
                                            <p class="quantity">x1</p>
                                        </div>
                                    </div>
                                    <div class="btn-delete"><a href="#" title="" class="btndel">x</a></div>
                                </li>
                            </ul>
                            <div class="content-1">
                                <span class="total">Total: <strong class="price black">$399.00</strong></span>
                                <span class="quantity"><strong class="number">02</strong> products</span>
                            </div>
                            <div class="content-2">
                                <a href="#" class="addcart">ADD TO CART</a>
                                <a href="#" class="viewcart">View Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block block-option">
                    <ul>
                        <li><a href="#"><i class="ion-ios-heart fa-1a" aria-hidden="true"></i>Wishlist</a></li>
                        <li><a href="#"><i class="ion-arrow-swap fa-1a" aria-hidden="true"></i>Compare</a></li>
                    </ul>
                </div>
                <div class="block block-1">
                    <div class="shipping">
                        <div class="photo">
                            <svg width="62" height="30" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 245.91">
                                <title>delivery-truck</title>
                                <path d="M509.47,256.39l-59.39-67.8a10.2,10.2,0,0,0-7.67-3.48H393V143.24a10.2,10.2,0,0,0-10.2-10.2H172.11a10.2,10.2,0,0,0-10.2,10.2V157H63.82a10.2,10.2,0,0,0,0,20.4h98.09V309.61h-59a10.2,10.2,0,0,0,0,20.4h59v10.36a10.2,10.2,0,0,0,10.2,10.2H193.4a38.57,38.57,0,0,0,74.41,0H403.89a38.57,38.57,0,0,0,74.41,0h23.5a10.2,10.2,0,0,0,10.2-10.2V263.11A10.21,10.21,0,0,0,509.47,256.39ZM230.6,358.56a18.18,18.18,0,1,1,18.18-18.18A18.2,18.2,0,0,1,230.6,358.56Zm37.2-28.38a38.57,38.57,0,0,0-74.41,0H182.31V153.44H372.55V330.18Zm173.29,28.38a18.18,18.18,0,1,1,18.18-18.18A18.2,18.2,0,0,1,441.09,358.56Zm50.51-28.38H478.3a38.57,38.57,0,0,0-74.41,0H393V205.51h44.83l53.82,61.44v63.23Z" transform="translate(0 -133.04)" />
                                <path d="M69.26,309.61H63.82a10.2,10.2,0,0,0,0,20.4h5.44a10.2,10.2,0,0,0,0-20.4Z" transform="translate(0 -133.04)" />
                                <path d="M119.5,232.28H10.2a10.2,10.2,0,0,0,0,20.4H119.5a10.2,10.2,0,1,0,0-20.4Z" transform="translate(0 -133.04)" />
                            </svg>
                        </div>
                        <p class="inform">
                            <span class="strong">FREE SHIPPING <br></span> > $100 Order
                        </p>
                    </div>
                    <div class="protect">
                        <div class="photo">
                            <svg width="28" height="33" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 214.3 214.3" style="enable-background:new 0 0 214.3 214.3;" xml:space="preserve">
                                <g>
                                    <path d="M196.9,55.2c-0.1-5.8-0.2-11.2-0.2-16.5c0-4.1-3.4-7.5-7.5-7.5c-32.1,0-56.5-9.2-76.9-29c-2.9-2.8-7.5-2.8-10.5,0
                                                c-20.4,19.8-44.8,29-76.8,29c-4.1,0-7.5,3.4-7.5,7.5c0,5.3-0.1,10.8-0.2,16.5c-1,53.8-2.4,127.6,87.3,158.7
                                                c0.8,0.3,1.6,0.4,2.5,0.4s1.7-0.1,2.5-0.4C199.4,182.7,198,109,196.9,55.2z M107.1,198.8c-77-28-75.8-89.2-74.8-143.4
                                                c0.1-3.2,0.1-6.4,0.2-9.5c30-1.3,54.1-10.4,74.6-28.3c20.6,17.9,44.6,27,74.6,28.3c0,3.1,0.1,6.2,0.2,9.5
                                                C183,109.6,184.1,170.8,107.1,198.8z" />
                                    <path d="M133,81.1l-36.2,36.2l-15.4-15.4c-2.9-2.9-7.7-2.9-10.6,0c-2.9,2.9-2.9,7.7,0,10.6l20.8,20.7c1.5,1.5,3.4,2.2,5.3,2.2
                                                s3.8-0.7,5.3-2.2l41.5-41.5c2.9-2.9,2.9-7.7,0-10.6C140.6,78.2,135.9,78.2,133,81.1z" />
                                </g>
                            </svg>
                        </div>
                        <p class="inform">
                            <span class="strong">Infomation<br></span> Protected
                        </p>
                    </div>
                    <div class="return">
                        <div class="photo">
                            <svg width="30" height="30" id="Capa_2" data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 612.85">
                                <title>update-arrows</title>
                                <path d="M600.48,221.79c-14.43-50.5-40.14-94.33-77.94-132.13a300.48,300.48,0,0,0-100-66.57C385,7.84,346.58,0,306.78,0V37.47c69.91,0,138.93,27,190,78.28A264.15,264.15,0,0,1,564.7,231.16c12.55,43.87,14.38,88,4.68,132.47A261.77,261.77,0,0,1,509.83,482l-52.18-51.18V558.33l130.13,2-52.18-52.18Q587.78,448.93,604.84,373A301.45,301.45,0,0,0,600.48,221.79Z" transform="translate(-0.43)" />
                                <path d="M47.85,382A267.44,267.44,0,0,1,43.5,249.56,263.58,263.58,0,0,1,103.38,130.8l52.18,51.85V54.53L25.44,53.19l51.85,51.52Q25.11,163.92,8,239.85a301.82,301.82,0,0,0,4.35,151.54c14.34,50.2,40.14,94,77.95,131.81a300.35,300.35,0,0,0,100,66.57,306.59,306.59,0,0,0,116.42,23.08v-36.8a267,267,0,0,1-190.35-78.94C83.54,464.09,60.41,425.9,47.85,382Z" transform="translate(-0.43)" />
                            </svg>
                        </div>
                        <p class="inform">
                            <span class="strong">Free<br></span> Return
                        </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="menu v3">
    <div class="container">
        <div class="row row-no-padding">
            <div class="col-md-3 col-sm-4 col-xs-6 column-left v3">
                <aside id="column-left">
                    <nav class="navbar-default">
                        <div class="menu-heading v3 js-nav-menu ">ALL CATEGORIES</div>
                        <div class="vertical-wrapper v3 js-dropdown-menu js-dropdown-open active">
                            <ul class="level0">
                                <?php foreach ($catalog_list as $row) : ?>

                                    <li class="game">
                                        <a href="<?php echo base_url('product/catalog/' . $row->id) ?>"><?php echo $row->name ?></a>
                                        <div class="dropdown-content">

                                            <ul class="level1">

                                                <li class="sub-menu col-3">
                                                    <a href="<?php echo base_url('product/catalog/' . $row->id) ?>"><?php echo $row->name ?></a>
                                                    <?php if (!empty($row->subs)) : ?>
                                                        <ul class="level2">
                                                            <?php foreach ($row->subs as $sub) : ?>
                                                                <li class="col-inner"><a href="<?php echo base_url('product/catalog/' . $sub->id) ?>" title="<?php echo $sub->name ?>"><?php echo $sub->name ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>

                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="banner">
                                                <a href="#"><img src="<?php echo public_url() ?>/site/image/megamenubanner.png" alt="images" class="img-responsive"></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="sub-form-li" style="background: url(<?php echo public_url() ?>/site/image/menubg.jpg)" style="center; no-repeat;">
                                    <div>
                                        Welcome
                                    </div>
                                    <form action="#" class="sub-form">
                                        <input type="text" name="e" class="form-control" placeholder="Choose the category....">
                                        <button type="submit" class="btn btn-sub">Thank you <span class="ion-chevron-right"></span></button>
                                    </form>

                                </li>

                            </ul>

                        </div>
                    </nav>
                </aside>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-6 column-right v3">
                <button type="button" class="navbar-toggle v3" data-toggle="collapse" data-target="#myNavbar">
                    <span class="menu-title">MENU</span>
                </button>
                <div class="collapse navbar-collapse v3" id="myNavbar">
                    <ul class="menubar v3 js-menubar">
                        <li class=" menu-homepage menu-item-has-child dropdown">
                            <a href="<?php echo base_url() ?>" title="Home"><i class="fa fa-home"></i>home</a>
                            <span class="plus js-plus-icon"></span>

                        </li>
                        <li class="menu-collection-page menu-item-has-child dropdown">
                            <a href="<?php echo site_url('product/market') ?>" title="Marketplace">marketplace</a>

                        </li>
                        <li class=" menu-demo-page menu-item-has-child dropdown">
                            <a href="#" title="Sellerdemo">SELLER DEMO</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="dropdown-menu dropdown-menu-bg">
                                <ul class="level1">
                                    <li class="sub-menu col-3">
                                        <a href="#">Cart pages</a>
                                        <ul class="level2">
                                            <li class="col-inner"><a href="checkout-1.html" title="">Shopping Cart</a></li>
                                            <li class="col-inner"><a href="checkout-2.html" title="">Check Out</a></li>
                                            <li class="col-inner"><a href="checkout-3.html" title="">Order</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu col-3">
                                        <a href="#">Product Pages</a>
                                        <ul class="level2">
                                            <li class="col-inner"><a href="shop-single.html" title="">Shop Single V1</a></li>
                                            <li class="col-inner"><a href="shop-single-v2.html" title="">Shop Single V2</a></li>
                                            <li class="col-inner"><a href="#" title="">Shop Single V3</a></li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu col-3">
                                        <a href="#">NEW Arrival</a>
                                        <ul class="level2">
                                            <li class="text-center"><a href="comming-soon.html"><img src="<?php echo public_url() ?>/site/image/megaimg.png" alt="images" class="img-responsive"></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="dropdown menu-contact-page menu-item-has-child">
                            <a href="<?php echo base_url('contact/index') ?>" title="ContactUs">CONTACT US</a>

                        </li>
                        <li class="dropdown menu-blog-page menu-item-has-child">
                            <a href="<?php echo site_url('news/blog') ?>" title="Blog">blog</a>

                        </li>
                        <li class="dropdown menu-others-page menu-item-has-child"><a href="#" title="Others">others</a>
                            <span class="plus js-plus-icon"></span>
                            <ul class="dropdown-menu menu-level menu-level-last">
                                <li><a href="404.html" title="error page">404</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>