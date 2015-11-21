<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package voluntourist
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'voluntourist' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'voluntourist' ); ?></p>

					<?php get_search_form(); ?>

			<div id="features">

			<!-- Get categories -->
			<?php
				$args = array(
				'child_of'           => 3,
				'title_li'           => __( '' ),
			    );
			    $first = get_categories( $args );
			?>
			<?php
				$args = array(
				'child_of'           => 13,
				'title_li'           => __( '' ),
			    );
			    $second = get_categories( $args );
				$categories = array_merge($first, $second);
			?>

			<!-- Get content -->
			<?php foreach ($categories as $cat) {
				$name = $cat->name;
				$slug = $cat->slug;
				echo '<div class="feature">';
				echo '<a href="http://www.iamthevoluntourist.com/category/'.$slug.'"><h3>'.$name.'</h3></a><h4 class="title">';
				$args = array(
					'category_name' => $slug,
					'posts_per_page' => 1
				);
				query_posts( $args );
				while ( have_posts() ) : the_post();
					echo the_title();
					echo '</h4>';
					echo the_content('read more');
				endwhile;
				echo '</div>';
			} ?>

			</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
