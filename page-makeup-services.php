<?php

get_header();

global $post;
$args = array(
    'post_type' => 'makeup_service',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$category = "";
$categories = array();

$query = new WP_Query($args);
if ($query->have_posts())
{
    echo '<div class="category">';

    while($query->have_posts()) :
        $query->the_post();

        $pricing = get_post_meta($post->ID, 'pricing', true);
        $footnote = get_post_meta($post->ID, 'footnote', true);
        $footnote = nl2br($footnote); // replace new line with <br>
    ?>
        <div class="service">
            <div class="photo">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="name-title-desc">
                <h2><?php echo get_the_title() . ' <span class="pricing">' . $pricing . '</span>'; ?></h2>
                <div class="description"><?php the_content(); ?></div>
            <?php
                if ($footnote != "")
                {
                    echo '<p class="footnote">' . $footnote . '</p>';
                }
            ?>
            </div>
        </div>
    <?php
    endwhile;

    echo '</div><!-- .category ->';

}

wp_reset_postdata();

get_footer();

?>