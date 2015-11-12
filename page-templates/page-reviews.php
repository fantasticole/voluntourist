<?php
/**
 * Template Name: Reviews Page
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

	<div id="review">
		<a href="./page_id=161">SUBMIT A REVIEW</a>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main child" role="main">

			<!-- Only show posts in Reviews Category -->
			<?php
				query_posts( array ( 'category_name' => 'reviews', 'posts_per_page' => -1 ) );
				// query_posts( array ( 'category_name' => 'reviews, articles, celebrities-give-back, get-inspired, media, must-see, news, reviews, special-features', 'posts_per_page' => -1 ) );
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
