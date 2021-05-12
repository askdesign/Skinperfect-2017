<?php

get_header();

global $post;
$args = array(
    'post_type' => 'skincare_svc_cat',
    'post_status' => 'publish',
    'posts_per_page' => -1
);

?>
<div class="skincare-services-analysis-banner">
<div class="skincare-analysis-banner-center">
	<a class="skincare-analysis-head" href="/skincare/skincare-analysis/">
		MEASURABLY IMPROVE YOUR SKIN.<br>
	</a>
<div class="skincare-analysis-banner-button1">
	<a class="skincare-analysis-cta1" href="/skincare/skincare-analysis/">
TRY OUR VIRTUAL AND IN-OFFICE SMART SKIN ANALYSIS.
	</a>
</div>
</div>
<!-- div class="skincare-analysis-banner-button2"><a class="skincare-analysis-cta2" href="/skincare/skincare-analysis/">
CREATE YOUR <br>
PERSONAL PLAN
	</a>
</div -->
<!--	<a class="banner" href="/skincare/skincare-analysis/"><img src="/wp-content/uploads/2017/03/skincare-services-analysis-banner.png"/></a>
-->
</div>
<?php

$query = new WP_Query($args);
if ($query->have_posts())
{
    echo '<div class="categories">';
    while($query->have_posts()) :
        $query->the_post();
    ?><a href="/skincare/skincare-services/<?php echo $post->post_name; ?>"><?php the_post_thumbnail() ?></a><?php
    endwhile;
    echo '</div>';
}

wp_reset_postdata();

?>

<a class="banner" href="/skincare/membership-programs/"><img src="https://skinperfectspas.com/wp-content/uploads/2017/03/skincare-services-membership-banner.png"/></a>

<?php

get_footer();

?>