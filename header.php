<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
		<title><?php if(is_front_page()){ echo' Home '; echo' | '; echo bloginfo('name'); } else { wp_title(''); echo' | '; bloginfo('name');  } ?></title>
		<link href="<?= get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= get_template_directory_uri(); ?>/style.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/icon/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/icon/favicon-32x32.png" sizes="32x32">
		<link rel="icon" sizes="192x192" href="<?= get_template_directory_uri(); ?>/images/icon/touch-icon-192x192.png">
		<link rel="apple-touch-icon-precomposed" sizes="180x180" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-180x180-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-152x152-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-144x144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-120x120-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-114x114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-76x76-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-72x72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="<?= get_template_directory_uri(); ?>/images/icon/apple-touch-icon-precomposed.png">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="header">
			<nav class="navbar navbar-default">
			    <div class="container align-center-v">
			        <div class="navbar-header">
			            <div class="logo">
			                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			                	<?php $logo = get_field('logo', 'options'); if ($logo): ?>
			                    <img src="<?php echo $logo['url']; ?>" class="img-responsive" alt="<?php echo $logo['alt']; ?>">
			                    <?php else: ?>
			                    <img src="<?php echo get_theme_file_uri(); ?>/images/logo.png" class="img-responsive" alt="GenCon">
			                	<?php endif; ?>
			                </a>
			            </div><!-- /logo -->
			
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
			                <span class="icon-bar"><span class="inner"></span></span>
						  	<span class="icon-bar"><span class="inner"></span></span>
						  	<span class="icon-bar"><span class="inner"></span></span>
			            </button>
			        </div>

			        <div class="navbar-collapse collapse">
			            <?php 
					  		wp_nav_menu( array(
	                            'menu'               => 'Primary menu',
	                            'theme_location'     => 'menu-1',
	                            'depth'              => 2,
	                            'container'          => 'false',
	                            'menu_class'         => 'nav navbar-nav navbar-right',
	                            'menu_id'            => '',
	                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
	                            'walker'             => new wp_bootstrap_navwalker(),
	                        ));
	                    ?>

	                    <?php $social_media = get_field('social_media', 'options'); if ($social_media): ?>
			            <ul class="social-media list-inline">
			            	<?php foreach ($social_media as $social): ?>
			        		<li><a href="<?php echo $social['url']; ?>" target="_blank"><i class="<?php echo $social['icon']['value']; ?>"></i></a></li>
			            	<?php endforeach; ?>
			        	</ul>
	                    <?php endif; ?>

	                    <?php $contacts = get_field('contacts', 'options'); if ($contacts): ?>
			        	<ul class="contacts list-inline">
			        		<?php if ($contacts['phone']): ?>
			            	<li><a href="tel:<?php echo $contacts['phone']; ?>"><i class="icon-phone"></i><?php echo $contacts['phone']; ?></a></li>
			        		<?php endif; ?>

			        		<?php if ($contacts['email']): ?>
			            	<li><a href="mailto:<?php echo $contacts['email']; ?>"><i class="icon-envelope"></i><?php echo $contacts['email']; ?></a></li>
			        		<?php endif; ?>
			            </ul>
	                    <?php endif; ?>
			        </div><!-- /navbar-collapse -->
			    </div><!-- /container -->
			</nav>
		</header><!-- /header -->
		<?php 
		$disable_header = get_field('disable_header', getPageID());
		$header_title = get_field('page_header_title', getPageID());
		$header_description = get_field('page_header_description', getPageID());
		$header_background = get_field('page_header_background', getPageID());

		$title = $header_title ? $header_title : get_the_title();
		$header_bg = $header_background ? $header_background : get_theme_file_uri()."/images/banner-about.jpg";

		if ($disable_header || is_singular('post') || is_date() || is_404() || is_singular('project')): ?>
		<div class="header_gutter"></div>
		<?php endif; ?>

		<?php if (!is_singular('post') && !is_singular('project') && !is_404() && !is_date() && !$disable_header): ?>
		<section class="banner align-center-v coverbg <?php if(is_front_page()) echo 'banner-home'; ?>" style="background-image: url(<?php echo $header_bg; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content text-center">
							<h1 class="title"><?php echo customizedtitle($title); ?></h1>

							<?php if ($header_description): ?>
							<p><?php echo $header_description; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /banner -->
		<?php endif; ?>

		<?php if (is_singular('service')): ?>
		<a id="primary" class="blankSpace"></a>
		<?php endif; ?>

		<?php if (!is_front_page()): ?>
		<section class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php echo gencon_breadcrumb(); ?>
					</div>
				</div>
			</div>
		</section><!-- /breadcrumb -->
		<?php endif; ?>