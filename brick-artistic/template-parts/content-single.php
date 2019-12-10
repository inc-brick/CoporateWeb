<?php
/**
 * The template used for displaying post content in single.php.
 *
 * @package brick
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php brick_entry_meta_before_title(); ?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php brick_entry_meta_before_content(); ?>

	<?php brick_post_thumbnail(); ?>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'brick' ),
					'after' => '</div>',
				)
			);
		?>

	</div>

	<?php brick_entry_footer_widgets(); ?>

	<?php brick_entry_meta_after_content(); ?>

</article>
