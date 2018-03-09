<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amigawp
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_singular() ) : ?>
    <header class="entry-header">
        <div class="contentWin">
            <div class="winBar">
                <span class="square"></span>
                <?php the_title( '<span class="windowTitle"><h1 class="entry-title">', '</h1></span>' ); ?>
                <span class="windowLines"><hr /></span>
                <span class="windowIcons"><span class="winIconOne"></span><span class="winSep"></span><span class="winIconTwo"></span></span>
            </div>
        </div>
    </header><!-- .entry-header -->
    <?php endif; ?>
<?php /**    
     <div class="contentWin">     
        <div class="contentWinInside">
*/?>
    <?php if ( !is_singular() ) : 
        the_title( '<span class="windowTitle"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></span>' );                
        endif; 
    ?>
    <?php if ( 'post' === get_post_type() ) : ?>
	<div class="singleContent <?php if ( is_singular() ) : ?>spaced<?php endif; ?>">
        <div class="entry-meta">
            <?php amigawp_posted_on(); amigawp_posted_by(); amigawp_entry_footer(); ?>
        </div><!-- .entry-meta -->
    <?php endif; ?>

    <?php 
        if ( is_singular() ) :
        amigawp_post_thumbnail(); 
    ?>
        <div class="entry-content">
            <?php
                the_content( sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'amigawp' ),
                        array(
                            'span' => array(
	                            'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'amigawp' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
	<?php if ( 'post' === get_post_type() ) : ?>
	</div>
	<?php endif; ?>
	<?php /**
        <footer class="entry-footer">
            <?php amigawp_entry_footer(); ?>
        </footer><!-- .entry-footer -->
	*/ ?>
    <?php
        else : echo '';
        endif;       
    ?>
<?php /*				
        </div><!-- contentWinInside -->
    </div><!-- contentWin -->
*/ ?>	
</article><!-- #post-<?php the_ID(); ?> -->
