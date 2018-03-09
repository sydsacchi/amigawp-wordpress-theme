<?php
/*
Template Name: All Posts
*/
get_header();

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
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
			<?php
/*
            $myposts = get_posts('');
            foreach($myposts as $post) :
                setup_postdata($post);
            ?>
		    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <h2 class="post-title">
                      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                         <?php the_title(); ?>
                      </a>
                  </h2>
                  <p class="post-meta">Posted by <?php the_author(); ?></p>
           </article>
            <?php endforeach; wp_reset_postdata(); ?>
*/ 
?>
            <?php 
                // the query
                $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
                 
                <?php if ( $wpb_all_query->have_posts() ) : ?>
                    <!-- the loop -->
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="post-meta">Posted by <?php the_author(); ?></p>
                       </article>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                    <?php wp_reset_postdata(); ?>
                 
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
?>

