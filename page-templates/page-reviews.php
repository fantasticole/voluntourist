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
		<a href="./submit-a-review/">SUBMIT A REVIEW</a>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main child" role="main">
			<!-- Display Page Content -->
			<div id="pageText">
				<?php
					$post_id = get_the_ID();
					$post = get_post( $post_id, ARRAY_A );
					$content_home = $post['post_content'];
					echo $content_home;
				?>
			</div>
			<div id="list">

			<!-- Only show posts in Reviews Category -->
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'category_name' => 'reviews',
					'posts_per_page' => 6,
					'paged' => $paged
				);
				query_posts( $args );
				while ( have_posts() ) : the_post();
			?>

				<!-- Page Content -->
				<?php get_template_part( 'template-parts/content', 'list' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>
			</div>

			<!-- Pagination Links -->
			<?php
				the_posts_pagination( array(
					'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'textdomain' ),
					'next_text' => __( '<i class="fa fa-angle-right"></i>', 'textdomain' ),
				) );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
