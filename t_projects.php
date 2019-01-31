<?php
/*
Template Name: Projects
*/
get_header(); ?>
	
	<div id="primary" class="content-area">

		<?php 
			$args = array(
				'post_type' => 'project',
				'posts_per_page' => 3,
				'meta_value' => 'yes',
				'meta_key' => '_is_ns_featured_post', 
			);
			$loop = new WP_Query( $args );
			if ($loop->have_posts()) :
		?>
		<section class="featured-projects">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title border"><?php _e('Featured Projects', 'gencon'); ?></h3>
						</div>
					</div>
				</div>

				<div class="row">
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
			</div>
		</section><!-- /featured-projects -->
		<?php endif; wp_reset_postdata(); ?>

		<section class="additional-projects">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title border"><?php _e('Additional Projects', 'gencon'); ?></h3>
						</div>
					</div>
				</div>

				<div class="row eq-height">
					<?php 
						$args = array(
							'post_type' => 'project',
							'posts_per_page' => -1,
						);
						$loop = new WP_Query( $args );
						if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post();
							$project_options = get_field('project_options');
					?>
					<div class="col-md-3 col-sm-6 col-xs-6 col">
						<a id="project-<?php the_ID(); ?>" <?php post_class('additional-project-item'); ?> href="<?php the_permalink(); ?>">
							<div class="content">
								<h6 class="title"><?php the_title(); ?></h6>
								<?php if ($project_options['tagline']): ?>
								<p class="sub-title"><?php echo $project_options['tagline']; ?></p>
								<?php endif; ?>

								<?php if ($project_options['location']): ?>
								<h6 class="location"><?php echo $project_options['location']; ?></h6>
								<?php endif; ?>
							</div>
						</a>
					</div><!-- /project-item -->
					<?php endwhile; else: ?>
					<div class="entry-content col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 30px">
					        <h5 class="no-content"><?php _e('Project is not found!!!', 'gencon'); ?></h5>
					</div>
					<?php endif; wp_reset_postdata(); ?>
				</div>
			</div>
		</section><!-- /additional-projects -->

	</div><!-- /content-area -->
	

<?php get_footer(); ?>