<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amigawp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="contentWin">
                    <div class="winBar">
                        <span class="square"></span>
				<?php
					the_archive_title( '<span class="windowTitle"><h1 class="page-title">', '</h1></span>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
						<span class="windowLines"><hr /></span>
                        <span class="windowIcons"><span class="winIconOne"></span><span class="winSep"></span><span class="winIconTwo"></span></span>
                    </div>
                </div>
			</header><!-- .page-header -->
			<div class="singleContent spaced">	
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
            ?>
        
            <?php
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
            </div>
			
		</main><!-- #main -->			
		<span class="resizeIcon">
			<span class="boxOne"></span>
			<span class="boxTwo"></span>
		</span>
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
