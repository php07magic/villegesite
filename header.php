<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7 <?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php body_class("no-js"); ?><?php language_attributes(); ?>> <!--<![endif]-->
    <head>
    	<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <?php get_template_part('/partials/header/meta');?>
        <title><?php wp_title( '|', true, 'right' );?></title>

        <!--[if lt IE 9]>
        	<script src="/wp-includes/js/html5/html5shiv.js"></script>
        <![endif]-->
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>

        <!-- Google Analytics -->
        <!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-80320344-1', 'auto');
  ga('send', 'pageview');

</script>
-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84581217-1', 'auto');
  ga('send', 'pageview');

</script>





<!-- End Google Analytics -->

    </head>

	<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
	    <div class="outdated">You are using an <strong>outdated</strong> browser, please <a href="http://whatbrowser.org/" class="popup" title="Click to upgrade your browser">upgrade your browser</a> to enjoy all the available features of this site.</div>
	<![endif]-->
<?php 
$ID = get_the_ID(); 
if($ID == 10734){
	
?>
<div class="store-onlines"><a href="//villiers-london.myshopify.com" class="btn-store btn" alt=""> <i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Online
</a></div>
<?php	
}


?> 

<div id="main">
	<!-- PRELOADER -->
	<?php get_template_part('/partials/misc/preloader');?>

	<div id="allcontent">
	 	<!-- SITE HEADER -->
	 	<?php get_template_part('/partials/header/site-header');?>

		<!-- MENU OVERLAY -->
		<?php get_template_part('/partials/misc/menu-overlay');?>

		<!-- SEARCH OVERLAY -->
		<?php get_template_part('/partials/misc/search-overlay');?>



		<?php if(is_front_page()) {



		} elseif(is_404()) {?>


		<?php } elseif(is_search()) { ?>



		<?php } elseif(is_singular('post')) {
			require_once 'Mobile_Detect.php';
			$detect = new Mobile_Detect;

			$aBackgroundImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'blog_header' );
			$sBackgroundImage = $aBackgroundImage['0'];

			//	blog_header
			if( $detect->isMobile() && !$detect->isTablet() ){
				if(get_field('mobile_featured_image')) {
					$image = get_field('mobile_featured_image');
					$size = 'mobileheaders'; // (thumbnail, medium, large, full or custom size)
					$image_attributes = wp_get_attachment_image_src( $image, $size ); ?>

					<section class="inner-header parallax-banner half-browser-height" style="background-image: url(<?php echo $image_attributes[0]; ?>);">
					<div class="overlay dark-overlay"></div>
					<img class="parallax-image" src="<?php echo $image_attributes[0]; ?>" alt="" />
				<?php } else { ?>
					<section class="inner-header relative half-browser-height cover" style="background-image: url(<?php echo $sBackgroundImage ; ?>);">
					<div class="overlay dark-overlay"></div>
				<?php }
			} else { ?>
				<section class="inner-header half-browser-height cover relative " style="background-image: url(<?php echo $sBackgroundImage ; ?>);">
				<div class="overlay dark-overlay"></div>
			<?php } ?>


			</section>

		<?php } elseif(is_home() || is_category()) {

			$image = get_field('journal_header_image', 'options');
			$size = 'large'; // (thumbnail, medium, large, full or custom size)
			$image_attributes = wp_get_attachment_image_src( $image, $size ); ?>

			<section class="inner-header parallax-banner half-browser-height" style="background-image: url(<?php echo $image_attributes[0]; ?>);">
				<img class="parallax-image" src="<?php echo $image_attributes[0]; ?>" alt="" />
					<div class="outer-wrapper">
						<div class="intro-content centered-content centered hkhkhk">
							<h1 class=" wow customfadeInUp">
								<?php if(is_home()) { ?>
									Our Journal
								<?php } elseif(is_category()) { ?>
									<?php printf( __( 'Category Archives: %s', 'starkers' ), '' . single_cat_title( '', false ) . '' ); ?>
								<?php } ?>
							</h1>
						</div>
					</div>
				</div>
			</section>

		<?php } else {

			require_once 'Mobile_Detect.php';
			$detect = new Mobile_Detect;

			if(is_page_template('hospitality-detail-page.php') and strlen(get_field("hosp_banner_text")) > 0) {
				$sTitle = get_field("hosp_banner_text");
			} else {
				$sTitle = get_the_title();
			}

			if( $detect->isMobile() && !$detect->isTablet() && get_field('mobile_featured_image') ){
				$image = get_field('mobile_featured_image');
				$size = 'mobileheaders'; // (thumbnail, medium, large, full or custom size)
				$image_attributes = wp_get_attachment_image_src( $image, $size ); ?>
					<section class="inner-header parallax-banner <?php if(is_page_template('service-landing-page.php') || is_page_template('creative-landing-page.php') || is_page_template('contact-page.php') || is_page_template('form-page.php') || is_page_template('onecolumn-page.php') || is_page_template('venue-finding.php')) { ?>half-browser-height<?php } else { ?>browser-height<?php } ?> cover-bg relative" style="background-image: url(<?php echo $image_attributes[0]; ?>);">
					<img class="parallax-image" src="<?php echo $image_attributes[0]; ?>" alt="" />
			<?php } else {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
				$url = $thumb['0']; ?>
					<section class="inner-header parallax-banner <?php if(is_page_template('hospitality-detail-page.php') || is_page_template('service-landing-page.php') || is_page_template('creative-landing-page.php') || is_page_template('contact-page.php') || is_page_template('form-page.php') || is_page_template('onecolumn-page.php') || is_page_template('venue-finding.php')) { ?>half-browser-height<?php } else { ?>browser-height<?php } ?> cover-bg relative" style="background-image: url(<?php echo $url; ?>);">
					<img class="parallax-image" src="<?php echo $url; ?>" alt="" />
			<?php } ?>

				<?php if(!is_page_template('contact-page.php') && !is_page_template('form-page.php') && !is_page_template('onecolumn-page.php')) { ?>
					<div class="overlay dark-overlay"></div>
				<?php } ?>
				<div class="outer-wrapper">
					<div class="intro-content centered-content centered ">
						<?php if(is_page_template('location-page.php') || is_page_template('creative-child-page.php')) { ?>
							<span class="parent-title wow customfadeInUp"><a href="<?php echo get_the_permalink( $post->post_parent ); ?>" title=""><?php echo get_the_title( $post->post_parent ); ?></a></span>
						<?php } ?>
						<h1 class="wow customfadeInUp
							<?php if(get_field('inner_page_header_description')) { ?>
								bordered-title
							<?php } ?>
						" data-wow-delay="0.2s"><?php echo $sTitle; ?></h1>
						<?php if(get_field('inner_page_header_description')) { ?>
							<p class=" wow customfadeInUp" data-wow-delay="0.4s"><?php the_field('inner_page_header_description'); ?></p>
						<?php } ?>
						<?php
							$posts = get_field('child_page_links');
							if( $posts ): ?>
								<ul class="inner-header-child-links wow customfadeInUp" data-wow-delay="0.6s">
								<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									<?php setup_postdata($post); ?>
								    <li>
								    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								    </li>
								<?php endforeach; ?>
								</ul>
							<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif; ?>
						<?php if(get_field('what_we_can_do_blocks') and !is_page_template('hospitality-detail-page.php')) { ?>
							<ul class="inner-header-child-links wow customfadeInUp" data-wow-delay="0.6s">
								<li>
									<a class="no-ajax" href="#whatwecando">See what we can do</a>
								</li>
							</ul>
						<?php } ?>
					</div>
				</div>
			</section>
		<?php } ?>







