<style>
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
            <h3 class="pull-left">Edit Account</h3>
            <ul class="other-link-sub pull-right">
                <li><a href="#home">Profile</a></li>
                <li><a href="#pages">Edit Account</a></li>

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
                    <div class="col-md-12">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong>Email * <span style="color: crimson;">Unaltered</span></strong>
                                    <p><?php echo $user->email ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <strong>Password ( <span style="color:goldenrod;">If you change your password, you must re-enter the information.</span>)</strong>
                                    <input type="password" name="password" id="pass" class="form-control" value="">
                                    <div class="error" style="color:crimson">
                                        <img class="pass" onclick="showpass()" src="<?php echo public_url('admin/assets') ?>/img/eye-outline.svg" alt="" style="height: 25px;">

                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Re-enter your password (<span style="color:goldenrod;">If you change your password, you must re-enter the information.</span>)</strong>
                                    <input type="text" name="repassword" id="pass" class="form-control" value="">
                                    <div class="error" style="color:crimson">
                                        <img class="pass" onclick="showpass()" src="<?php echo public_url('admin/assets') ?>/img/eye-outline.svg" alt="" style="height: 25px;">

                                        <?php echo form_error('repassword') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First & Last name *</strong>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $user->name ?>">
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Phone *</strong>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $user->phone ?>">
                                    <div class="error" style="color:crimson"> <?php echo form_error('phone') ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Address *</strong>
                                    <input name="address" id="address" tabindex="2" class="form-control" value="<?php echo $user->address ?>"></input>
                                    <div class="error" style="color:crimson"> <?php echo form_error('address') ?></div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center">
                            <input type="submit" class="btn-send-message" value="Update"></input>

                        </div>

                    </div>
                </form>

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