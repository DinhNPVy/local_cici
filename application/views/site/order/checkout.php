<section class="checkout-page">
    <div class="container">
        <div class="heading-sub">
            <h3 class="pull-left">check out</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a class="active" href="#cart">Cart</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <ul class="breadcrumb">
            <li>
                <a href="checkout-1.html">01. Shopping Cart</a>
            </li>
            <li>
                <a href="checkout-2.html" class="active">02. Check Out</a>
            </li>
            <li>
                <a href="checkout-3.html" title="">03. Order Complete</a>
            </li>
        </ul>
        <div class="orders">
            <form action="<?php echo site_url('order/checkout') ?>" method="post">
                <div class="row">
                    <div class="col-md-7">
                        <div class="login-required">
                            <p>Returning Custumer? CLICK <a href="#" title="" class="login">HERE</a> TO LOGIN</p>
                            <p>Have a coupon? CLICK <a href="#" title="" class="coupon-code">HERE</a> TO ENTER YOUR CODE</p>
                        </div>
                        <div class="billing-details">
                            <div class="billing-details-heading">
                                <h2 class="billing-title">
                                    Billing Details
                                </h2>
                            </div>
                            <div class="billing-details-content">


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Email *</strong>
                                            <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($user->email) ? $user->email : '' ?>">
                                            <div class="error" style="color:crimson"> <?php echo form_error('email') ?></div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <strong>First & Last name *</strong>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($user->name) ? $user->name : '' ?>">
                                            <div class="error" style="color:crimson"> <?php echo form_error('name') ?></div>

                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <strong>Phone *</strong>
                                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo isset($user->phone) ? $user->phone : '' ?>">
                                            <div class="error" style="color:crimson"> <?php echo form_error('phone') ?></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Order Note * <span style="color:crimson">Enter your shipping address and estimated delivery time.</span></strong>
                                            <textarea name="message" id="message" tabindex="2" class="form-control" value=""></textarea>
                                            <div class="error" style="color:crimson"> <?php echo form_error('message') ?></div>

                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="aside-order">
                            <h2>YOUR ORDER</h2>
                            <table class="table table-product">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th></th>
                                        <th>TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($carts as $row) : ?>
                                        <tr>
                                            <td class="product-name"><?php echo $row['name'] ?> </td>
                                            <td class="product-quantity"><?php echo $row['qty'] ?></td>
                                            <td class="product-total"><?php echo number_format($row['price']) ?> VNĐ</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <ul class="tabs-first">
                                <li><span class="text">Subtotal:</span><span class="cart-number sub-number pull-right"><?php echo number_format($row['subtotal'])  ?> VNĐ</span></li>
                                <li><span class="text">Shipping:</span>
                                    <div class="shipping">
                                        <form action="#">

                                            <input type="radio" name="gender" value="Local-Delivery" id="radio4" checked="check">
                                            <label for="radio4">LOCAL DELIVERY: <span class="shipping-number indent">50.000 VNĐ</span></label>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li><span class="text">Total:</span><span class="cart-number big-total-number pull-right"><?php echo number_format($total_amount + 50000) ?> VNĐ</span></li>
                            </ul>
                            <div class="order-transfer clearfix">
                                <select class="tabs form-control" name="payment">
                                    <option value="">Select a payment method</option>
                                    <option value="cash">

                                        <h4>Cash On Delivery</h4>
                                    </option>
                                    <option value="card">

                                        <h4>Card Payments</h4>
                                    </option>
                                    <option value="baokim">

                                        <h4>BaoKimVN</h4>
                                    </option>

                                </select>
                                <div class="error" style="color:crimson"> <?php echo form_error('payment') ?></div>
                            </div>
                            <button type="submit" class="btn-order">place order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>