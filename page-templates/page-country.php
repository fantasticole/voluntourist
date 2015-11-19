<?php
/**
 * Template Name: Country Page
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
		<main id="main" class="site-main child" role="main">
			<div id="country">
				<div class="countryList">
					<strong>WHY VOLUNTEER IN</strong>
					<div class="country-dropdown">
						<p class="location"></p>
						<ul class="dropdown">
							<?php
								$args = array(
									'child_of' => 12,
									'title_li'     => __(''),);
								 wp_list_pages( $args );
							?>
						</ul>
					</div>
				</div>

			<?php while ( have_posts() ) : the_post(); ?>

				<!-- Page Name -->
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
