<div class="container">
    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12">
            <div class="heading-v2">
                <ul class="breadcrumb-ver1">
                    <!-- <li class="active"><a data-toggle="pill" href="#popular">popular</a></li>
                        -->
                    <li class="active"><a data-toggle="pill" href="#new">newest</a></li>
                    <!-- <li><a data-toggle="pill" href="#top">top rated</a></li> -->
                </ul>
            </div>
            <div class="tab-content">
                <div id="new" class="tab-pane fade active in">
                    <div class="pp-list">
                        <div class="row top-row">
                            <?php foreach ($product_newsest as $row) : ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 no-padding-right">
                                    <div class="product-item ver2">
                                        <div class="prod-item-img bd-style-2">
                                            <a href="#"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" class="img-responsive"></a>
                                            <div class="button">
                                                <a href="#" class="addcart addcart-v2">ADD TO CART</a>
                                                <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="prod-info">
                                            <h3><a href="#" title="<?php echo $row->name ?>"><?php echo $row->name ?></a></h3>
                                            <div class="ratingstar sm">
                                                <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                                <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                                <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                                <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                                <a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
                                                <span class="number">(12)</span>
                                            </div>

                                            <div class="p-price">
                                                <?php if ($row->discount > 0) : ?>
                                                    <?php $price_new = $row->price - $row->discount; ?>
                                                    <p class="price old"><?php echo number_format($row->price) ?> VNĐ</p>
                                                    <p class="price black" style="color:crimson;"><?php echo number_format($price_new) ?> VNĐ </p>

                                                <?php else : ?>
                                                    <p class="price black" style="color:crimson;">
                                                        <?php echo number_format($row->price) ?> VNĐ
                                                    </p>
                                                <?php endif; ?>
                                                <p class="price black">View: <?php echo $row->view ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div id="top" class="tab-pane fade">
                    <div class="pp-list">
                        <div class="row top-row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 no-padding-right">
                                <div class="product-item ver2">
                                    <div class="prod-item-img bd-style-2">
                                        <a href="#"><img src="img/products/camera.jpg" alt="images" class="img-responsive"></a>
                                        <div class="button">
                                            <a href="#" class="addcart addcart-v2">ADD TO CART</a>
                                            <a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <div class="prod-info">
                                        <h3><a href="#">Sony Alpha a5000 Mirrorless Digital Camera with 16-50mm...</a></h3>
                                        <div class="ratingstar sm">
                                            <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
                                            <span class="number">(12)</span>
                                        </div>
                                        <div class="p-price">
                                            <span class="price old">$299.6</span>
                                            <span class="price">$109.69</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
            <aside class="widget brand-v1">
                <div class="heading-v1">
                    <h3>NEW POSTS</h3>
                </div>
                <div class="brand-list-v1">
                    <?php foreach ($news_list as $row) : ?>
                        <div class="product-item ver1 bd-style">
                            <div class="prod-item-img">
                                <a href="#" title="<?php echo $row->title ?>"><img src="<?php echo base_url('upload/news/') . $row->image_link ?>" alt="images" class="img-responsive"></a>
                            </div>
                            <div class="prod-info">
                                <h3><a href="#"><?php echo $row->title ?></a></h3>

                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </aside>
        </div>
    </div>
</div>