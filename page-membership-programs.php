<?php

get_header();

while (have_posts()) : the_post(); ?>

    <div class="page-content">
        <?php the_content(); ?>
    </div><!-- .post -->

    <?php

endwhile;

global $post;
$args = array(
    'post_type' => 'membership_program',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$category = "";
$categories = array();

$query = new WP_Query($args);
if ($query->have_posts())
{
    while($query->have_posts()) :
        $query->the_post();

        $pricing = get_post_meta($post->ID, 'pricing', true);
        $footnote = get_post_meta($post->ID, 'footnote', true);
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
                    <h2><?php echo get_the_title()?></h2>
                    <h3><?php echo $pricing?></h3>
                    <div class="description"><?php the_content(); ?></div>
                <?php
                    if ($footnote != "")
                    {
                        echo '<p class="footnote">' . $footnote . '</p>';
                    }
                ?>
                </div>
            </div>
        </div>
    <?php
    endwhile;
    ?>

    <div class="col-1-3">&nbsp;</div>
    <div class="col-2-3">
        <p>*initiation fee applies for all memberships<br/>
            *Add a Decollette maintenance Treatment to any package for a small fee</p>
    </div>

    <?php

}

wp_reset_postdata();

get_footer();

?>