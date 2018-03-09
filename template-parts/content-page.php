<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amigawp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="contentWin">
            <div class="winBar">
                <span class="square"></span>
                <?php the_title( '<span class="windowTitle"><h1 class="entry-title">', '</h1></span>' ); ?>
                <span class="windowLines"><hr /></span>
                <span class="windowIcons"><span class="winIconOne"></span><span class="winSep"></span><span class="winIconTwo"></span></span>
            </div>
        </div>
	</header>
	
	<div class="singleContent spaced">
		<div class="entry-meta">
			<?php amigawp_posted_on(); amigawp_posted_by(); amigawp_entry_footer(); ?>
		</div><!-- .entry-me -->

		<?php amigawp_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amigawp' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'amigawp' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
