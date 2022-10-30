<?php get_header(); ?>


<?php if (have_posts()) : ?>

<div class="col-3-3">

    <?php /* Start the Loop */ ?>
    <?php while (have_posts()) : the_post(); ?>

    <div class="post">
        <?php the_content(); ?>
    </div><!-- .post -->

    <?php endwhile; ?>

</div>

<?php else : ?>

<div id="page-content">
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
</div><!-- #main-content -->

<?php endif; ?>

<?php get_footer(); ?>

