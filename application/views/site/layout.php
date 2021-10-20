<html>

<head>
    <?php $this->load->view('site/head'); ?>
</head>

<body>
    <div class="modal fade" id="myModal" role="dialog">
        <?php $this->load->view('site/modal'); ?>
    </div>
    <header>
        <?php $this->load->view('site/header'); ?>
    </header>
    <div class="slide v3">
        <?php $this->load->view('site/slide'); ?>
    </div>
    <section class="best-seller top-sales">
        <?php $this->load->view('site/bestseller') ?>
    </section>
    <section class="subbanner">
        <?php $this->load->view('site/subbanner') ?>
    </section>
    <section class="brand-corner">
        <?php $this->load->view('site/brand-corner') ?>
    </section>
    <div class="banner_1">
        <div class="container">
            <a href="#"><img src="<?php echo public_url() ?>site/image/ad.jpg" alt="images" class="img-responsive"></a>
        </div>
    </div>
    <div class="cate">
        <?php $this->load->view('site/cate') ?>
    </div>
</body>

</html>