<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>
<div class="store-onlines"><!--<a href="//villiers-london.myshopify.com" class="btn-store btn" alt=""> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Online
</a>--></div>
<section class="white-bg"> 
	<div class="page-block-padding outer-wrapper">
	 	<?php get_template_part( 'loop', 'single' ); ?>
	 	<?php $posts = get_field('related_posts');

		if( $posts ): $count=0; ?>
			<section class="related-posts">
				<h2 class="section-label top-label wow fadeInDown">You may also be interested in...</h2>
			 	<div class=" post-list-wrap">
				<?php foreach( $posts as $post): $count++; // variable must be called $post (IMPORTANT) ?>
					<?php setup_postdata($post); ?>
				    <article id="post-<?php the_ID(); ?>" <?php post_class('relative wow customfadeInUp'); ?>  data-wow-delay="0.<?php echo $count; ?>s">

			         	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blogthumb' );
			         	$url = $thumb['0']; ?>
			         	<a class="overlay high-zindex" href="<?php the_permalink(); ?>" title=""></a>
			         	<img class="thumbnail" src="<?php echo $url; ?>" alt="" />

					 	<div class="overlay dark-overlay">
						 	<div class="align-middle centered">
								<header>
									<span class="post-date"><?php the_time('d/m/y'); ?></span>
					                <h2><?php the_title(); ?></h2>
					            </header>

					            <a class="read-more" href="<?php the_permalink(); ?>" title="">Read more</a>
						 	</div>
					 	</div>

					</article>
				<?php endforeach; ?>
			 	</div>
			</section>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
	</div>
</section>

<section class="newsletter-wrapper <?php $posts = get_field('related_posts'); if( $posts ) { ?>with-related<?php } ?> cream-bg relative">
	<div class="inner-wrapper centered wow customfadeInUp">
		<?php echo do_shortcode('[contact-form-7 id="89" title="Newsletter signup form"]'); ?>
	</div>
</section>

<?php get_footer(); ?>
