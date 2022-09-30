    </div><!-- .container -->
</div><!-- .grid -->

<div class="grid">
    <div class="newsletter-section">
		      <div class="newsletter-content">
           <center><p><a href="/newsletter-registration/" style="text-decoration:none;"><span style="color:#66cccc; font-weight:bold;">Click Here</span> To Sign Up For Our Newsletter</a></p></center>
           <!-- <?php
            // add opt-in sidebar
            dynamic_sidebar("opt-in");
            ?>-->
        </div>
    </div>
<!-- .newsletter-section -->

    <div id="footer">
        <div id="footer-content" class="grid">
            <div class="menu">
                <div class="col-3-4">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'container' => false,
                            'menu_class' => 'footer-nav'
                        ));
                    ?>
                </div>
                <div class="col-1-4">
                    <div class="connect">
                        <p>Connect</p>
                        <a href="https://www.facebook.com/SkinPerfectSpas" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/connect-facebook.png" alt="Facebook" border="0" /></a>
                        <a href="https://www.youtube.com/user/SkinPerfectTV" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/connect-youtube.png" alt="YouTube" border="0" /></a>
                        <a href="https://www.instagram.com/skinperfectspas/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/connect-instagram.png" alt="Instagram" border="0"/></a>
                    </div>
                </div>
            </div><!-- .menu -->
            <div class="logo-copyright">
                <img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/SPLogoWhite-308x53.png" alt="Skin Perfect Image Wellness Spa" />
                <p class="copyright">&copy; 2012-<?php echo date("Y") ?> Skin Perfect Clinic. All rights reserved.</p>
            </div><!-- .logo-copyright -->
        </div><!-- #footer-content.grid -->
    </div><!-- #footer -->
</div><!-- .grid -->

<?php wp_footer(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/script.js"></script>

<!-- Google Analytics -->

<!--<script type="text/javascript">-->
<!--    var _gaq = _gaq || [];-->
<!--    _gaq.push(['_setAccount', 'UA-35729440-1']);-->
<!--    _gaq.push(['_trackPageview']);-->
<!---->
<!--    (function() {-->
<!--        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;-->
<!--        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';-->
<!--        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);-->
<!--    })();-->
<!--</script>-->

<!-- end Google Analytics -->

</body>
</html>