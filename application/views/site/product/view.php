  <!-- video -->
  <script type='text/javascript' src='<?php echo public_url() ?>/site/tivi/jwplayer.js'></script>
  <script type='text/javascript'>
  	jQuery('document').ready(function() {
  		jwplayer('mediaspace').setup({
  			'flashplayer': '<?php echo public_url() ?>/site/tivi/player.swf',
  			'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
  			'controlbar': 'bottom',
  			'width': '560',
  			'height': '315',
  			'autoplay': true
  		});
  	})
  </script>
  <!-- Raty -->
  <script type="text/javascript">
  	$(document).ready(function() {
  		// raty
  		$('.raty_detailt').raty({
  			score: function() {
  				return $(this).attr('data-score');
  			},
  			half: true,
  			click: function(score, evt) {
  				var rate_count = $('.rate_count');
  				var rate_count_total = rate_count.text();
  				$.ajax({
  					url: '<?php echo site_url('raty') ?>',
  					type: 'POST',
  					data: {
  						'id': '<?php echo $product->id ?>',
  						'score': score
  					},
  					dataType: 'json',
  					success: function(data) {
  						if (data.complete) {
  							var total = parseInt(rate_count_total) + 1;
  							rate_count.html(parseInt(total));
  						}
  						alert(data.msg);
  					}
  				});
  			}
  		});
  	});
  </script>

  <script type="text/javascript">
  	$(document).ready(function() {
  		$('a.tab').click(function() {
  			var an_di = $('a.selected').attr('rel'); //lấy title của thẻ <a class='active'>
  			$('div#' + an_di).hide(); //ẩn thẻ <div id='an_di'>
  			$('a.selected').removeClass('selected');
  			$(this).addClass('selected');
  			var hien_thi = $(this).attr('rel'); //lấy title của thẻ <a> khi ta kick vào nó
  			$('div#' + hien_thi).show(); //hiện lên thẻ <div id='hien_thi'>
  		});
  	});
  </script>

  <!-- zoom image -->
  <script src="<?php echo public_url() ?>/site/jqzoom_ev/js/jquery.jqzoom-core.js" type="text/javascript"></script>
  <link rel="stylesheet" href="<?php echo public_url() ?>/site/jqzoom_ev/css/jquery.jqzoom.css" type="text/css">
  <script type="text/javascript">
  	$(document).ready(function() {
  		$('.jqzoom').jqzoom({
  			zoomType: 'standard',
  		});
  	});
  </script>
  <!-- end zoom image -->

  <!-- Raty -->
  <script type="text/javascript">
  	$(document).ready(function() {
  		//raty
  		$('.raty_detailt').raty({
  			score: function() {
  				return $(this).attr('data-score');
  			},
  			half: true,
  			click: function(score, evt) {
  				var rate_count = $('.rate_count');
  				var rate_count_total = rate_count.text();
  				$.ajax({
  					url: '<?php echo site_url('product/raty') ?>',
  					type: 'POST',
  					data: {
  						'id': '<?php echo $product->id ?>',
  						'score': score
  					},
  					dataType: 'json',
  					success: function(data) {
  						if (data.complete) {
  							var total = parseInt(rate_count_total) + 1;
  							rate_count.html(parseInt(total));
  						}
  						alert(data.msg);
  					}
  				});
  			}
  		});
  	});
  </script>
  <!--End Raty -->
  <script src="<?php echo public_url('admin/assets') ?>/js/core/jquery-1.11.1.min.js"> </script>
  <script>
  	$.fn.contentTabs = function() {
  		$(this).find(".tab_content").hide(); //Hide all content
  		$(this).find("ul.nav li:first").addClass("activeTab").show(); //Activate first tab
  		$(this).find(".tab_content:first").show(); //Show first tab content

  		$("ul.nav li").click(function() {
  			$(this).parent().parent().find("ul.nav li").removeClass("activeTab"); //Remove any "active" class
  			$(this).addClass("activeTab"); //Add "active" class to selected tab
  			$(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
  			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
  			$(activeTab).show(); //Fade in the active content
  			return false;
  		});
  	};
  </script>
  <style>
  	.shop-sing-item-detail .group-button .button-ver2 .link-ver11 {
  		display: inline-block;
  		height: 50px;
  		line-height: 50px;
  		min-width: 60px;
  		padding: 12px 14px;
  		text-align: center;
  		background: transparent;
  		border: 1px solid #ccc;
  		-moz-border-radius: 4px;
  		-webkit-border-radius: 4px;
  		border-radius: 4px;
  		font-weight: 600;
  		text-transform: uppercase;
  		margin-left: 10px;
  	}

  	.product_view_content {
  		width: 270px;
  		float: left;
  	}
  </style>
  <script type="text/javascript">
  	(function($) {
  		$(document).ready(function() {
  			var main = $('#form');
  			// Tabs
  			main.contentTabs();
  		});
  	})(jQuery);
  </script>
  <section class="shop-single-page">
  	<div class="container">
  		<div class="heading-sub">
  			<h3 class="pull-left">shop single</h3>
  			<ul class="other-link-sub pull-right">
  				<li><a href="#home">Home</a></li>
  				<li><a href="#shop">Shop</a></li>
  				<li><a class="active" href="#detail">Detail</a></li>
  			</ul>
  			<div class="clearfix"></div>
  		</div>
  		<div class="widget-shop-single">
  			<div class="row">
  				<div class="col-md-5">
  					<div class="shop-single-item-img">
  						<div class='product_view_img'>
  							<a href="<?php echo base_url('upload/product/' . $product->image_link) ?>" class="jqzoom" rel='gal1' title="<?php echo base_url('upload/product/' . $product->image_link) ?>">
  								<img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt='<?php echo base_url('upload/product/' . $product->image_link) ?>' style="width:450px !important">
  							</a>
  							<div class='clear' style='height:10px'></div>
  							<div class="clearfix">
  								<ul id="thumblist">
  									<li>
  										<a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('upload/product/' . $product->image_link) ?>',largeimage: '<?php echo base_url('upload/product/' . $product->image_link) ?>'}">
  											<img src='<?php echo base_url('upload/product/' . $product->image_link) ?>'>
  										</a>
  									</li>
  									<?php if (is_array($image_list)) : ?>
  										<?php foreach ($image_list as $img) : ?>
  											<li>
  												<a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('upload/product/' . $img) ?>',largeimage: '<?php echo base_url('upload/product/' . $img) ?>'}">
  													<img src='<?php echo base_url('upload/product/' . $img) ?>'>
  												</a>
  											</li>
  										<?php endforeach; ?>
  									<?php endif; ?>
  								</ul>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="col-md-7">
  					<div class="shop-sing-item-detail">
  						<h3><a href="#"><?php echo $product->name ?></a></h3>
  						<div class="brandname">by <strong>SONY</strong></div>
  						<div class="ratingstar">
  							<a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
  							<a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
  							<a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
  							<a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
  							<a href="#"><i class="fa fa-star fa-1" aria-hidden="true"></i></a>
  							<span class="raty_detailt" style="margin: 5px;" id="<?php echo $product->id ?>" data-score=' 1 <?php echo $product->raty ?>'>
  							</span>
  							<b class="rate_count"><?php echo $product->rate_count ?></b>
  							<a class="review">Add your review</a>
  						</div>
  						<div class="prod-price">
  							<?php if ($product->discount > 0) : ?>
  								<?php $price_new = $product->price - $product->discount; ?>
  								<span class="price old"><?php echo number_format($product->price) ?> VNĐ</span>
  								<span class="price black" style="color:crimson;"><?php echo number_format($price_new) ?> VNĐ </span>

  							<?php else : ?>
  								<span class="price black" style="color:crimson;">
  									<?php echo number_format($product->price) ?> VNĐ
  								</span>
  							<?php endif; ?>
  							<span class="tax">(including tax)</span>
  						</div>
  						<div class="description">
  							<p>The Premium Flat 4K SUHD Picture with Quantum Dot Color Drive. Fires off a billion more colors than HD TVs for a lifelike picture (unlike anything else).</p>
  							<ul>
  								<li>More than just pitch black, get the best shades of black with Triple Black Technology. </li>
  								<li>HDR 1000 mirrors the high contrast and vividness the way movie makers intended</li>
  								<li>Get richer colors and deeper contrast with UHD Dimming</li>
  							</ul>
  						</div>
  						<div class="group-button">

  							<div class="button-ver2">
  								<a href="<?php echo base_url('cart/add/' . $product->id) ?>" class="link-ver1 addcart-ver2" title="Add to cart"><span><i class="fa fa-shopping-cart"></i></span>ADD TO CART</a>
  								<a href="#" class="link-ver11 paragraph"><i class="ion-stats-bars fa-4" aria-hidden="true"></i></a>
  								<a href="#" class="link-ver11 " title="wishlist1"><i class="ion-heart fa-4" aria-hidden="true"></i></a>
  								<a href="#" class="link-ver11 wishlist wishform"><i class="ion-android-share-alt fa-4" aria-hidden="true"></i></a>
  							</div>
  						</div>
  						<div class="product-feature">
  							<ul class="product-feature-1">

  								<li><strong>Gift:</strong> <?php echo $product->gifts ?></li>

  								<li><strong> <i class="fa fa-eye" aria-hidden="true"></i></strong><span class="price black">
  										&ensp; <?php echo $product->view ?></span></li>
  							</ul>
  							<ul class="product-feature-2">
  								<li><strong>Warranty:</strong> <?php echo $product->warranty ?></li>
  								<li><strong>Category:</strong> <a href="<?php echo base_url('product/catalog' . $catalog->id) ?>"><?php echo $catalog->name ?></a></li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="product-detail-bottom" id="form">
  				<ul class="nav nav-tabs">
  					<li class="activeTab"><a data-toggle="" href="#desc">Description</a></li>
  					<!-- <li><a data-toggle="" href="#faq">Product FAQ</a></li> -->
  					<li><a data-toggle="" href="#video">Video</a></li>
  					<li><a data-toggle="" href="#review">Reviews</a></li>
  				</ul>
  				<div class="tab-content">
  					<div id="desc" class="tab_content pd0">
  						<p><?php echo $product->name ?></p>
  						<ul class="product-detail-list">

  							<li> <?php echo $product->content ?></li>

  						</ul>
  					</div>

  					<div id="video" class="tab_content pd0">
  						<video width="1050" height="440" style=" margin: 20px 60px;" src=" <?php echo base_url('upload/product/' . $product->video) ?>"> </video>
  					</div>
  					<div id="review" class="tab_content pd0">
  						<p>Smart never looked so good. The KS8000 4K SUHD TV features Quantum Dot Color technology, which covers you in our most superior picture yet, immersing you in whatever you’re watching. </p>
  					</div>
  				</div>
  			</div>

  		</div>
  		<div class="related-product-page">
  			<div class="heading-shop">
  				<h3>UPSELL PRODUCT</h3>
  			</div>
  			<div class="widget-product-related">
  				<div class="owl-carousel owl-theme js-owl-product owl-loaded owl-drag">




  					<div class="owl-stage-outer">
  						<div class="owl-stage" style="transform: translate3d(-1481px, 0px, 0px); transition: all 0s ease 0s; width: 3555px;">
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canonpixma.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/macmini2.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canon.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony MDRXB950BT/B Extra Bass Over Bluetooth Headphones...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/seiko.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canonpixma.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item active" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/macmini2.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item active" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canon.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony MDRXB950BT/B Extra Bass Over Bluetooth Headphones...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item active" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/seiko.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned active" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canonpixma.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/macmini2.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  										<div class="label label-2 pink label-top-20">Sale</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony Xperia X Compact - SN5605 VN Unlocked Smartphone...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price black">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/canon.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Sony MDRXB950BT/B Extra Bass Over Bluetooth Headphones...</a></h3>
  										<div class="ratingstar">
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<a href="#"><i class="fa fa-star-o fa-1" aria-hidden="true"></i></a>
  											<span class="number">(12)</span>
  										</div>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  							<div class="owl-item cloned" style="width: 281.25px; margin-right: 15px;">
  								<div class="product-item">
  									<div class="product-item-img-related prod-item-img">
  										<a href="#"><img src="img/products/seiko.jpg" alt="images" class="img-responsive"></a>
  										<div class="button">
  											<a href="#" class="addcart">ADD TO CART</a>
  											<a href="#" class="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  										</div>
  									</div>
  									<div class="product-item-info-related">
  										<h3><a href="#">Samsung UN65KS8000 65-Inch 4K Ultra HD Smart LED TV...</a></h3>
  										<div class="prod-price">
  											<span class="price old">$299.6</span>
  											<span class="price">$199.69</span>
  										</div>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="owl-nav disabled">
  						<div class="owl-prev"></div>
  						<div class="owl-next"></div>
  					</div>
  					<div class="owl-dots disabled">
  						<div class="owl-dot active"><span></span></div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>