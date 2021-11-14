<html>

<head>
    <?php $this->load->view('site/head'); ?>
</head>

<body>
    <div class="modal fade" id="myModal" role="dialog">
        <?php $this->load->view('site/modal'); ?>
    </div>
    <header>
        <?php $this->load->view('site/header', $this->data); ?>
    </header>
    <section class="slide">
        <?php $this->load->view('site/slide'); ?>
    </section>
    <section class="best-seller top-sales">
        <?php $this->load->view($temp) ?>
    </section>
    <section class="subbanner">
        <?php $this->load->view('site/subbanner') ?>
    </section>
    <section class="brand-corner">
        <?php $this->load->view('site/brand-corner'); ?>
    </section>
    <div class="banner_1">
        <div class="container">
            <a href="#"><img src="<?php echo public_url() ?>site/image/ad.jpg" alt="images" class="img-responsive"></a>
        </div>
    </div>
    <div class="cate">
        <?php $this->load->view('site/cate'); ?>
    </div>
    <div class="brand">
        <?php $this->load->view('site/brand'); ?>
    </div>
    <div class="features v3">
        <?php $this->load->view('site/features') ?>
    </div>
    <footer>
        <?php $this->load->view('site/footer') ?>
    </footer>
</body>

</html>