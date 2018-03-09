<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amigawp
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

            if ( is_home() && is_front_page() ) : ?>
                <div class="contentWin">
                    <div class="winBar">
                        <span class="square"></span>
                        <span class="windowTitle"><h2>Latest Posts</h2></span>
						<span class="windowLines"><hr /></span>
                        <span class="windowIcons"><span class="winIconOne"></span><span class="winSep"></span><span class="winIconTwo"></span></span>
                    </div>
                </div>
				<div class="singleContent spaced">	
            <?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
                
			endwhile;

			the_posts_navigation();
            ?>
                </div>    
                <?php
                endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		<span class="resizeIcon">
			<span class="boxOne"></span>
			<span class="boxTwo"></span>
		</span>					
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
