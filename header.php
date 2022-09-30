<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
        */
        global $page, $paged;

        wp_title( '|', true, 'right' );

        // Add the blog name.
        bloginfo( 'name' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
        echo " | $site_description";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
        echo ' | ' . sprintf( __( 'Page %s', 'skinperfect-2016' ), max( $paged, $page ) );

        ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Crimson+Text)" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php wp_head(); ?>

</head>

<?php
	if (is_page())
	{
		$page_slug = 'page-' . $post->post_name;
    }
    else
    {
        $page_slug = '';
    }
?>
<body <?php body_class($page_slug); ?>>
        <div id="overlay">
            <div class="container">
                <i class="fa fa-times close"></i>
                <h2>Please select a location</h2>
                <ul>
                    <li><a href="https://skinperfect.myonlineappointment.com/Booking/?sid=0&guid=55023e97-649f-4e23-b0d4-a745336479d7" target="_blank">Skin Perfect MD (Gahanna)</a></li>
                    <!-- <li><a href="http://www.secure-booker.com/skinperfectoasis/MakeAppointment/Search.aspx" target="_blank">Skin Perfect Oasis (Naples)</a></li> -->
                    <li>Skin Perfect Oasis (Naples):<br>
                    Call us to schedule an appointment at <a href="tel:239-262-5110">239.262.5110</a></li>
                </ul>
            </div>
        </div>
        <div class="grid">
            <div id="secondary-navbar">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'secondary_menu',
                    'container' => false,
                    'menu_class' => 'secondary-nav'
                ));
                ?>
            </div><!-- #secondary-navbar -->
        </div>
        <div class="grid">
            <div id="navbar">
                <div id="hamburger">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div id="menu-close">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                </div>
                <img class="logo" src="<?php echo get_stylesheet_directory_uri() ?>/images/SPLogo326-308x53.png" alt="Skin Perfect" />
                <div class="menu">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'container' => false,
                            'menu_class' => 'main-nav'
                        ));
                    ?>
                </div>
                <a href="/colore-me-perfect"><img class="cmp-button" src="<?php echo get_stylesheet_directory_uri() ?>/images/proud-to-offer-cmp.png" alt="Proud to Offer Colore Me Perfect Cosmetics" /></a>
                <div class="appointment">
                    <div class="book-appointment">
                        <p>Schedule an Appointment</p>
                    </div>
                </div>
            </div><!-- #navbar -->
        </div>

    <div class="grid">
        <div class="container">


        <?php
        if (!is_front_page()) :
    ?>

    <div class="page-header">
        <div class="page-header-content">
            <?php
                if (has_post_thumbnail()) {
                    echo '<img class="header-image" src="' . get_the_post_thumbnail_url($post->ID) . '" />';
                }
            ?>
        </div><!-- .page-header-content -->
    </div><!-- .page-header -->
    <?php
        endif;
    ?>
