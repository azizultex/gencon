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
	<body>
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"></a>
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					  </button>
				</div>
					<?php
						wp_nav_menu( array(
							'menu'                    => 'primary',
							'theme_location'      => 'primary',
							'depth'                    => 2,
							'container'              => 'div',
							'container_class'    => 'collapse navbar-collapse',
							'container_id'         => 'navbar-collapse-1',
							'menu_class'          => 'nav navbar-nav',
							'fallback_cb'           => 'wp_bootstrap_navwalker::fallback',
							'walker'                  => new wp_bootstrap_navwalker())
						);
					?>
			</nav>
		</header>									