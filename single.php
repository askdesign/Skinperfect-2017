<?php get_header('blog'); ?>

<?php if (have_posts()) : ?>

<div class="page-content">

    <?php /* Start the Loop */ ?>
    <?php while (have_posts()) : the_post(); ?>

    <div class="post">
        <h2><?php the_title(); ?></h2>
        <h3><?php the_date(); ?></h3>
        <?php the_content(); ?>
    </div><!-- .post -->

    <?php endwhile; ?>

</div><!-- .page-content -->

<div class="default-sidebar">
    <?php
			// add sidebar
			dynamic_sidebar("default-sidebar");
		?>
</div><!-- .sidebar -->

<?php else : ?>

<div id="main-content">
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
</div><!-- .page-content -->

<div class="default-sidebar">
    <?php
			// add sidebar
			dynamic_sidebar("default-sidebar");
		?>
</div><!-- .sidebar -->

<?php endif; ?>

<?php get_footer(); ?>