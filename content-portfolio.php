<?php
/**
 * The template for displaying content of the portfolio category
 *
 * @package Baylys
 * @since Baylys 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-element'); ?>>

	<div class="entry-content clearfix">
		<?php if ( has_post_thumbnail() ): ?>
			<a href="<?php the_permalink(); ?>" class="portfolio-thumb"><?php the_post_thumbnail('project-thumbnail'); ?></a>
		<?php endif; ?>

		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'baylys' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<?php the_excerpt(); ?>
	</div><!-- end .entry-content -->

</article><!-- end post -<?php the_ID(); ?> -->