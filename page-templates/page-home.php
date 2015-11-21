<?php
/**
 * Template Name: Home Page
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

	<div class="site-branding">
		<?php layerslider(2) ?>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
		<p class="site-description"><?php bloginfo( 'description' ); ?></p>
	</div><!-- .site-branding -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- IDs: -->
			<!-- Articles 13 -->
			<!-- Celebrities Give Back 6 -->
			<!-- Get Inspired 7 -->
			<!-- Media 2 -->
			<!-- Must See 8 -->
			<!-- News 9 -->
			<!-- Reviews 10 -->
			<!-- Special Features 11 -->
			<!-- Travel 3 -->
			<!-- Travel Tips 4 -->

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
				$args = array(
					'category_name' => $slug,
					'posts_per_page' => 1
				);
				query_posts( $args );
				while ( have_posts() ) : the_post();
					$link = get_the_permalink();
					$title = get_the_title();
					echo '<div class="feature">';
					echo '<a href="http://www.iamthevoluntourist.com/category/'.$slug.'"><h3>'.$name.'</h3></a><div class="content">';
					echo get_the_post_thumbnail();
					echo '<h4 class="title"><a href="'.$link.'">'.$title.'</a></h4>';
					echo the_excerpt('read more');
				endwhile;
				echo '</div></div>';
			} ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
