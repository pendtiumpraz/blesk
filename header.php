<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<?php

		//Head hook
		wp_head(); 

		//Customizer values
		$header_ad = get_theme_mod('blesk_header_ad');

		$link_facebook = get_theme_mod('blesk_social_link_facebook');
		$link_twitter = get_theme_mod('blesk_social_link_twitter');
		$link_youtube = get_theme_mod('blesk_social_link_youtube');
		$link_tumblr = get_theme_mod('blesk_social_link_tumblr');
		$link_pinterest = get_theme_mod('blesk_social_link_pinterest');
		$link_dribbble = get_theme_mod('blesk_social_link_dribbble');

		//Check if any social link is available
		if($link_facebook or $link_twitter or $link_youtube or $link_tumblr or $link_pinterest or $link_dribbble) {
			$social_links = TRUE;
		} else {
			$social_links = FALSE;
		}

		//Header menus
		$top_menu_location = 'top_menu';
		$main_menu_location = 'header_menu';

	?>
</head>
<body <?php body_class(); ?>>
	<div class="overflow-h">
		<header>
			<?php if(has_nav_menu($top_menu_location) or $social_links): ?>

			<div class="top-header">
				<div class="wrapper cf">
					<?php

						//Display top menu
						if(has_nav_menu($top_menu_location)) {
							echo '<div class="top-links">';
									
								wp_nav_menu( array('theme_location' => $top_menu_location, 'container' => '', 'depth' => 1 ) );

							echo '</div><!-- /.top-links -->';
						}

						//Display social links
						if($social_links) {
							echo '<div class="social"><ul>';

								if($link_facebook)
									echo '<li><a href="'.esc_url($link_facebook).'" title="'.get_bloginfo('name'). ' ' . __('on Facebook', 'blesk').'" class="fa fa-facebook"></a></li>';

								if($link_twitter)
									echo '<li><a href="'.esc_url($link_twitter).'" title="'.get_bloginfo('name'). ' ' . __('on Twitter', 'blesk').'" class="fa fa-twitter"></a></li>';

								if($link_youtube)
									echo '<li><a href="'.esc_url($link_youtube).'" title="'.get_bloginfo('name'). ' ' . __('on YouTube', 'blesk').'" class="fa fa-youtube"></a></li>';

								if($link_tumblr)
									echo '<li><a href="'.esc_url($link_tumblr).'" title="'.get_bloginfo('name'). ' ' . __('on Tumblr', 'blesk').'" class="fa fa-tumblr"></a></li>';

								if($link_pinterest)
									echo '<li><a href="'.esc_url($link_pinterest).'" title="'.get_bloginfo('name'). ' ' . __('on Pinterest', 'blesk').'" class="fa fa-pinterest-p"></a></li>';

								if($link_dribbble)
									echo '<li><a href="'.esc_url($link_dribbble).'" title="'.get_bloginfo('name'). ' ' . __('on Dribbble', 'blesk').'" class="fa fa-dribbble"></a></li>';

							echo '</ul></div><!-- /.social -->';
						}

					?>
					
				</div><!-- /.wrapper -->
			</div><!-- /.top-header -->
			
			<?php endif; ?>

			<div class="center-header">
				<div class="wrapper cf">
					<?php

					//Display logo
					if(blesk_check_wp_version('4.5')) {
						if(has_custom_logo()) {
							the_site_logo();
						}
					} else {
						echo '<a href="'.esc_url(home_url('/')).'" class="site-logo-link" title="'.get_bloginfo('name').'" alt="'.get_bloginfo('description').'">';
						
						$logo = get_theme_mod('blesk_logo', get_stylesheet_directory_uri().'/assets/img/logo.png');
						
						if($logo) {
							echo '<img src="'.esc_url($logo).'" alt="logo" />';
						} else {
							echo '<h1>'.get_bloginfo('name').'</h1><h2>'.get_bloginfo('description').'</h2>';
						}

						echo '</a>';

					}

					//Display Header AD
					if($header_ad) {
						echo '<div class="ads-panel">'.$header_ad.'</div><!-- /.ad-panel -->';
					}

					?>
				
				</div><!-- /.wrapper -->
			</div><!-- /.center-header -->

			<div class="bottom-header">
				<div class="wrapper cf">
					<?php

					//Display main menu
					if(has_nav_menu($main_menu_location)) {
						echo '<div class="open-menu">
								<span class="fa fa-bars open"></span>
								<span class="fa fa-times close"></span>
							</div><!-- /.open-menu -->
							<nav class="menunav">';
								
							wp_nav_menu( array('theme_location' => $main_menu_location, 'container' => '' ) );

						echo '</nav><!-- /.menu -->';
					}
					
					?>
					<div class="search">
						<i class="open-search fa fa-search"></i>
						<i class="close-search fa fa-times"></i>
						<div class="search-input">
							<form action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blesk' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
								<input type="submit" value="" />
								<i class="search-btn fa fa-search"></i>
							</form>
						</div><!-- /.search-input -->
					</div><!-- /.search -->
				</div><!-- /.wrapper -->
			</div><!-- /.bottom-header -->
		</header>