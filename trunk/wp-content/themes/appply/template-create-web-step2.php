<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step 2
 *
 * @package WooFramework
 * @subpackage Template
 */

session_start();

if(isset($_SESSION["agent_no"])) {
    $agent_no = $_SESSION["agent_no"];
} else {
    wp_redirect("step1");
    exit;
}

$agent = get_user_from_agent_no($_SESSION["agent_no"]);

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

    $error = validate_agent_info($_POST);

    if($error["count"] > 0) { // when have errors on validation.
        foreach($error["errors"] as $e) {
            $error_message .= '<li>' . $e["message"] . '</li>';
        }
    }
    else { // when data in form is valid.
        $agent_attr = array("agent-first", "agent-last", "agent-mobile", "agent-email", "agent-biz-address", "agent-biz-tumbol", "agent-biz-amphore", "agent-biz-province", "agent-biz-zipcode");
        foreach($agent_attr as $a) {
            $_SESSION[$a] = $_POST[$a];
        }
        wp_redirect("step3");
        exit;
    }
}

function validate_agent_info($agent_info) {
    $error = array("count" => 0, "errors" => array());

    // do validation code here..
    if(empty($agent_info["agent-first"]))
        $error["errors"][] = array("name" => "agent-first", "message" => "กรุณากรอกชื่อของคุณ");
    if(empty($agent_info["agent-last"]))
        $error["errors"][] = array("name" => "agent-last", "message" => "กรุณากรอกนามสกุลของคุณ");
    if(empty($agent_info["agent-mobile"]))
        $error["errors"][] = array("name" => "agent-mobile", "message" => "กรุณากรอกเบอร์โทรศัพท์ของคุณ");
    if(empty($agent_info["agent-email"]))
        $error["errors"][] = array("name" => "agent-email", "message" => "กรุณากรอกอีเมล์ของคุณ");

    // end do validation code.
    $error["count"] = sizeof($error["errors"]);
    return $error;
}



 global $woo_options;
 get_header();
?>

    <style type="text/css">
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map_canvas {
            height: 100%;
        }

        @media print {
            html, body {
                height: auto;
            }

            #map_canvas {
                height: 650px;
            }
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&language=th"></script>
    <script>
        window.onload = initialize;

        var geocoder;
        var map;
        var marker;
        var infowindow = new google.maps.InfoWindow({size: new google.maps.Size(400,150)});
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(13.723419,100.476232);
            var mapOptions = {
                zoom: 10,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
        }

        function clone(obj){
            if(obj == null || typeof(obj) != 'object') return obj;
            var temp = new obj.constructor();
            for(var key in obj) temp[key] = clone(obj[key]);
            return temp;
        }


        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    marker.formatted_address = responses[0].formatted_address;
                } else {
                    marker.formatted_address = 'Cannot determine address at this location.';
                }
                infowindow.setContent(marker.formatted_address+"<br>coordinates: "+marker.getPosition().toUrlValue(6));
                infowindow.open(map, marker);
            });
        }

        function codeAddress() {
            var address = document.getElementById('agent-biz-tumbol').value;
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                    if (marker) {
                        marker.setMap(null);
                        if (infowindow) infowindow.close();
                    }
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: results[0].geometry.location
                    });
                    google.maps.event.addListener(marker, 'dragend', function() {
                        // updateMarkerStatus('Drag ended');
                        geocodePosition(marker.getPosition());
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                        if (marker.formatted_address) {
                            infowindow.setContent(marker.formatted_address+"<br>coordinates: "+marker.getPosition().toUrlValue(6));
                        } else  {
                            infowindow.setContent(address+"<br>coordinates: "+marker.getPosition().toUrlValue(6));
                        }
                        infowindow.open(map, marker);
                    });
                    google.maps.event.trigger(marker, 'click');
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>

    <div id="content" class="page col-full">

        <?php woo_main_before(); ?>

        <section id="main" class="fullwidth">
            <div id="create-web-progress-bar">
                <div class="inline">
                    <div class="step active">
                        <span>1</span>
                        <div class="step-text active">ยืนยันตนเอง</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar active"></div>
                    <div class="step active">
                        <span>2</span>
                        <div class="step-text active">กรอกข้อมูลติดต่อ</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar"></div>
                    <div class="step">
                        <span>3</span>
                        <div class="step-text">เลือกชื่อเว็บไซต์</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar"></div>
                    <div class="step">
                        <span>4</span>
                        <div class="step-text">ยืนยันข้อมูล</div>
                    </div>
                </div>
            </div>

            <div id="create-web-content">
                <?php if(isset($error_message)): ?>
                    <div class="error"><?php echo $error_message ?></div>
                <?php endif ?>
                <form action="" method="post" class="bg-gray" id="create-web-agent-info">
                    <h3>ข้อมูลของผู้สมัคร (รหัสตัวแทน : <?php echo $agent_no ?>)</h3>
                    <fieldset>
                        <legend>ข้อมูลการติดต่อ</legend>
                        <div class="field">
                            <label for="agent-first">ชื่อ</label>
                            <input type="text" id="agent-first" name="agent-first" value="<?php echo $_POST['agent-first'] ?>" />
                        </div>
                        <div class="field">
                            <label for="agent-last">นามสกุล</label>
                            <input type="text" id="agent-last" name="agent-last" value="<?php echo $_POST['agent-last'] ?>" />
                        </div>
                        <div class="field">
                            <label for="agent-mobile">เบอร์โทรศัพท์มือถือ</label>
                            <input type="text" id="agent-mobile" name="agent-mobile" value="<?php echo $_POST['agent-mobile'] ?>" />
                        </div>
                        <div class="field">
                            <label for="agent-email">อีเมล์</label>
                            <input type="text" id="agent-email" name="agent-email" value="<?php echo !empty($_POST['agent-email'])? $_POST['agent-email'] : $agent->user_email ?>" />
                        </div>
                    </fieldset>
<!--                    <fieldset>-->
<!--                        <legend>ข้อมูลธุรกิจ</legend>-->
<!--                        <div class="field">-->
<!--                            <label for="agent-biz-name">ชื่อหน่วยธุรกิจ</label>-->
<!--                            <input type="text" id="agent-biz-name" name="agent-biz-name" value="--><?php //echo $_POST['agent-biz-name'] ?><!--" />-->
<!--                        </div>-->
<!--                    </fieldset>-->
                    <fieldset>
                        <legend>ที่อยู่ธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-address">ที่อยู่</label>
                            <textarea id="agent-biz-address" name="agent-biz-address" placeholder="เลขที่ / ถนน / ซอย"><?php echo $_POST['agent-biz-address'] ?></textarea>
                        </div>
                        <div class="field">
                            <label for="agent-biz-tumbol">ตำบล/แขวง</label>
                            <input type="text" id="agent-biz-tumbol" name="agent-biz-tumbol" value="<?php echo $_POST['agent-biz-tumbol'] ?>" onchange="codeAddress()" />
                        </div>
                        <div class="field">
                            <label for="agent-biz-amphore">อำเภอ/เขต</label>
                            <input type="text" id="agent-biz-amphore" name="agent-biz-amphore" value="<?php echo $_POST['agent-biz-amphore'] ?>" />
                        </div>
                        <div class="field">
                            <label for="agent-biz-province">จังหวัด</label>
                            <input type="text" id="agent-biz-province" name="agent-biz-province" value="<?php echo $_POST['agent-biz-province'] ?>" />
                        </div>
                        <div class="field">
                            <label for="agent-biz-zipcode">รหัสไปรษณีย์</label>
                            <input type="text" id="agent-biz-zipcode" name="agent-biz-zipcode" value="<?php echo $_POST['agent-biz-zipcode'] ?>" />
                        </div>
                        <div id="map_canvas"></div>
                    </fieldset>
                    <div style="text-align: center"><input type="submit" value="ขั้นตอนต่อไป"/></div>
                </form>

            </div>


            
            <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
                    ?>
                    <article <?php post_class(); ?>>

                        <section class="entry">
                            <?php the_content(); ?>
                        </section><!-- /.entry -->

                        <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>

                    </article><!-- /.post -->

                <?php
                } // End WHILE Loop
            }
            else {
                ?>
                <article <?php post_class(); ?>>
                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                </article><!-- /.post -->
            <?php }
            ?>

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>