<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amigawp
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<div class="disks">
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Homepage</a></p>
		<p><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'All Posts' ) ) ); ?>"><?php esc_html_e( 'All Posts', 'amigawp' ); ?></a></p>
	</div>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
