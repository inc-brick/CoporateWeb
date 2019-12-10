<?php
/**
 * The main template file.
 *
 * @package brick
 */

get_header(); ?>

<div id="main" class="site-main blogroll">

	<?php if ( have_posts() ) : ?>

		<div class="blogroll__wrap blogroll__wrap--<?php brick_grid_class(); ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content' ); ?>

			<?php endwhile; ?>

		</div>

		<?php brick_posts_pagination( 'blogroll__pagination' ); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer();
