<?php
/**
 * Template part for displaying list content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package voluntourist
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<a href="<?php echo get_permalink(); ?>">
			<div class="articleTitle">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'voluntourist' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
			</div>
		</a>
		<?php the_content(''); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'voluntourist' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

