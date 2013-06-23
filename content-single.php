<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Baylys
 * @since Baylys 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<aside class="entry-details">
			<ul>
				<li><a href="<?php the_permalink(); ?>" class="entry-date"><?php echo get_the_date(); ?></a></li>
				<li class="entry-comments"><?php comments_popup_link( __( '0 comments', 'baylys' ), __( '1 comment', 'baylys' ), __( '% comments', 'baylys' ), 'comments-link', __( '', 'baylys' ) ); ?></li>
				<li class="entry-edit"><?php edit_post_link(__( 'Edit', 'baylys') ); ?></li>
			</ul>
		</aside><!--end .entry-details -->
	</header><!--end .entry-header -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'baylys' ), 'after' => '</div>' ) ); ?>
	</div><!-- end .entry-content -->

	<footer class="entry-meta">
		<ul>
			<li class="entry-cats"><?php _e('Posted in:', 'baylys') ?></span> <?php the_category( ', ' ); ?></li>
			<?php $tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ): ?>
			<li class="entry-tags"><span><?php _e('Tagged:', 'baylys') ?></span> <?php the_tags( '', ', ', '' ); ?></li>
			<?php endif; ?>
			<?php // Include Share Buttons on single posts
				$options = get_option('baylys_theme_options');
				if($options['share-singleposts'] or $options['share-posts']) : ?>
				<?php get_template_part( 'share'); ?>
			<?php endif; ?>
		</ul>
	</footer><!-- end .entry-meta -->

		<?php if ( get_post_format() ) : // Show author bio only for standard post format posts ?>
			<?php else: ?>
			<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
		<div class="author-info">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'baylys_author_bio_avatar_size', 100 ) ); ?>
				<div class="author-details">
					<h3><?php printf( __( 'Posted by %s', 'baylys' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='author'>" . get_the_author() . "</a>" ); ?></h3>
					<?php $url = get_the_author_meta('user_url', $author_id); ?>
					<a href="<?php echo $url; ?>" class="author-url"><?php echo str_replace('http://', '', $url);?></a>
				</div><!-- end .author-details -->
					<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
			</div><!-- end .author-info -->
			<?php endif; ?>
		<?php endif; ?>

</article><!-- end .post-<?php the_ID(); ?> -->