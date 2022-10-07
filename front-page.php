<?php get_header(); ?>

        <div class="slideshow">
            <?php
                // add slideshow sidebar
                dynamic_sidebar("homepage-slider");
            ?>
        </div><!-- .slideshow -->
		<!-- media query changes size to 50% at 768px - we changed the image directly without a php call -->
        <!-- original image breadcrumb was: /images/home-header-phone-breakpoint.jpg -->
        <img class="header-phone" src="https://skinperfectspas.com/wp-content/uploads/2019/07/Skin-Perfect-MD-image.jpg">

<div style="width: 100%; margin-top: 35px;">
<!-- 	<div class="mobileimagecontainer" style="width: 33%; float: left;">
		<center>
			<a href="/register-to-win/" style="text-decoration: none!important;"><img class="mobileimage" src="https://skinperfectspas.com/wp-content/uploads/2017/12/register1.png" style="width: 100%; max-width: 300px; -webkit-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75);">
			<h1 style="padding-top: 8px!important; font-size: 20px; color: #13ABB6;">Register to Win</h1></a>
		</center>
	</div>
 -->	<div class="mobileimagecontainer" style="width: 50%; display: inline-block;">
		<center>
			<a href="https://store.skinperfectspas.com/specials" style="text-decoration: none!important;"><img class="mobileimage" src="https://skinperfectspas.com/wp-content/uploads/2017/12/specials1.png" style="width: 100%; max-width: 300px; -webkit-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75);">
			<h1 style="padding-top: 8px!important; font-size: 20px; color: #13ABB6;">Specials</h1></a>
		</center>
	</div>
	<div class="mobileimagecontainer" style="width: 50%; float: right;">
		<center>
			<a href="/contact-us/" style="text-decoration: none!important;"><img class="mobileimage" src="https://skinperfectspas.com/wp-content/uploads/2017/12/ask2.png" style="width: 100%; max-width: 300px; -webkit-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75); box-shadow: 0px 0px 40px -16px rgba(0,0,0,0.75);">
			<h1 style="padding-top: 8px!important; font-size: 20px; color: #13ABB6;">Ask an Expert</h1></a>
		</center>
	</div>
</div>

        <div class="services">
            <a href="/skincare/skincare-services/" class="service"><?php
                    dynamic_sidebar("homepage-skincare-services");
                ?></a><a href="/skincare/skincare-products/" class="service"><?php
                    dynamic_sidebar("homepage-skincare-products");
                ?></a><a href="/enhancement-services/" class="service"><?php
                    dynamic_sidebar("homepage-enhancement-services");
                ?></a>
        </div>


<div style="width: 100%; background-color: #13ABB6; padding: 15px; display: flex; flex-wrap: wrap; -webkit-box-shadow: 3px 3px 15px 0px rgba(0,0,0,0.35); -moz-box-shadow: 3px 3px 15px 0px rgba(0,0,0,0.35); box-shadow: 3px 3px 15px 0px rgba(0,0,0,0.35); margin-bottom: 50px;">
</div>


        <div class="cmp-events">
            <div class="cmp-link">
                <a href="colore-me-perfect"><?php
                    dynamic_sidebar("homepage-color-me-perfect");
                    ?></a>
            </div><div class="events">
                <?php dynamic_sidebar('homepage-events') ?>
                <div class="text-container">
                    <div class="event">
                        <p class="heading">&nbsp;</p>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div><!-- .cmp-events -->

        <div class="locations">
            <div class="col-1-3">
                <p class="instruction">VISIT OR CALL ONE<br>
				OF OUR LOCATIONS!</p>
            </div>
            <div class="col-1-3 location">
                    <p>GAHANNA</p>
                    <p>614.846.8420</p>
                    <p>725 Buckles Court N.</p>
					<p>Gahanna, OH  43230</p>
            </div>
           <div class="col-1-3 location">
                    <p>NAPLES</p>
                    <p>239.262.5110</p>
                    <p>6306 Trail Boulevard N.</p>
					<p>Naples, FL  34108</p>

           </div>
        </div><!-- .locations -->

        <div class="testimonial-section">
            <div class="grid">
                <div class="testimonial-content">
                    <?php
                        global $post;
                        // get all testimonials
                        $args = array(
                            'post_type' => 'testimonial',
                            'orderby' => 'rand',
                            'posts_per_page' => -1,
                        );
                        $testimonial_query = new WP_Query($args);
                        $post_counter = 0;
                        while ($testimonial_query->have_posts()) :
                            echo
                            $testimonial_query->the_post();
                            $post_counter++;
                        ?>
                        <div class="testimonial<?php
                            echo " testimonial-" . $post_counter;
                            if ($post_counter > 1)
                            {
                                echo " hidden";
                            }
                        ?>">
                            <p class="testimonial-description"><span class="quote">&ldquo;</span><?php echo get_the_content() ?><span class="quote">&rdquo;</span></p>
                            <p class="testimonial-name">
                                &ndash; <?php the_title() ?><br/>
                                <?php
                                $info = get_post_meta($post->ID, 'giver_info', true);
                                $info = str_replace("\r\n", "<br/>", $info);
                                echo $info;
                                ?>
                            </p>
                        </div><!-- .testimonial -->
                    <?php
                        endwhile;
                        wp_reset_query();
                    ?>
                </div><!-- .testimonial-content -->
            </div><!-- .grid -->
        </div><!-- .testimonial-section -->

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/homepage.js"></script>


<?php get_footer(); ?>