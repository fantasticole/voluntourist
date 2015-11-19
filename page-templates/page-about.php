<?php
/**
 * Template Name: About Page
 *
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package voluntourist
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div id="childContent">
				<?php
					$children = get_pages('child_of='.$post->ID.'&parent='.$post->ID);
				?>
				<?php foreach ( $children as $child ) : 
				    setup_postdata( $child ); ?>
				<div id="childPage" class="about">
					<h2>
						<a href="<?php echo get_permalink($child->ID); ?>">
							<?php echo get_the_title( $child ); ?>
						</a>
					</h2>
					<p>
						<?php echo get_the_excerpt($child); ?>
					</p>
			   </div>
				<?php
					endforeach;
				    wp_reset_postdata();
			    ?>
				</div>

				<!-- Page Name & Content-->
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
