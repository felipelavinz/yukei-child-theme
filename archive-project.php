<?php
/**
  * Template Name: Portfolio
 * Description: A Page Template that showcases all Posts in the Category Portfolio
 *
 * @package Baylys
 * @since Baylys 1.0
 */

get_header(); ?>

		<div id="main-wrap">
		<div id="content" class="fullwidth">
			<article id="archive-<?php echo get_queried_object()->name; ?>" class="entry-archive intro page">
				<header class="entry-header">
					<h1 class="entry-title"><?php echo get_queried_object()->label ?></h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php echo wpautop(get_queried_object()->description); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'portfolio' ); ?>
				<?php endwhile; // end of the loop. ?>

		</div><!-- end #content .fullwidth -->
	</div><!-- end #main-wrap -->

<?php get_footer(); ?>