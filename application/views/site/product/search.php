<html>
<style>
    .view,
    .product-list.grid_full.list-item .product-item-info .quickview1,
    .product-list.grid_full.list-item .product-item-info .wishlist1,
    .product-list .product-item-info .quickview1,
    .product-list .product-item-info .wishlist1 {
        display: inline-block;
        font-size: 20px;
        padding: 5px 2px;
        border: 1px solid #eeeeee;
        background: #f9f9f9;
        vertical-align: bottom;
    }

    @media (max-width: 1199px) {

        .view,
        .product-list.grid_full.list-item .product-item-info .quickview1,
        .product-list.grid_full.list-item .product-item-info .wishlist1,
        .product-list .product-item-info .quickview1,
        .product-list .product-item-info .wishlist1 {
            padding: 5px 10px;
        }
    }

    .product-list .product-item-info .wishlist1 {
        margin: 0;
    }


    .wishlist1 {
        display: inline-block;
        font-size: 20px;
        padding: 5px 19px;
        border: 1px solid #eeeeee;
        background: #f9f9f9;
        vertical-align: bottom;
    }

    @media (max-width: 1199px) {
        .wishlist1 {
            padding: 5px 10px;
        }
    }

    .quickview1 {
        margin: 0 10px;
        font-size: 0;
        background: transparent;
        width: 50px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        padding: 8px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

    .wishlist1 {
        margin: 0 10px;
        font-size: 0;
        background: transparent;
        width: 50px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        padding: 8px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

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

    .fa-4a {
        font-size: 14px;
    }
</style>


<section class="shop-list-v2-page">
    <div class="container">
        <div class="heading-sub">
            <h3 class="pull-left">shop list</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Home</a></li>
                <li><a class="active" href="#shop">Search</li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="widget-product-collection">
            <div class="row">

                <div class="col-md-12 col-xs-12">
                    <div class="filter-block bd">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="box box-view">

                                    <div class="button-view">
                                        <span class="col active"><i class="ion-ios-keypad fa-4a"></i></span>
                                        <span class="list"><i class="fa fa-th-large" style="margin: 4px"></i></i></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="product-list grid_full grid_sidebar grid-uniform">
                        <?php foreach ($list as $row) : ?>
                            <div class="product-list-item">
                                <div class="product-item-img">
                                    <a href="<?php echo base_url('product/view/' . $row->id) ?>"><img src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name ?>" alt="images" class="img-responsive"></a>
                                    <div class="label label-2 red label-top-20">Hot</div>
                                </div>
                                <div class="product-item-info">
                                    <h3><a href="#" title="<?php echo $row->name ?>"><?php echo $row->name ?></a></h3>
                                    <div class="product-item-star ratingstar sm">
                                        <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                        <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                        <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                        <a href="#"><i class="fa fa-star fa-1" aria-hidden="true" style="color: gold;"></i></a>
                                        <a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
                                        <span class="number">(12)</span>
                                    </div>
                                    <div class="prod-price">
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
                                    <div class="button-ver2">
                                        <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="addcart-ver2" title="Add to cart"><span><i class="fa fa-shopping-cart"></i></span>ADD TO CART</a>
                                        <a href="<?php echo base_url('product/view/' . $row->id) ?>" class="quickview1" title="quickview1"><i class="ion-eye fa-4" aria-hidden="true"></i></a>
                                        <a href="#" class="wishlist1" title="wishlist1"><i class="ion-heart fa-4" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>


                    </div>

                </div>
            </div>
        </div>
</section>