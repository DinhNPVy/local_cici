<div class="container">
    <div class="heading-v1 v2 top30">
        <h3 class="title v2 v3 pull-left">Best Sellers</h3>
        <div class="clearfix"></div>
    </div>
    <div class=" row brand-list-v1 top-row">
        <?php foreach ($product_news as $row) : ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="product-item ver1 ">
                    <div class="prod-item-img set--width50">
                        <a href="<?php echo base_url('product/view/' . $row->id) ?>"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" class="img-responsive"></a>
                    </div>
                    <div class="button">
                        <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="addcart addcart-v2">ADD TO CART</a>
                        <a href="<?php echo base_url('product/view/' . $row->id) ?>" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </div>
                    <div class="prod-info set--width50">
                        <h3><a href="#" title="<?php echo $row->name ?>"><?php echo $row->name ?></a></h3>
                        <div class="ratingstar sm">
                            <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                            <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                            <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                            <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                            <a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
                            <span class="number">(12)</span>
                            <i class="fa fa-eye" aria-hidden="true"></i><span class="price black">
                                &ensp; <?php echo $row->view ?></span>
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
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>