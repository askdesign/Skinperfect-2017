<?php get_header(); ?>

<?php
global $post;
$args = array(
    'post_type' => 'enhancement_service',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$query = new WP_Query($args);
if ($query->have_posts())
{
    while($query->have_posts()) :
        $query->the_post();

        $pricing = get_post_meta($post->ID, 'pricing', true);
        $footnote = get_post_meta($post->ID, 'footnote', true);
        $pricing = nl2br($pricing); // replace new line with <br>
        $footnote = nl2br($footnote); // replace new line with <br>
        ?>
        <div class="service">
            <div class="col-1-3">
                <div class="photo">
                    <?php the_post_thumbnail(); ?>
                </div>
            </div>
            <div class="col-2-3">
                <div class="name-title-desc">
                    <h2><?php echo get_the_title(); ?></h2>
                    <h3 class="pricing"><?php echo $pricing; ?></h3>
                    <div class="description"><?php the_content(); ?></div>
                    <?php
                    if ($footnote != "")
                    {
                        echo '<p class="footnote">' . $footnote . '</p>';
                    }
                    ?>
                </div>
				<a href="https://www.secure-booker.com/skinperfectoasis/BookOnlineStart.aspx"><img class="book-now" src="https://skinperfectspas.com/wp-content/themes/skinperfect-2017/images/book-now-btn.png" alt="Book Now" /></a>
            </div>
        </div>
        <?php

    endwhile;
}

wp_reset_postdata();

get_footer();

?>