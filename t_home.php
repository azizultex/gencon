<?php
/*
Template Name: Home
*/
get_header(); ?>

	<div class="container sd">
		<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<button class="scrollDown"><i class="icon-arrow-down"></i></button>
				</div>
			</div>
		</div>
	</div>

	<div id="primary" class="content-area">

		<section class="services">
			<div class="container">
				<?php $services = get_field('home_services'); if ($services): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title text-center">
							<?php if ($services['title']): ?>
							<h4 class="title"><?php echo $services['title']; ?></h4>
							<?php endif; ?>

							<?php echo $services['description']; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php 
					$sn = $services['number_of_services'] ? $services['number_of_services'] : '-1';
					$args = array(
						'post_type' => 'service',
						'posts_per_page' => $sn,
					);
					$loop = new WP_Query( $args );
					if ($loop->have_posts()) :
				?>
				<div class="row eq-height justify-content-center">
					<?php while ($loop->have_posts()) : $loop->the_post(); $service = get_field('service'); ?>
					<div class="col-md-2 col-sm-3 col-xs-4 col">
						<a id="service-<?php the_ID(); ?>" <?php post_class('service-item text-center'); ?> href="<?php the_permalink(); ?>">
							<?php if ($service['icon']): ?>
							<div class="icon">
								<i class="<?php echo $service['icon']; ?>"></i>
							</div>
							<?php endif; ?>

							<div class="text">
								<h6><?php the_title(); ?></h6>
							</div>

							<div class="arrow">
								<i class="icon-arrow-right"></i>
							</div>
						</a>
					</div><!-- /service-item -->
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</section><!-- /services -->

		<section class="latest-projects">
			<div class="container">
				<?php $projects = get_field('home_projects'); if ($projects): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title text-center">
							<?php if ($projects['title']): ?>
							<h4 class="title"><?php echo $projects['title']; ?></h4>
							<?php endif; ?>

							<?php echo $projects['description']; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php 
					$sn = $projects['number_of_services'] ? $projects['number_of_services'] : '3';
					$args = array(
						'post_type' => 'project',
						'posts_per_page' => $sn,
						'meta_value' => 'yes',
						'meta_key' => '_is_ns_featured_post', 
					);
					$loop = new WP_Query( $args );
					if ($loop->have_posts()) :
				?>
				<div class="row eq-height justify-content-center">
					<?php while ($loop->have_posts()) : $loop->the_post(); $project_options = get_field('project_options'); ?>
					<div class="col-md-4 col-sm-6 col-xs-6 col">
						<a id="featured-project-<?php the_ID(); ?>" <?php post_class('project-item'); ?>  href="<?php the_permalink(); ?>">
							<div class="media">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
								<?php else: ?>
									<img src="<?php echo get_theme_file_uri(); ?>/images/project-placeholder.jpg" class="img-responsive" alt="">
								<?php endif; ?>
							</div>

							<div class="content">
								<div class="center">
									<?php if ($project_options['location']): ?>
									<h6 class="location"><?php echo $project_options['location']; ?></h6>
									<?php endif; ?>

									<h5 class="title"><?php the_title(); ?></h5>

									<?php if ($project_options['tagline']): ?>
									<p class="sub-title"><?php echo $project_options['tagline']; ?></p>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</div><!-- /project-item -->
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</section><!-- /latest-projects -->

		<?php $about = get_field('home_about');  if ($about): ?>
		<section class="about coverbg align-center-v" style="background-image: url(<?php echo $about['image']['url']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content text-center">
							<?php if ($about['title']): ?>
							<h3 class="title"><?php echo $about['title']; ?></h3>
							<?php endif; ?>
	
							<?php if ($about['content']): ?>
							<h4><?php echo $about['content']; ?></h4>
							<?php endif ?>

							<?php if ($about['button']['type'] == 'internal'): ?>
							<a href="<?php echo $about['button']['internal_url']; ?>" class="btn white"><?php echo $about['button']['text']; ?></a>
							<?php elseif($about['button']['type'] == 'external'): ?>
							<a href="<?php echo $about['button']['external_url']; ?>" class="btn white" target="_blank"><?php echo $about['button']['text']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /about -->
		<?php endif; ?>

		<section class="latest-news">
			<div class="container">
				<?php $page_for_posts = get_option( 'page_for_posts' ); $header_title = get_field('page_header_title', $page_for_posts); if ($header_title): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title text-center">
							<h4 class="title"><?php echo $header_title; ?></h4>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php 
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
					);
					$loop = new WP_Query( $args );
					if ($loop->have_posts()) :
				?>
				<div class="row eq-height justify-content-center">
					<?php while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class="col-md-3 col-sm-6 col-xs-6 col">
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
							<div class="media">
								<a href="<?php the_permalink(); ?>">
									<?php if (has_post_thumbnail()): ?>
										<?php the_post_thumbnail('blog-post', array('class' => 'img-responsive')); ?>
									<?php else: ?>
										<img src="<?php echo get_theme_file_uri(); ?>/images/blog-post-placeholder.jpg" class="img-responsive" alt="">
									<?php endif; ?>
								</a>
							</div>

							<div class="content">
								<a href="<?php $archive_year = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><span class="date"><?php echo get_the_date(); ?></span></a>
								<a href="<?php the_permalink(); ?>"><h5 class="title"><?php the_title(); ?></h5></a>
								<a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Keep Reading', 'gencon'); ?></a>
							</div>
						</article>
					</div><!-- /blog-post -->
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</section><!-- /latest-news -->

		<?php $call_to_action = get_field('call_to_action'); if ($call_to_action): ?>
		<section class="community-team">
			<div class="container">
				<div class="row">
					<?php foreach ($call_to_action as $call): ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<a href="<?php echo $call['url'].$call['anchor']; ?>" class="community-team-item coverbg align-center-v" style="background-image: url(<?php echo $call['image']['url']; ?>);">
							<div class="content">	
								<?php if ($call['sub_title']): ?>
								<span class="sub-title"><?php echo $call['sub_title']; ?></span>
								<?php endif; ?>
								
								<?php if ($call['title']): ?>
								<h4 class="title"><?php echo $call['title']; ?></h4>
								<?php endif; ?>

								<?php if ($call['url']): ?>
								<button class="pull-right"><i class="icon-arrow-right"></i></button>
								<?php endif; ?>
							</div>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /community-team -->
		<?php endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>