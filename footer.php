<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amigawp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php if( get_theme_mod( 'footer_text_block') != "" ) { ?>
				<?php echo get_theme_mod( 'footer_text_block'); ?>
			<?php } else { ?>
				<p align="center">Copyright &copy; 2018 · AmigaWP Theme · By: <a href="https://www.sidneysacchi.com" target="_blank" title="Web Design &amp; Web Consulting">Sidney Sacchi</a> · A tribute to Amiga Workbench (Version 1 and 2) · Based on <a href="http://underscores.me/">Underscores.me</a> Theme<br />Credits and Thanks to:<br>patrick h. lauke aka redux [<a href="https://www.splintered.co.uk/" target="_blank">https://www.splintered.co.uk/</a>] for the fonts<br>and to <a href="http://www.amiga-look.org/" target="_blank">http://www.amiga-look.org/</a> and <a href="http://www.geekometry.com" target="_blank">http://www.geekometry.com/</a> for icons and cursors</p>				
			<?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
