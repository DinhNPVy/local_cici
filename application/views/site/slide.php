<style>
    #slideshow {
        overflow: hidden;
        height: 510px;
        width: 728px;
        margin: 0 auto;
    }

    .slide-wrapper {
        width: 2912px;
        -webkit-animation: slide 14s ease infinite;
    }

    .slide1 {
        position: relative;
        float: left;
        height: 510px;
        width: 728px;
        top: 50px;

    }

    @media (max-width: 767px) {
        .slide1 {
            padding-bottom: 0;
        }
    }

    .slide1 .slide1-content {
        position: absolute;
        top: 25%;
        left: 7%;
        color: #fff;
    }

    .slide1 .slide1-content h5.brand {
        font-size: 14px;
        letter-spacing: 4px;
        text-transform: uppercase;
        position: relative;
        margin-bottom: 32px;
        display: inline-block;
        font-family: "Open Sans", sans-serif;
    }

    .slide1 .slide1-content h5.brand:before {
        content: "";
        position: absolute;
        width: 40px;
        height: 1px;
        bottom: -15px;
        left: 0;
        border-bottom: 1px solid #fff;
    }

    @media (max-width: 480px) {
        .slide1 .slide1-content h5.brand {
            font-size: 12px;
            letter-spacing: 2px;
        }
    }

    .slide1 .slide-content h3 {
        margin-bottom: 10px;
        font-family: "Poppins", sans-serif;
        font-family: "Poppins", sans-serif;
        font-size: 40px;
        font-weight: lighter;
        line-height: 45px;
    }

    .slide1 .slide1-content h3 span.strong {
        font-weight: bold;
        font-size: 48px;
    }

    .slide1 .slide1-content p {
        font-size: 15px;
        font-family: "Open Sans", sans-serif;
    }

    @media (max-width: 767px) {
        .slide1 .slide1-content p {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .slide1 .slide1-content {
            top: 15%;
        }
    }




    @-webkit-keyframes slide {
        20% {
            margin-left: 0px;
        }

        30% {
            margin-left: -728px;
        }

        50% {
            margin-left: -728px;
        }

        60% {
            margin-left: -1456px;
        }

        80% {
            margin-left: -1456px;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9 col-sm-12 col-xs-12">
            <div class="row top-row">
                <div class="col-md-12 col-sm-12 col-xs-12">


                    <div id="slideshow">
                        <div class="slide-wrapper">
                            <?php foreach ($slide_list as $row) : ?>
                                <div class="slide1"><img src="<?php echo base_url('upload/slide/') . $row->image_link ?>" alt="<?php echo $row->name ?>">
                                    <div class="slide1-content">
                                        <h5 class="brand"><?php echo $row->name ?></h5>
                                        <h3><span class="strong">Perfection</span><br>for all</h3>
                                        <p><?php echo $row->info ?></p>
                                    </div>
                                    <a href="<?php echo $row->link ?>" class="slide-button">shop now</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- <div class="slide-img slick-slide slick-current" data-slick-index="0" aria-describedby="slick-slide00" role="option" aria-hidden="true">
                                <img src="<?php echo base_url('upload/slide/') . $row->image_link ?>" alt="<?php echo $row->name ?>" class="img-reponsive">
                                <div class="slide-content">
                                    <h5 class="brand"><?php echo $row->name ?></h5>
                                    <h3><span class="strong">Perfection</span><br>for all</h3>
                                    <p><?php echo $row->info ?></p>
                                </div>
                                <a href="<?php echo $row->link ?>" class="slide-button">shop now</a>
                            </div> -->


                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="sub-banner">
                        <a href="#"><img src="<?php echo public_url() ?>site/image/subbanner-1.jpg" alt="images" class="img-reponsive"></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="sub-banner">
                        <a href="#"><img src="<?php echo public_url() ?>site/image/subbanner-2.jpg" alt="images" class="img-reponsive"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sub-banner"></div>