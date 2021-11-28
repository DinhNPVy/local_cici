<section class="checkout-page">
    <div class="container">
        <div class="heading-sub">
            <h3 class="pull-left">shop cart</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a class="active" href="#cart">Cart</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <ul class="breadcrumb">
            <li>
                <a href="checkout-1.html" class="active">01. Shopping Cart</a>
            </li>
            <li>
                <a href="checkout-2.html">02. Check Out</a>
            </li>
            <li>
                <a href="checkout-3.html" title="">03. Order Complete</a>
            </li>
        </ul>
        <?php if ($total_items > 0) : ?>
            <form action="<?php echo base_url('cart/update') ?>" method="post">
                <div class="checkout-cart-form">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">

                            <table class="table shop_table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">IMAGE</th>
                                        <th class="product-name">PRODUCT NAME</th>
                                        <th class="product-price">PRICE</th>
                                        <th class="quantity">QUANTITY</th>
                                        <th class="product-subtotal">TOTAL</th>
                                        <th class="">ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_amount = 0; ?>
                                    <?php foreach ($carts as $row) : ?>
                                        <?php $total_amount = $total_amount + $row['subtotal']; ?>
                                        <tr class="cart_item">


                                            <td class="product-thumbnail">



                                                <a href="<?php echo base_url('product/view/' . $row['id']) ?>"><img src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt="images" class="img-responsive"></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                                            </td>
                                            <td class="product-price">
                                                <p class="price"><?php echo number_format($row['price']); ?> VNĐ</p>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity">
                                                    <input type="number" name="qty_<?php echo $row['id'] ?>" value="<?php echo $row['qty']; ?>" min="1">
                                                </div>
                                            </td>
                                            <td class="product-price product-subtotal">
                                                <p class="price"><?php echo number_format($row['subtotal']); ?> VNĐ</p>
                                            </td>
                                            <td class="">

                                                <a onclick="return confirm('Are you want to delete?')" href="<?php echo base_url('cart/del/' . $row['id']) ?>" class="avatar avatar-lg rounded-circle" title="Delete <?php echo $row['name'] ?>">
                                                    <img src="<?php echo public_url('admin/assets') ?>/img/trash-outline.svg" style="height: 24px; width:5000px; margin-top:70px; margin-left: -30px;" alt="Image placeholder">
                                                </a>


                                            </td>



                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="aside-shopping-cart-total">
                                <h2>CART TOTALS</h2>
                                <ul>
                                    <li><span class="text">Subtotal:</span><span class="cart-number"><?php echo number_format($total_amount) ?> VNĐ</span></li>
                                    <li><span class="text">Shipping:</span>
                                        <div class="shipping">
                                            <form method="get" action="/search" role="search">

                                                <input type="radio" name="gender" value="Local-Delivery" id="radio4" checked="checked">
                                                <label for="radio4">LOCAL DELIVERY: 50,000 VNĐ</label>
                                            </form>
                                        </div>
                                    </li>
                                    <li><span class="text calculate">Calculate shipping</span>
                                    </li>
                                    <li><span class="text">Total:</span><span class="cart-number big-total-number"><?php echo number_format($total_amount + 50000) ?> VNĐ</span></li>
                                </ul>
                                <div class="process">
                                    <a href="<?php echo site_url('order/checkout') ?>" type="submit" class="btn-checkout">PROCEED TO CHECKOUT</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="shopping-cart-option">
                        <div class="button-option">
                            <a href="<?php echo base_url()  ?>" class="btn-continue-shopping active">Continue shopping </a>
                            <a href="<?php echo base_url('cart/del') ?>" class="btn-clear">Clear Cart</a>
                        </div>
                        <div class="shopping-cart-coupon">
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <form action="#" method="POST" class="coupon-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Coupon Code">
                                            <span class="icon-coupon"></span>
                                        </div>
                                        <button type="submit" class="btn-submit"></button>
                                    </form>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <button type="submit" class="btn-update-cart">UPDATE CART</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        <?php else : ?>
            <div class="checkout-cart-form" style="text-align: center;">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <button type="submit" class="btn-update-cart" style="color:gold; padding: 16px 27px;  font-weight: bold;   margin-left: 320px;  background: #333;  text-align: center; justify-content: center;">shopping cart does not exist</button>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>