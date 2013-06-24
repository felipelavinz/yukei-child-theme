<?php
/**
 * The default template for displaying content
 *
 * @package Baylys
 * @since Baylys 1.0
 */
global $content_width;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'loop-feature' );
		if ( $image[1] >= 772 ) :
	?>
	<header class="entry-header entry-header-has-thumbnail">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'baylys' ), the_title_attribute( 'echo=0' ) ); ?>>"><?php the_post_thumbnail('loop-feature') ?></a>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'baylys' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<aside class="entry-details">
			<ul>
				<li><a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a></li>
				<li class="entry-comments"><?php comments_popup_link( __( '0 comments', 'baylys' ), __( '1 comment', 'baylys' ), __( '% comments', 'baylys' ), 'comments-link', __( '', 'baylys' ) ); ?></li>
				<li class="entry-edit"><?php edit_post_link(__( 'Edit', 'baylys') ); ?></li>
			</ul>
		</aside><!--end .entry-details -->
	</header><!--end .entry-header -->
	<?php else : ?>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'baylys' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<aside class="entry-details">
			<ul>
				<li><a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a></li>
				<li class="entry-comments"><?php comments_popup_link( __( '0 comments', 'baylys' ), __( '1 comment', 'baylys' ), __( '% comments', 'baylys' ), 'comments-link', __( '', 'baylys' ) ); ?></li>
				<li class="entry-edit"><?php edit_post_link(__( 'Edit', 'baylys') ); ?></li>
			</ul>
		</aside><!--end .entry-details -->
	</header><!--end .entry-header -->
	<?php endif; ?>

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- end .entry-summary -->

	<?php else : ?>

	<div class="entry-content clearfix">

		<?php // Show Excerpt via Theme Options
			$options = get_option('baylys_theme_options');
			if( $options['show-excerpt'] ) : ?>
				<?php the_excerpt(); ?>
		<?php else : ?>
				<?php the_content( __( 'Read more', 'baylys' ) ); ?>
		<?php endif; ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'baylys' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<?php endif; ?>

	<footer class="entry-meta">
		<ul>
			<li class="entry-cats"><?php the_category(''); ?></li>
			<?php // Include Share-Btns
				$options = get_option('baylys_theme_options');
				if( $options['share-posts'] ) : ?>
				<?php get_template_part( 'share'); ?>
			<?php endif; ?>
		</ul>
	</footer><!-- end .entry-meta -->

</article><!-- end post -<?php the_ID(); ?> -->