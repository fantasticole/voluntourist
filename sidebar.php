<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voluntourist
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<!-- Search Bar, Recent Posts, Recent Comments, Archives, Categories, Meta -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
