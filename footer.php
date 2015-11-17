<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package voluntourist
 */

?>

	</div><!-- #content -->

	<footer id="footer" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="social">
				<a href="https://www.facebook.com/pages/The-Voluntourist/152316794838183" target="_blank"><i class="fa fa-facebook-square"></i><span class="socialLink"> Facebook</span></a>
				<a href="http://www.youtube.com/results?search_query=iamthevoluntourist" target="_blank"><i class="fa fa-youtube-square"></i><span class="socialLink"> YouTube</span></a>
				<a href="https://instagram.com/iamthevoluntourist/" target="_blank"><i class="fa fa-instagram"></i><span class="socialLink"> Instagram</span></a>
			</div>
			<div class="copyright">
				<?php printf( esc_html__( '© 2015 %2$s.', 'voluntourist' ), 'voluntourist', '<a href="http://fantasticole.github.io/" rel="designer" target="_blank">fantasticole</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
