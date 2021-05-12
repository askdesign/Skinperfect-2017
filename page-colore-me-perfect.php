<?php

get_header();

$page_content = null;
while (have_posts()) : the_post();

    $page_content = get_the_content();

endwhile;

global $post;
$args = array(
    'post_type' => 'makeup_service',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$makeup_posts = array();
$color_posts = array();

$query = new WP_Query($args);
if ($query->have_posts())
{
    while($query->have_posts()) :
        $query->the_post();

        // check for the category
        $post_categories = get_the_category();
        foreach ($post_categories as $category)
        {
            if ($category->name == "Mineral Makeup")
            {
                $makeup_post = new stdClass();
                $makeup_post->title = get_the_title();
                $makeup_post->description = apply_filters('the_content', $post->post_content);
                $makeup_post->pricing = get_post_meta($post->ID, 'pricing', true);
                $makeup_post->footnote = get_post_meta($post->ID, 'footnote', true);
                $makeup_post->footnote = nl2br($makeup_post->footnote); // replace new line with <br>
                $makeup_posts[] = $makeup_post;
            }
            elseif ($category->name == "Color Analysis")
            {
                $color_post = new stdClass();
                $color_post->title = get_the_title();
                $color_post->description = apply_filters('the_content', $post->post_content);
                $color_post->pricing = get_post_meta($post->ID, 'pricing', true);
                $color_post->footnote = get_post_meta($post->ID, 'footnote', true);
                $color_post->footnote = nl2br($color_post->footnote); // replace new line with <br>
                $color_posts[] = $color_post;
            }
        }

    endwhile;

    // add header
    dynamic_sidebar("mineral-makeup-header");

    ?>
    <div class="row">
        <div class="makeup-sidebar col-1-3">
            <?php
            // add sidebar
            dynamic_sidebar("mineral-makeup-sidebar");
            ?>
        </div>
        <div class="col-2-3">

        <?php
        echo apply_filters('the_content', $page_content);

        foreach ($makeup_posts as $makeup_post)
        {
            ?>
            <div class="service">
                <div class="name-title-desc">
                    <h2><?php echo $makeup_post->title; ?></h2>
                    <h3 class="pricing"><?php echo $makeup_post->pricing; ?></h3>
                    <div class="description"><?php echo $makeup_post->description; ?></div>
                    <?php
                    if ($makeup_post->footnote != "")
                    {
                        echo '<p class="footnote">' . $makeup_post->footnote . '</p>';
                    }
                    ?>
                </div>
                <img class="book-now" src="<?php echo get_stylesheet_directory_uri() ?>/images/book-now-btn.png" alt="Book Now" />
            </div>
            <?php
        }
        ?>

            <p><strong>Not sure what colors look best on you?</strong></p>
            <p>Consider a virtual or in-spa Colore Me Perfect Color Analysis. Our color analysis uses a patent pending hand board system to identify the wide variety of tones, textures and pigments found in your natural skin color. Once defined, we can share with you the perfect palette of color.</p>
            <p>&nbsp;</p>
        </div><!-- .col-2-3 -->
    </div><!-- .row -->

    <?php

    // add header
    dynamic_sidebar("color-analysis-header");

    ?>

    <div class="row">
        <div class="color-sidebar col-1-3">
            <?php
            // add sidebar
            dynamic_sidebar("color-analysis-sidebar");
            ?>
        </div>
        <div class="col-2-3">

            <?php
            the_content();

            foreach ($color_posts as $color_post)
            {
                ?>
                <div class="service">
                    <div class="name-title-desc">
                        <h2><?php echo $color_post->title; ?></h2>
                        <h3 class="pricing"><?php echo $color_post->pricing; ?></h3>
                        <div class="description"><?php echo $color_post->description; ?></div>
                        <?php
                        if ($color_post->footnote != "")
                        {
                            echo '<p class="footnote">' . $color_post->footnote . '</p>';
                        }
                        ?>
                    </div>
                    <img class="book-now" src="<?php echo get_stylesheet_directory_uri() ?>/images/book-now-btn.png" alt="Book Now" />
                </div>
                <?php
            }
            ?>

        </div><!-- .col-2-3 -->
    </div><!-- .row -->

    <?php

}

wp_reset_postdata();

get_footer();

?>