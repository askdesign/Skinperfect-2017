<?php

get_header();

$page_title = "Skin Tone";

global $post;
$args = array(
    'post_type' => 'skincare_svc_cat',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$query = new WP_Query($args);
if ($query->have_posts())
{
    echo '<div class="col-1-3">';
    while($query->have_posts()) :
        $query->the_post();
        if ($post->post_title == $page_title)
        {
            the_post_thumbnail();
            break;
        }
    endwhile;
    echo '</div>';
}

$args = array(
    'post_type' => 'skincare_service',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

$query = new WP_Query($args);
if ($query->have_posts())
{
    echo '<div class="col-2-3">';
    while($query->have_posts()) :
        $query->the_post();

        // check for the category
        $post_categories = get_the_category();
        foreach ($post_categories as $category) {
            if ($category->name == $page_title)
            {
                $pricing = get_post_meta($post->ID, 'pricing', true);
                $footnote = get_post_meta($post->ID, 'footnote', true);
                $pricing = nl2br($pricing); // replace new line with <br>
                $footnote = nl2br($footnote); // replace new line with <br>
                ?>
                <div class="service">
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
                <?php

                break;
            }
        }

    endwhile;
    echo '</div>';
}

wp_reset_postdata();

get_footer();

?>