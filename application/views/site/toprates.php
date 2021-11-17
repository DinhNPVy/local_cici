<div class="container">
    <div class="heading-v1">
        <h3 class="pull-left">top rates</h3>
        <ul class="otherr-link pull-right">
            <li class="active"><a data-toggle="pill" href="#all">all</a></li>
            <li><a data-toggle="pill" href="#elec">Electronic</a></li>
            <li><a data-toggle="pill" href="#fashion">Fashion </a></li>
            <li><a data-toggle="pill" href="#it">IT </a></li>
            <li><a data-toggle="pill" href="#food">Food &amp; Drink</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="tab-content">
        <div id="all" class="tab-pane fade in active">
            <div class="prod-fea-list">
                <div class="row">
                    <?php foreach ($product_buy as $row) : ?>
                        <div class="col-md-15 col-sm-4 col-xs-6">
                            <div class="product-item ver2">
                                <div class="prod-item-img bd-style-2">
                                    <a href="#"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" class="img-responsive"></a>
                                    <div class="button">
                                        <a href="#" class="addcart">ADD TO CART</a>
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
                                        <p class="price black">Purchases: <?php echo $row->buyed ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>