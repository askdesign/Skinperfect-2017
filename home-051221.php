<?php 

get_header('blog');

if (have_posts()) : ?>

<?php /* Start the Loop */ ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">
    <h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <h3><?php the_date(); ?></h3>
    <?php the_content(); ?>
</div><!-- .post -->

<?php
    endwhile;

    global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages
    ) );
?>


<?php else : ?>

<div class="post">
    <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
            <h1 class="entry-title">Nothing Found</h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <p>Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.</p>
            <?php get_search_form(); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->
</div><!-- .post -->

<?php endif; ?>

<?php get_footer(); ?>