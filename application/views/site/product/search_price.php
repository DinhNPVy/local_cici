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


<?php
$price_from_select = isset($price_from) ? intval($price_from) : 0;
$price_to_select = isset($price_to) ? intval($price_to) : 0;
?>


<section class="shop-list-v2-page">
    <div class="container">
        <div class="heading-sub">
            <h3 class="pull-left">shop list</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Home</a></li>
                <li><a class="active" href="#shop">Price</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="widget-product-list">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="filter-block">
                        <div class="filter-block-shop filter-price">
                            <div class="block-title">
                                <h3>FILTER BY PRICE</h3>
                            </div>
                            <div class="block-content">
                                <div class="price-range-holder">
                                    <div class="slider slider-horizontal" id="">
                                        <div class="slider-track">
                                            <div class="slider-track-low" style="left: 0px; width: 0%;"></div>
                                            <div class="slider-selection" style="left: 0%; width: 50%;"></div>
                                            <div class="slider-track-high" style="right: 0px; width: 50%;"></div>
                                        </div>
                                        <div class="tooltip tooltip-main top" role="presentation" style="left: 25%; margin-left: -33px;">
                                            <div class="tooltip-arrow"></div>
                                            <div class="tooltip-inner">100 : 400</div>
                                        </div>
                                        <div class="tooltip tooltip-min top" role="presentation" style="left: 0%; margin-left: -18px;">
                                            <div class="tooltip-arrow"></div>
                                            <div class="tooltip-inner">100</div>
                                        </div>
                                        <div class="tooltip tooltip-max top" role="presentation" style="left: 50%; margin-left: -18px;">
                                            <div class="tooltip-arrow"></div>
                                            <div class="tooltip-inner">400</div>
                                        </div>
                                        <div class="slider-handle min-slider-handle round" role="slider" aria-valuemin="100" aria-valuemax="700" aria-valuenow="100" style="left: 0%;" tabindex="0"></div>
                                        <div class="slider-handle max-slider-handle round" role="slider" aria-valuemin="100" aria-valuemax="700" aria-valuenow="400" style="left: 50%;" tabindex="0"></div>
                                    </div><input type="text" class="price-slider" value="100,400" data-value="100,400" style="display: none;">
                                    <form action="<?php echo site_url('product/search_price')  ?>" method="get">
                                        <span class="min-max">
                                            Price from:
                                            <select class="form-control" id="price_from" name="price_from">
                                                <?php for ($i = 0; $i <= 50000000; $i = $i + 1000000) : ?>
                                                    <option <?php echo ($price_from_select == $i) ? 'selected' : '' ?> value="<?php echo $i ?>"><?php echo number_format($i) ?> VNĐ</option>
                                                <?php endfor; ?>
                                            </select>
                                        </span>
                                        <span class="min-max">
                                            Price to:
                                            <select class="form-control" id="price_to" name="price_to">
                                                <?php for ($i = 0; $i <= 50000000; $i = $i + 1000000) : ?>
                                                    <option <?php echo ($price_to_select == $i) ? 'selected' : '' ?> value="<?php echo $i ?>"><?php echo number_format($i) ?> VNĐ</option>
                                                <?php endfor; ?>
                                            </select>
                                        </span>
                                        <span class=" filter-button">
                                            <button type="submit">Search</button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="filter-block-shop filter-cate">
                            <div class="block-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="block-content">
                                <ul>

                                    <?php foreach ($catalog_list as $row) : ?>
                                        <li class="active">
                                            <a href="<?php echo base_url('product/catalog/' . $row->id) ?>"><?php echo $row->name ?> </a>
                                        </li>
                                    <?php endforeach; ?>


                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="filter-block bd">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="box box-view">

                                    <div class="button-view">
                                        <span>Showing results <?php echo number_format($price_from)  ?> VNĐ - <?php echo number_format($price_to) ?> VNĐ </span>
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
                    <div class="pagination1">

                        <?php echo $this->pagination->create_links() ?>

                    </div>
                </div>
            </div>
        </div>
</section>