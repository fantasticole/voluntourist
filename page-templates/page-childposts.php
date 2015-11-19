<?php
/**
 * Template Name: Child Content Page
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

			<div id="childContent">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					$children = get_pages('child_of='.$post->ID.'&parent='.$post->ID);
					$childPosts = array();
				?>
				<?php foreach ( $children as $child ) : 
				    setup_postdata( $child ); ?>
					<?php $slug = basename(get_permalink($child)); ?>
					<?php $posts = array(); ?>
					<?php
						$args = array(
							'category_name' => $slug,
							'showposts' => 3
						);
						query_posts( $args );
					if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
					<?php
					$thumb = get_the_post_thumbnail();
					$permalink = get_permalink();
					$title = get_the_title();
					$excerpt = get_the_excerpt();
					array_push($posts,$thumb,$permalink,$title,$excerpt);
					?>
					<?php endwhile; ?><?php endif; ?>
					<?php array_push($childPosts,$posts); ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
				<?php foreach ( $children as $index => $child ) : 
				    setup_postdata( $child ); ?>
				<div id="childPage" class="post-<?php echo $child->ID; ?>">
					<h2>
						<a href="<?php echo get_permalink($child->ID); ?>">
							<?php echo get_the_title( $child ); ?>
						</a>
					</h2>
					<p>
						<?php echo get_the_excerpt($child); ?>
					</p>
					<?php for ($num = 0; $num < count($childPosts[$index]); $num+=4){
							echo '<div class="article">';
							echo $childPosts[$index][$num];
							echo '<a href="'.$arr[$num+1].'"><h4>'.$childPosts[$index][$num+2].'</h4></a>';
							echo '<p class="childText">';
							echo $childPosts[$index][$num+3];
							echo '</p></div>';
					} ?>
				</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>


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
