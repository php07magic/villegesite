<?php
/**
 * The loop that displays a single post.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
		
		<header id="post-sidebar" class="left col-span-3">
			<div id="post-sidebar-inner" class=" wow customfadeInUp">
				<span class="post-date"><?php the_time('d/m/y'); ?></span>
				<h1 class="title-mrgn"><?php the_title(); ?></h1>
				<?php $buynow = get_post_meta( get_the_ID(), 'buynow', true ); 
				if($buynow == 'yes'){ ?>
				<div class="buy-btn"><a href="//villiers-london.myshopify.com" class="btn-store btn" alt=""> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Online</a></div>
				<?php }	?>
               <ul class="social-icons left">
					<li class="uppercase label">Share</li>
					<li class="facebook-icon social-icon">
						<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li class="twitter-icon social-icon">
						<a href="http://twitter.com/share?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" target="_blank" title="Click to share this post on Twitter" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li class="googleplus-icon social-icon">
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
				</ul>
			</div>
		</header>
		
		<div class="col-span-32 right wow customfadeInUp" data-wow-delay="0.4s">
			<div class="post-inner-wrapper">
				<?php the_content(); ?>
				<a class="read-more" href="<?php echo home_url( '/' ) ?>our-journal" title="">BACK TO OUR JOURNAL</a>
			</div>
		</div>
				
		<?php wp_link_pages( array( 'before' => '<nav>' . __( 'Pages:', 'starkers' ), 'after' => '</nav>' ) ); ?>
			
	</article>

<?php endwhile; // end of the loop. ?>