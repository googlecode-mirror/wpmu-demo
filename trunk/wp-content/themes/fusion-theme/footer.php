<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $footer_copyright = get_option_tree('footer_copyright',$theme_options);
    /* Social Media Options
    ================================================== */
    $twitter = get_option_tree('twitter',$theme_options);
    $youtube = get_option_tree('youtube',$theme_options);
    $vimeo = get_option_tree('vimeo',$theme_options);
    $facebook = get_option_tree('facebook',$theme_options);
    $google = get_option_tree('google',$theme_options);
    $linkedin = get_option_tree('linkedin',$theme_options);
    $rss = get_option_tree('rss',$theme_options);
    $digg = get_option_tree('digg',$theme_options);
    $google_buzz = get_option_tree('google_buzz',$theme_options);
    $delicious = get_option_tree('delicious',$theme_options);
    $tumbler = get_option_tree('tumbler',$theme_options);
    $dribble = get_option_tree('dribble',$theme_options);
    $stubleupon = get_option_tree('stubleupon',$theme_options);
    $lastfm = get_option_tree('lastfm',$theme_options);
    $moby_picture = get_option_tree('moby_picture',$theme_options);
    $skype = get_option_tree('skype',$theme_options);
    $myspace = get_option_tree('myspace',$theme_options);
    $dropbox = get_option_tree('dropbox',$theme_options);
    $four_square = get_option_tree('four_square',$theme_options);
    $ichat = get_option_tree('ichat',$theme_options);
    $flickr = get_option_tree('flickr',$theme_options);
}
?>        
    	<?php //OptionTree Stuff
        if ( function_exists( 'get_option_tree') ) {?>
        
        <?php if ( is_active_sidebar(2) ){?>
        <div id="footer">
            <div class="container">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer') ) ?>
        	</div><!-- container -->
        </div>
        <?php }?>
        <div id="socket" <?php if ( !is_active_sidebar(2) ){?>style="padding-top: 15px;"<?php }?>>
            <div class="container">
                <?php if($footer_copyright){?>
                <div class="copyright"><?php echo $footer_copyright;?> <a href="http://www.dmca.com/ProtectionPro.aspx?affId=affa6c8142" rel="nofollow" title="DMCA"> <img src ="http://images.dmca.com/Badges/dmca_protected_sml_120b.png?ID=e93442d6-5c00-43f3-b7d2-d99d5e274b2c" style="border:none;" alt="DMCA.com" /></a>

</div>
                <?php }?>
                <?php if(
                $twitter || 
                $youtube  || 
                $vimeo || 
                $facebook ||
                $google ||
                $linkedin ||
                $rss ||
                $digg ||
                $google_buzz ||
                $delicious ||
                $tumbler ||
                $dribble ||
                $stubleupon ||
                $lastfm ||
                $moby_picture ||
                $skype ||
                $myspace ||
                $dropbox ||
                $four_square ||
                $ichat ||
                $flickr
                ){?>
                <div class="social">
                    <p><?php _e('Stay in Touch via Social Networks', GETTEXT_DOMAIN); ?></p>
                    <ul>
                        <?php if($twitter){?>
                        <li><a class="text_replace twitter" title="twitter" href="<?php echo $twitter;?>">twitter</a></li>
                        <?php }?>
                        <?php if($youtube){?>
                        <li><a class="text_replace youtube" title="youtube" href="<?php echo $youtube;?>">youtube</a></li>
                        <?php }?>
                        <?php if($vimeo){?>
                        <li><a class="text_replace vimeo" title="vimeo" href="<?php echo $vimeo;?>">vimeo</a></li>
                        <?php }?>
                        <?php if($facebook){?>
                        <li><a class="text_replace facebook" title="facebook" href="<?php echo $facebook;?>">facebook</a></li>
                        <?php }?>
                        <?php if($google){?>
                        <li><a class="text_replace google" title="google+" href="<?php echo $google;?>">google+</a></li>
                        <?php }?>
                        <?php if($linkedin){?>
                        <li><a class="text_replace linkedin" title="linkedin" href="<?php echo $linkedin;?>">linkedin</a></li>
                        <?php }?>
                        <?php if($rss){?>
                        <li><a class="text_replace rss" title="rss" href="<?php echo $rss;?>">rss</a></li>
                        <?php }?>
                        <?php if($digg){?>
                        <li><a class="text_replace digg" title="digg" href="<?php echo $digg;?>">digg</a></li>
                        <?php }?>
                        <?php if($google_buzz){?>
                        <li><a class="text_replace googlebuzz" title="google buzz" href="<?php echo $google_buzz;?>">google buzz</a></li>
                        <?php }?>
                        <?php if($delicious){?>
                        <li><a class="text_replace delicious" title="delicious" href="<?php echo $delicious;?>">delicious</a></li>
                        <?php }?>
                        <?php if($tumbler){?>
                        <li><a class="text_replace tumbler" title="tumbler" href="<?php echo $tumbler;?>">tumbler</a></li>
                        <?php }?>
                        <?php if($dribble){?>
                        <li><a class="text_replace dribble" title="dribble" href="<?php echo $dribble;?>">dribble</a></li>
                        <?php }?>
                        <?php if($stubleupon){?>
                        <li><a class="text_replace stubleupon" title="stubleupon" href="<?php echo $stubleupon;?>">stubleupon</a></li>
                        <?php }?>
                        <?php if($lastfm){?>
                        <li><a class="text_replace lastfm" title="lastfm" href="<?php echo $lastfm;?>">lastfm</a></li>
                        <?php }?>
                        <?php if($moby_picture){?>
                        <li><a class="text_replace mobypicture" title="moby picture" href="<?php echo $moby_picture;?>">moby picture</a></li>
                        <?php }?>
                        <?php if($skype){?>
                        <li><a class="text_replace skype" title="skype" href="<?php echo $skype;?>">skype</a></li>
                        <?php }?>
                        <?php if($myspace){?>
                        <li><a class="text_replace myspace" title="myspace" href="<?php echo $myspace;?>">myspace</a></li>
                        <?php }?>
                        <?php if($dropbox){?>
                        <li><a class="text_replace dropbox" title="dropbox" href="<?php echo $dropbox;?>">dropbox</a></li>
                        <?php }?>
                        <?php if($four_square){?>
                        <li><a class="text_replace foursquare" title="four square" href="<?php echo $four_square;?>">four square</a></li>
                        <?php }?>
                        <?php if($ichat){?>
                        <li><a class="text_replace ichat" title="ichat" href="<?php echo $ichat;?>">ichat</a></li>
                        <?php }?>
                        <?php if($flickr){?>
                        <li><a class="text_replace flickr" title="flickr" href="<?php echo $flickr;?>">flickr</a></li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>
            </div><!-- container -->
        </div>
        
        <?php }?>
        
    </div>
        


<!-- End Document
================================================== -->
</body>
<?php wp_footer(); ?>
</html>