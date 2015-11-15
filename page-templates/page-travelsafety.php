<?php
/**
 * Template Name: Travel Safety Page
 *
 * This is the template that displays all pages by default.
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
		<main id="main" class="site-main child" role="main">

			<!-- Only show posts in Travel & Safety Category -->
			<?php
				query_posts( array ( 'category_name' => 'travel-safety', 'posts_per_page' => 5 ) );
				while ( have_posts() ) : the_post();
			?>

				<!-- Page Name -->
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			<!-- Pagination Links -->
			<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => __( 'Back', 'textdomain' ),
					'next_text' => __( 'Onward', 'textdomain' ),
				) );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
