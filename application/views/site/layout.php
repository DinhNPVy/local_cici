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
    <section class="">
        <?php if (isset($message)) : ?>
            <?php $this->load->view('site/message'); ?>
        <?php endif; ?>
        <?php $this->load->view($temp, $this->data); ?>
    </section>
    <div class="features v3">
        <?php $this->load->view('site/features') ?>
    </div>
    <footer>
        <?php $this->load->view('site/footer', $this->data) ?>
    </footer>
</body>

</html>