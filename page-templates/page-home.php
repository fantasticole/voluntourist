<?php
/**
 * Template Name: Home Page
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

	<div class="site-branding">
		<div class="carousel">
			<i class="left fa fa-angle-left fa-3x"></i>
			<ol class="visuals">
				<li class="current"><iframe src="https://www.youtube.com/embed/VZO4kUq__Fc" frameborder="0" allowfullscreen></iframe></li>
				<li><iframe src="https://www.youtube.com/embed/xUhpqxrfmE4" frameborder="0" allowfullscreen></iframe></li>
				<li><img src="http://www.iamthevoluntourist.com/images/chic1.jpg"></li>
				<li><img src="http://iamthevoluntourist.com/images/jef2.jpg"></li>
			</ol>
			<i class="right fa fa-angle-right fa-3x"></i>
		    <ul class="slider-dots">
			    <li class="active-dot">•</li>
			    <li>•</li>
			    <li>•</li>
			    <li>•</li>
		    </ul>
		</div>
		<?php if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php else : ?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php endif; ?>
		<p class="site-description"><?php bloginfo( 'description' ); ?></p>
	</div><!-- .site-branding -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

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
