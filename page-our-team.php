<?php

get_header();

?>

<?php

global $post;
$args = array(
    'post_type' => 'bio',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$location = "";
$categories = array();

$query = new WP_Query($args);
if ($query->have_posts())
{
    while($query->have_posts()) :
        $query->the_post();

        // check for the location
        $post_categories = get_the_category();
        if ($post_categories[0]->name != $location)
        {
            $location = $post_categories[0]->name;

            if ($location != "Uncategorized")
            {
                echo '<p class="location-header">' . $location . '</p>';
            }
        }

        $job_title = get_post_meta($post->ID, 'job_title', true);
    ?>
        <div class="bio">
            <div class="col-1-3">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="col-2-3">
                <div class="name-title-desc">
                    <h2><?php the_title(); ?></h2>
                    <h3><?php echo $job_title; ?></h3>
                    <div class="description"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    <?php
    endwhile;

    ?>
    <?php
}

wp_reset_postdata();

while (have_posts()) : the_post();
    the_content();
endwhile;

get_footer();

?>