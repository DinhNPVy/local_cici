<style>
    .text-info {
        color: #17c1e8 !important;
    }

    .font-weight-bolder {
        font-weight: 700 !important;
    }

    .text-gradient {
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        position: relative;
        z-index: 1;
    }

    .text-gradient.text-info {
        background-image: linear-gradient(310deg, #2152FF, #21D4FD);
    }

    input {
        position: relative;
    }

    .pass {
        position: absolute;
        float: left;
        left: 85%;
        top: 47.55%;
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    var x = true;

    function showpass() {
        if (x) {
            document.getElementById('pass').type = "text";
            x = false;

        } else {
            document.getElementById('pass').type = "password";
            x = true;
        }
    }
</script>
<section class="contact-us">
    <div class="container">
        <div class="heading-sub">
            <h3 class="pull-left">Login Account</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Home</a></li>
                <li><a href="#pages">Login Account</a></li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="contact-info-heading">
            <div class="row">
                <div class="col-md-4 contact-column-inner">
                    <div class="contact-box">
                        <div class="contact-box-icon"><i class="ion-ios-location icon-contact"></i></div>
                        <div class="contact-box-information">
                            The CiCi group of information technology faculty
                        </div>
                    </div>
                </div>
                <div class="col-md-4 contact-column-inner">
                    <div class="contact-box">
                        <div class="contact-box-icon"><i class="ion-ios-telephone icon-contact"></i></div>
                        <div class="contact-box-information">
                            (84+) 082.7900.043 | (84+) 035.3699.466
                        </div>
                    </div>
                </div>
                <div class="col-md-4 contact-column-inner">
                    <div class="contact-box">
                        <div class="contact-box-icon"><i class="ion-email icon-contact"></i></div>
                        <div class="contact-box-information">
                            localware@support.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-info-content">
            <div class="row">
                <form class="contact-form" method="post">
                    <div class="col-md-6">
                        <h3 class="font-weight-bolder text-info text-gradient" style="text-align: center;">Welcome back</h3>
                        <p class="mb-0" style="text-align: center;">Enter your email and password to sign in</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Email *</strong>
                                    <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>">
                                    <div class="error" style="color:crimson"> <?php echo form_error('email') ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Password *</strong>
                                    <input type="password" name="password" id="pass" class="form-control" value="">
                                    <div class="error" style="color:crimson">
                                        <img class="pass" onclick="showpass()" src="<?php echo public_url('admin/assets') ?>/img/eye-outline.svg" alt="" style="height: 25px;">

                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="color: crimson; text-align:center; margin: 18px">
                            <h5><?php echo form_error('login') ?></h5>
                        </div>
                        <div style="text-align: center">
                            <input type="submit" name="login" class="btn-send-message" value="Sign in" style="text-align: center;"></input>

                        </div>

                    </div>
                </form>
                <div class="col-md-6">
                    <div id="googlemap1" style="height: 370px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe5D-pqrsa1q-IpMt3uU4UkqiZtATvbTY&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cABC" async defer></script>
<script type="text/javascript" src="<?php echo public_url() ?>site/js/main.js"></script>
<script>
    function initMap() {

        // Create a new StyledMapType object, passing it an array of styles,
        // and the name to be displayed on the map type control.
        var map = new google.maps.Map(document.getElementById('googlemap1'), {
            center: {
                lat: 21.02765390610467,
                lng: 105.76363360000005
            },
            zoom: 15,
            styles: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#212121"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "administrative.country",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.locality",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#bdbdbd"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#181818"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#1b1b1b"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#2c2c2c"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#8a8a8a"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#373737"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#3c3c3c"
                    }]
                },
                {
                    "featureType": "road.highway.controlled_access",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#4e4e4e"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "transit",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#000000"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#3d3d3d"
                    }]
                }
            ]
        });
    }
</script>