<?php
/*
Template Name: About Us
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<?php $about_content = get_field('about_content'); if ($about_content): ?>
		<section class="about-us">
			<div class="container">
				<?php if ($about_content['title']): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title"><?php echo $about_content['title']; ?></h3>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($about_content['featured']): $rl_featured = $about_content['featured']; array_pop($rl_featured); $lastEl = array_pop((array_slice($about_content['featured'], -1)));  ?>
				<div class="row">
					<?php if ($rl_featured): ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php foreach ($rl_featured as $featured): ?>
						<div class="about-item">
							<?php if ($featured['icon']): ?>
							<div class="icon pull-left">
								<i class="<?php echo $featured['icon']; ?>"></i>
							</div>
							<?php endif ?>

							<?php if ($featured['title'] || $featured['content']): ?>
							<div class="content">
								<?php if ($featured['title']): ?>
								<h6><?php echo $featured['title']; ?></h6>
								<?php endif; ?>

								<?php echo $featured['content']; ?>
							</div>
							<?php endif ?>
						</div><!-- /about-item -->
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

					<?php if ($lastEl): ?>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="about-item">
							<?php if ($lastEl['icon']): ?>
							<div class="icon pull-left">
								<i class="<?php echo $lastEl['icon']; ?>"></i>
							</div>
							<?php endif ?>

							<?php if ($lastEl['title'] || $lastEl['content']): ?>
							<div class="content">
								<?php if ($lastEl['title']): ?>
								<h6>Delivery</h6>
								<?php endif; ?>

								<?php echo $lastEl['content']; ?>
							</div>
							<?php endif ?>
						</div><!-- /about-item -->
					</div>
					<?php endif ?>
				</div>
				<?php endif; ?>
			</div>
		</section><!-- /about-us -->
		<?php endif; ?>

		<?php $our_history = get_field('our_history'); if ($our_history): ?>
		<section class="about about-mission coverbg align-center-v" style="background-image: url(<?php echo $our_history['image']['url']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content text-center">
							<?php if ($our_history['title']): ?>
							<h3 class="title"><?php echo $our_history['title']; ?></h3>
							<?php endif; ?>

							<?php if ($our_history['content']): ?>
							<h5><?php echo $our_history['content']; ?></h5>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /about -->
		<?php endif; ?>

		<?php $team = get_field('team'); if ($team): ?>
		<section class="meet-team">
			<a id="team" class="blankSpace"></a>
			<div class="container">
				<?php if ($team['title']): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title"><?php echo $team['title']; ?></h3>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($team['team_member']): ?>
				<div class="row eq-height">
					<?php foreach ($team['team_member'] as $member): ?>
					<div class="col-md-3 col-sm-6 col-xs-6 col">
						<div class="team-member">
							<?php if ($member['image']): ?>
							<div class="media">
								<img src="<?php echo $member['image']['url']; ?>" class="img-responsive" alt="<?php echo $member['image']['alt']; ?>">
							</div>
							<?php endif; ?>

							<?php if ($member['name'] || $member['position'] || $member['bio']): ?>
							<div class="content">
								<?php if ($member['name'] || $member['position']): ?>
								<h6 class="name"><?php echo $member['name']; ?> <span class="position"><?php echo $member['position']; ?></span></h6>
								<?php endif; ?>

								<?php echo $member['bio']; ?>
							</div>
							<?php endif; ?>
						</div>
					</div><!-- /team-member -->
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section><!-- /meet-team -->
		<?php endif; ?>

		<?php $community = get_field('community'); if ($community): ?>
		<section class="community">
			<a id="community" class="blankSpace"></a>
			<div class="container">
				<div class="row align-center-v justify-content-center">
					<?php if ($community['title'] || $community['content']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="content">
							<?php if ($community['title']): ?>
							<div class="section-title">
								<h3 class="title"><?php echo $community['title']; ?></h3>
							</div>
							<?php endif; ?>

							<?php echo $community['content']; ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if ($community['image']): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="media">
							<img src="<?php echo $community['image']['url']; ?>" class="img-responsive" alt="<?php echo $community['image']['alt']; ?>">
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</section><!-- /community -->
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

		<?php $care = get_field('care'); if ($care): ?>
		<section class="care coverbg align-center-v" style="background-image: url(<?php echo $care['image']['url']; ?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content text-center">
							<?php if ($care['title']): ?>
							<h2 class="title"><?php echo $care['title']; ?></h2>
							<?php endif; ?>

							<?php if ($care['lists']): ?>
							<ul class="list-unstyled">
								<?php foreach ($care['lists'] as $list): ?>
								<li><?php echo $list['list']; ?></li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /care -->
		<?php endif; ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>