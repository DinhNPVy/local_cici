<style>
    .pagination1 {
        display: block;
        padding: 5px 10px;
        float: right;
    }

    .pagination1 a {
        background: #f3f3f3;
        border: 1px solid #c4c4c4;
        border-radius: 2px;
        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
        color: #717171;
        display: inline-block;
        float: left;
        font-weight: 700;
        line-height: 25px;
        margin-right: 4px;
        min-height: 25px;
        padding: 0 10px;
        text-decoration: none;
    }

    .pagination1 strong {
        background: #f3f3f3;
        border: 1px solid #c4c4c4;
        border-radius: 2px;
        box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
        color: maroon;
        display: inline-block;
        float: left;
        font-weight: 700;
        line-height: 25px;
        margin-right: 4px;
        min-height: 25px;
        padding: 0 10px;
        text-decoration: none;
    }
</style>
<section class="blog-page">
    <div class="container">
        <div class="heading-sub ver2">
            <h3 class="pull-left">BLOG</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">home</a></li>
                <li><a class="active" href="#blog">blog</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="widget-blog-collection">



            <div class="row top-row-blog-page">
                <?php foreach ($news_list as $row) : ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog-item-ver2">
                            <div class="blog-item img">
                                <a href="#"><img src="<?php echo base_url('upload/news/') . $row->image_link ?>" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="blog-info">
                                <h3><a href="<?php echo $row->link ?>" title=""><?php echo $row->title ?></a></h3>
                                <p class="blog-description"><?php echo $row->content ?></p>
                                <a href="<?php echo $row->link ?>" class="readmore">Continue Reading</a>
                            </div>
                        </div>
                    </div>


                <?php endforeach ?>
            </div>


        </div>


        <div class="pagination1">

            <?php echo $this->pagination->create_links() ?>

        </div>

    </div>
</section>