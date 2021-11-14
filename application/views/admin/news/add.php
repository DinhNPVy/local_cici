<head>
    <?php $this->load->view('admin/news/head', $this->data); ?>
</head>

<style>
    .wrapper {
        position: relative;
        margin: 0 3%;
    }

    .widget .title:first-child,
    ul.tabs,
    .toggle .title:first-child {
        -webkit-border-top-right-radius: 3px;
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topright: 3px;
        -moz-border-radius-topleft: 3px;
    }

    .widget {
        background: #f9f9f9;
        border: 1px solid #cdcdcd;
        margin-top: 10px;
        clear: both;
    }

    .widget .title {
        height: 36px;
        background: #efefef url(../assets/img/titleBg.png) repeat-x;
        border-bottom: 1px solid #cdcdcd;
    }

    .widget .title h6 {
        float: left;
        font-size: 12px;
        font-weight: bold;
        padding: 9px 12px 8px 12px;
    }

    .widget .title .titleIcon {
        float: left;
        padding: 11px 11px;
        border-right: 1px solid #D5D5D5;
    }

    .middleNav,
    .widget,
    .sItem,
    .statsDetailed,
    .statsContent,
    .nav li a strong,
    .controlB ul li,
    .toggle,
    .smalldd ul li a strong {
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        -khtml-border-radius: 3px;
        border-radius: 3px;
    }

    .widget,
    .middleNav,
    .sItem,
    .statsDetailed {
        box-shadow: 0 1px 0 #fff;
        -moz-box-shadow: 0 1px 0 #fff;
        -webkit-box-shadow: 0 1px 0 #fff;
    }

    .wButton,
    .nNote,
    .widget .num a,
    .tag,
    a.sButton,
    .tooltip,
    .tPagination ul li a,
    .bc,
    .pages li a,
    .smallButton,
    .search-choice,
    .horControlB ul li,
    .gallery ul li,
    .iconsGroup,
    .logMeIn,
    .wContentButton {
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -khtml-border-radius: 2px;
        border-radius: 2px;
    }

    .widget .title:first-child,
    ul.tabs,
    .toggle .title:first-child {
        -webkit-border-top-right-radius: 3px;
        -webkit-border-top-left-radius: 3px;
        -moz-border-radius-topright: 3px;
        -moz-border-radius-topleft: 3px;
    }


    .tab_container {
        overflow: hidden;
        width: 100%;
    }

    .formRow {
        padding: 15px 14px;
        clear: both;
        border-bottom: 1px solid #E2E2E2;
        border-top: 1px solid white;
        position: relative;
    }

    .formRow:first-child {
        border-top: none;
    }

    .formRow:last-child {
        border-bottom: none;
    }

    .ui-formwizard .formRow:last-child {
        border-bottom: 1px solid #E2E2E2;
    }

    .wizButtons {
        border-top: 1px solid #fff;
    }

    .formRow .inputImg {
        position: absolute;
        top: 29px;
        right: 25px;
    }

    .formRow .labelImg {
        float: left;
        margin: 2px 10px 0 0;
    }

    .formRow>label {
        padding: 4px 0;
        display: block;
        float: left;
    }

    .formRight label {
        float: left;
        margin-right: 24px;
        padding: 2px 0;
        cursor: pointer;
    }

    .formNote {
        display: block;
        text-align: left;
        font-size: 11px;
        padding-top: 5px;
        color: #939393;
    }

    .formRow .formRight {
        display: block;
        float: right;
        width: 80%;
        margin-right: 18px;
    }

    .formSubmit {
        display: block;
        float: right;
        margin: 14px 18px;
    }

    /* Tabs */

    ul.tabs {
        background: url(../assets/img/titleBg.png) repeat-x;
        height: 36px;
        border-bottom: 1px solid #CDCDCD;
    }

    ul.tabs li {
        float: left;
        height: 36px;
        line-height: 38px;
        border-left: none;
        overflow: hidden;
        position: relative;
        font-size: 15px;
        border-right: 1px solid #cdcdcd;
    }

    ul.tabs li a {
        display: block;
        padding: 0px 12px;
        outline: none;
        color: #424242;
        font-size: 12px;
        font-weight: bold;
    }

    ul.tabs li a:hover {
        color: #797979;
    }

    html ul.tabs li.activeTab {
        background-color: #f9f9f9;
        height: 37px;
    }

    .rightTabs .activeTab {
        height: 36px !important;
    }

    html ul.tabs li.activeTab a {
        color: #2E6B9B;
    }

    .tab_container {
        overflow: hidden;
        width: 100%;
    }

    .tab_content {
        padding: 10px 12px;
    }

    .rightTabs {
        position: relative;
    }

    .rightTabs ul.tabs {
        float: right;
        background: none;
        height: 38px;
        position: absolute;
        top: 0;
        right: 0;
        border-bottom: none;
    }

    .rightTabs ul.tabs li {
        border-left: 1px solid #cdcdcd;
        border-right: none;
    }

    /* Tabs attributes*/
    table.attributes td {
        padding: 10px;
    }

    table.attributes tr.head td {
        font-weight: bold;
    }

    ul.tab-attr {
        border-top: 1px solid #CDCDCD;
        border-left: 1px solid #CDCDCD;
    }

    ul.tab-attr li {
        border-left: medium none;
        border-right: 1px solid #CDCDCD;
        font-size: 15px;
        line-height: 38px;
        background: url(../assets/img/titleBg.png) repeat-x;
        height: 38px;
        border-bottom: 1px solid #CDCDCD;
    }

    ul.tab-attr li a {
        display: block;
        font-size: 12px;
        font-weight: bold;
        outline: medium none;
        padding: 0 12px;
    }

    ul.tab-attr li a.selected {
        color: #9F352B;
        font-weight: bold;
        background: #F9F9F9;
        border-right: 3px solid #9F352B;
    }
</style>


<div class="line"></div>



<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('news/add') ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class=" title card-header text-center pt-1">
                    <h5>Add New Post</h5>
                </div>


                <div class="mt-2 position-relative text-center">
                    <p class="text-sm font-weight-bold mb-1 text-secondary text-border d-inline z-index-2 bg-white px-3">
                        New
                    </p>
                </div>

                <ul class="tabs">
                    <li class="activeTab"><a href="#tab1">Information</a></li>
                    <li class=""><a href="#tab2">SEO Onpage</a></li>
                    <li class=""><a href="#tab3">Posts</a></li>

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Title:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input class="form-control" type="text" _autocheck="true" id="param_title" name="title"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Link:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input class="form-control" type="text" _autocheck="true" id="param_link" name="link"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Photo:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left">
                                    <input class="form-control" type="file" name="image" id="image" size="25">
                                </div>
                                <div class="clear error" name="image_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab2" style="display: none;">



                        <div class="formRow">
                            <label for="param_meta_desc" class="formLeft">Meta description:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc" class="form-control"></textarea></span>
                                <span class="autocheck" name="meta_desc_autocheck"></span>
                                <div class="clear error" name="meta_desc_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key" class="form-control"></textarea></span>
                                <span class="autocheck" name="meta_key_autocheck"></span>
                                <div class="clear error" name="meta_key_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab3" style="display: none;">
                        <div class="formRow">
                            <label class="formLeft">Content:</label>
                            <div class="formRight">
                                <textarea class="form-control" class="editor" id="param_content" name="content"></textarea>
                                <div class="clear error" name="content_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>
                    <div class="formSubmit">
                        <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Save" />

                    </div>

                </div><!-- End tab_container-->


                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
    <script src="<?php echo public_url('admin/assets') ?>/js/core/jquery-1.11.1.min.js"> </script>
    <script>
        $.fn.contentTabs = function() {
            $(this).find(".tab_content").hide(); //Hide all content
            $(this).find("ul.tabs li:first").addClass("activeTab").show(); //Activate first tab
            $(this).find(".tab_content:first").show(); //Show first tab content

            $("ul.tabs li").click(function() {
                $(this).parent().parent().find("ul.tabs li").removeClass("activeTab"); //Remove any "active" class
                $(this).addClass("activeTab"); //Add "active" class to selected tab
                $(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
                var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
                $(activeTab).show(); //Fade in the active content
                return false;
            });
        };
    </script>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var main = $('#form');
                // Tabs
                main.contentTabs();
            });
        })(jQuery);
    </script>

    <script script src="<?php echo public_url('js/jquery/number') ?>/jquery.number.js"></script>
    <script script src="<?php echo public_url('js') ?>/custom_admin.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"> </script>
    <script>
        $.fn.number = function(number, decimals, dec_point, thousands_sep) {

            // Enter the default thousands separator, and the decimal placeholder.
            thousands_sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
            dec_point = (typeof dec_point === 'undefined') ? '.' : dec_point;
            decimals = (typeof decimals === 'undefined') ? 0 : decimals;

            // Work out the unicode character for the decimal placeholder.
            var u_dec = ('\\u' + ('0000' + (dec_point.charCodeAt(0).toString(16))).slice(-4)),
                regex_dec_num = new RegExp('[^' + u_dec + '0-9]', 'g'),
                regex_dec = new RegExp(u_dec, 'g');

            // If we've specified to take the number from the target element,
            // we loop over the collection, and get the number.
            if (number === true) {
                // If this element is a number, then we add a keyup
                if (this.is('input:text')) {
                    // Return the jquery collection.
                    return this.on({

                            /**
                             * Handles keyup events, re-formatting numbers.
                             *
                             * @param object e			: the keyup event object.s
                             *
                             * @return void;
                             */
                            'keydown.format': function(e) {

                                // Define variables used in the code below.
                                var $this = $(this),
                                    data = $this.data('numFormat'),
                                    code = (e.keyCode ? e.keyCode : e.which),
                                    chara = '', //unescape(e.originalEvent.keyIdentifier.replace('U+','%u')),
                                    start = getSelection.apply(this, ['start']),
                                    end = getSelection.apply(this, ['end']),
                                    val = '',
                                    setPos = false;

                                // Webkit (Chrome & Safari) on windows screws up the keyIdentifier detection
                                // for numpad characters. I've disabled this for now, because while keyCode munging
                                // below is hackish and ugly, it actually works cross browser & platform.

                                //	    				if( typeof e.originalEvent.keyIdentifier !== 'undefined' )
                                //	    				{
                                //	    					chara = unescape(e.originalEvent.keyIdentifier.replace('U+','%u'));
                                //	    				}
                                //	    				else
                                //	    				{
                                if (_keydown.codes.hasOwnProperty(code)) {
                                    code = _keydown.codes[code];
                                }
                                if (!e.shiftKey && (code >= 65 && code <= 90)) {
                                    code += 32;
                                } else if (!e.shiftKey && (code >= 69 && code <= 105)) {
                                    code -= 48;
                                } else if (e.shiftKey && _keydown.shifts.hasOwnProperty(code)) {
                                    //get shifted keyCode value
                                    chara = _keydown.shifts[code];
                                }

                                if (chara == '') chara = String.fromCharCode(code);
                                //	    				}




                                // Stop executing if the user didn't type a number key, a decimal character, or backspace.
                                if (code !== 8 && chara != dec_point && !chara.match(/[0-9]/)) {
                                    // We need the original keycode now...
                                    var key = (e.keyCode ? e.keyCode : e.which);
                                    if ( // Allow control keys to go through... (delete, etc)
                                        key == 46 || key == 8 || key == 9 || key == 27 || key == 13 ||
                                        // Allow: Ctrl+A, Ctrl+R
                                        ((key == 65 || key == 82) && (e.ctrlKey || e.metaKey) === true) ||
                                        // Allow: Ctrl+V, Ctrl+C
                                        ((key == 86 || key == 67) && (e.ctrlKey || e.metaKey) === true) ||
                                        // Allow: home, end, left, right
                                        ((key >= 35 && key <= 39))
                                    ) {
                                        return;
                                    }
                                    // But prevent all other keys.
                                    e.preventDefault();
                                    return false;
                                }

                                //console.log('Continuing on: ', code, chara);

                                // The whole lot has been selected, or if the field is empty, and the character
                                if ((start == 0 && end == this.value.length || $this.val() == 0) && !e.metaKey && !e.ctrlKey && !e.altKey && chara.length === 1 && chara != 0) {
                                    // Blank out the field, but only if the data object has already been instanciated.
                                    start = end = 1;
                                    this.value = '';

                                    // Reset the cursor position.
                                    data.init = (decimals > 0 ? -1 : 0);
                                    data.c = (decimals > 0 ? -(decimals + 1) : 0);
                                    setSelectionRange.apply(this, [0, 0]);
                                }

                                // Otherwise, we need to reset the caret position
                                // based on the users selection.
                                else {
                                    data.c = end - this.value.length;
                                }

                                // If the start position is before the decimal point,
                                // and the user has typed a decimal point, we need to move the caret
                                // past the decimal place.
                                if (decimals > 0 && chara == dec_point && start == this.value.length - decimals - 1) {
                                    data.c++;
                                    data.init = Math.max(0, data.init);
                                    e.preventDefault();

                                    // Set the selection position.
                                    setPos = this.value.length + data.c;
                                }

                                // If the user is just typing the decimal place,
                                // we simply ignore it.
                                else if (chara == dec_point) {
                                    data.init = Math.max(0, data.init);
                                    e.preventDefault();
                                }

                                // If hitting the delete key, and the cursor is behind a decimal place,
                                // we simply move the cursor to the other side of the decimal place.
                                else if (decimals > 0 && code == 8 && start == this.value.length - decimals) {
                                    e.preventDefault();
                                    data.c--;

                                    // Set the selection position.
                                    setPos = this.value.length + data.c;
                                }

                                // If hitting the delete key, and the cursor is to the right of the decimal
                                // (but not directly to the right) we replace the character preceeding the
                                // caret with a 0.
                                else if (decimals > 0 && code == 8 && start > this.value.length - decimals) {
                                    if (this.value === '') return;

                                    // If the character preceeding is not already a 0,
                                    // replace it with one.
                                    if (this.value.slice(start - 1, start) != '0') {
                                        val = this.value.slice(0, start - 1) + '0' + this.value.slice(start);
                                        $this.val(val.replace(regex_dec_num, '').replace(regex_dec, dec_point));
                                    }

                                    e.preventDefault();
                                    data.c--;

                                    // Set the selection position.
                                    setPos = this.value.length + data.c;
                                }

                                // If the delete key was pressed, and the character immediately
                                // before the caret is a thousands_separator character, simply
                                // step over it.
                                else if (code == 8 && this.value.slice(start - 1, start) == thousands_sep) {
                                    e.preventDefault();
                                    data.c--;

                                    // Set the selection position.
                                    setPos = this.value.length + data.c;
                                }

                                // If the caret is to the right of the decimal place, and the user is entering a
                                // number, remove the following character before putting in the new one. 
                                else if (
                                    decimals > 0 &&
                                    start == end &&
                                    this.value.length > decimals + 1 &&
                                    start > this.value.length - decimals - 1 && isFinite(+chara) &&
                                    !e.metaKey && !e.ctrlKey && !e.altKey && chara.length === 1
                                ) {
                                    // If the character preceeding is not already a 0,
                                    // replace it with one.
                                    if (end === this.value.length) {
                                        val = this.value.slice(0, start - 1);
                                    } else {
                                        val = this.value.slice(0, start) + this.value.slice(start + 1);
                                    }

                                    // Reset the position.
                                    this.value = val;
                                    setPos = start;
                                }

                                // If we need to re-position the characters.
                                if (setPos !== false) {
                                    //console.log('Setpos keydown: ', setPos );
                                    setSelectionRange.apply(this, [setPos, setPos]);
                                }

                                // Store the data on the element.
                                $this.data('numFormat', data);

                            },

                            /**
                             * Handles keyup events, re-formatting numbers.
                             *
                             * @param object e			: the keyup event object.s
                             *
                             * @return void;
                             */
                            'keyup.format': function(e) {

                                // Store these variables for use below.
                                var $this = $(this),
                                    data = $this.data('numFormat'),
                                    code = (e.keyCode ? e.keyCode : e.which),
                                    start = getSelection.apply(this, ['start']),
                                    setPos;

                                // Stop executing if the user didn't type a number key, a decimal, or a comma.
                                if (this.value === '' || (code < 48 || code > 57) && (code < 96 || code > 105) && code !== 8) return;

                                // Re-format the textarea.
                                $this.val($this.val());

                                if (decimals > 0) {
                                    // If we haven't marked this item as 'initialised'
                                    // then do so now. It means we should place the caret just 
                                    // before the decimal. This will never be un-initialised before
                                    // the decimal character itself is entered.
                                    if (data.init < 1) {
                                        start = this.value.length - decimals - (data.init < 0 ? 1 : 0);
                                        data.c = start - this.value.length;
                                        data.init = 1;

                                        $this.data('numFormat', data);
                                    }

                                    // Increase the cursor position if the caret is to the right
                                    // of the decimal place, and the character pressed isn't the delete key.
                                    else if (start > this.value.length - decimals && code != 8) {
                                        data.c++;

                                        // Store the data, now that it's changed.
                                        $this.data('numFormat', data);
                                    }
                                }

                                //console.log( 'Setting pos: ', start, decimals, this.value.length + data.c, this.value.length, data.c );

                                // Set the selection position.
                                setPos = this.value.length + data.c;
                                setSelectionRange.apply(this, [setPos, setPos]);
                            },

                            /**
                             * Reformat when pasting into the field.
                             *
                             * @param object e 		: jQuery event object.
                             *
                             * @return false : prevent default action.
                             */
                            'paste.format': function(e) {

                                // Defint $this. It's used twice!.
                                var $this = $(this),
                                    original = e.originalEvent,
                                    val = null;

                                // Get the text content stream.
                                if (window.clipboardData && window.clipboardData.getData) { // IE
                                    val = window.clipboardData.getData('Text');
                                } else if (original.clipboardData && original.clipboardData.getData) {
                                    val = original.clipboardData.getData('text/plain');
                                }

                                // Do the reformat operation.
                                $this.val(val);

                                // Stop the actual content from being pasted.
                                e.preventDefault();
                                return false;
                            }

                        })

                        // Loop each element (which isn't blank) and do the format.
                        .each(function() {

                            var $this = $(this).data('numFormat', {
                                c: -(decimals + 1),
                                decimals: decimals,
                                thousands_sep: thousands_sep,
                                dec_point: dec_point,
                                regex_dec_num: regex_dec_num,
                                regex_dec: regex_dec,
                                init: false
                            });

                            // Return if the element is empty.
                            if (this.value === '') return;

                            // Otherwise... format!!
                            $this.val($this.val());
                        });
                } else {
                    // return the collection.
                    return this.each(function() {
                        var $this = $(this),
                            num = +$this.text().replace(regex_dec_num, '').replace(regex_dec, '.');
                        $this.number(!isFinite(num) ? 0 : +num, decimals, dec_point, thousands_sep);
                    });
                }
            }

            // Add this number to the element as text.
            return this.text($.number.apply(window, arguments));
        };
    </script>
    <script>
        $('.format_number').number(true);
    </script> -->




</div>
<div class="clear mt30"></div>