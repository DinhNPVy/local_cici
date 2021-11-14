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
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class=" title card-header text-center pt-1">
                    <h5>Edit Post</h5>
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
                                <span class="oneTwo"><input class="form-control" type="text" _autocheck="true" id="param_title" value="<?php echo $news->title ?>" name="title"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Link:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input class="form-control" type="text" _autocheck="true" id="param_link" name="link" value="<?php echo $news->link ?>"></span>
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
                                    <img src="<?php echo base_url('upload/news/' . $news->image_link) ?>" style="width: 185px; margin: 5px" alt="">
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
                                <span class="oneTwo"><textarea cols="" rows=" 4" _autocheck="true" id="param_meta_desc" name="meta_desc" class="form-control"><?php echo $news->meta_desc ?></textarea></span>
                                <span class="autocheck" name="meta_desc_autocheck"></span>
                                <div class="clear error" name="meta_desc_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows=" 4" _autocheck="true" id="param_meta_key" name="meta_key" class="form-control"><?php echo $news->meta_key ?></textarea></span>
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
                                <textarea class=" form-control" class="editor" id="param_content" name="content"><?php echo $news->content ?></textarea>
                                <div class="clear error" name="content_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>
                    <div class="formSubmit">
                        <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Update" />

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

    <script script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script>
        $.fn.digits = function() {
            return this.each(function() {
                $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            })
        }
    </script>




</div>
<div class="clear mt30"></div>