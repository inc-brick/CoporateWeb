<?php
/**
 * The default template used for displaying post content in index.php.
 *
 * @package brick
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blogroll__item blogroll-item' ); ?>>

	<?php brick_post_thumbnail_archive(); ?>

	<header class="blogroll-item__header">

		<?php the_title( sprintf( '<h2 class="blogroll-item__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header>

	<?php brick_entry_meta_index(); ?>

	<div class="blogroll-item__content">

		<?php
			// Translators: %s is the title of the post.
			the_content( sprintf( __( 'Continue reading %s', 'brick' ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );
		?>

		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'brick' ),
					'after' => '</div>',
				)
			);
		?>

	</div>

</article>
