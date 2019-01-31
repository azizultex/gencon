<?php get_header(); ?>
	
	<div id="primary" class="content-area">
		
		<?php while (have_posts()) : the_post(); $project_options = get_field('project_options'); ?>
		<section class="project-page">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="content">
							<h3 class="title"><?php the_title(); ?></h3>

							<?php if ($project_options['tagline']): ?>
							<h5><?php echo $project_options['tagline']; ?></h5>
							<?php endif; ?>
							
							<?php if ($project_options['location']): ?>
							<span class="location"><?php echo $project_options['location']; ?></span>
							<?php endif; ?>

							<?php echo $project_options['content']; ?>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="media">
							<?php if (has_post_thumbnail()): ?>
								<?php the_post_thumbnail('project-single', array('class' => 'img-responsive')); ?>
							<?php else: ?>
								<img src="<?php echo get_theme_file_uri(); ?>/images/single-project-placeholder.jpg" class="img-responsive" alt="">
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /project-page -->

		<?php $highlights = get_field('highlights'); if ($highlights): ?>
		<section class="highlights">
			<div class="container">
				<?php if ($highlights['title']): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title border"><?php echo $highlights['title']; ?></h3>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ($highlights['highlights']): ?>
				<div class="row">
					<?php foreach ($highlights['highlights'] as $highlight): ?>
					<div class="col-md-4 col-sm-6 col-xs-6 col">
						<div class="highlight-item">
							<?php if ($highlight['icon']): ?>
							<div class="icon pull-left">
								<i class="<?php echo $highlight['icon'] ?>"></i>
							</div>
							<?php endif; ?>

							<?php if ($highlight['title'] || $highlight['value']): ?>
							<div class="text">
								<?php if ($highlight['title']): ?>
								<h4><?php echo $highlight['title']; ?></h4>
								<?php endif; ?>

								<?php if ($highlight['value']): ?>
								<h3><?php echo $highlight['value']; ?></h3>
								<?php endif; ?>
							</div>
							<?php endif; ?>
						</div>
					</div><!-- /highlight-item -->
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section><!-- /highlights -->
		<?php endif; ?>

		<?php $photo_gallery = get_field('photo_gallery'); if ($photo_gallery): ?>
		<section class="photo-gallery">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title border"><?php _e('Photo Gallery', 'gencon'); ?></h3>
						</div>
					</div>
				</div>

				<?php if ($photo_gallery): ?>
				<div class="row">
					<?php foreach ($photo_gallery as $gallery): ?>
					<div class="col-md-3 col-sm-4 col-xs-6 col">
						<a class="project-gallery" href="<?php echo $gallery['url']; ?>">
							<img src="<?php echo $gallery['url']; ?>" class="img-responsive" alt="">
						</a>
					</div>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
		</section><!-- /photo-gallery -->
		<?php endif; endwhile; ?>

		<section class="all-projects">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<a href="<?php echo get_template_link('t_projects.php'); ?>" class="btn text-uppercase">View All Projects</a>
					</div>
				</div>
			</div>
		</section><!-- /all-projects -->

	</div><!-- /content-area -->

<?php get_footer(); ?>