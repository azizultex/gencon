<?php
/*
Template Name: Services
*/
get_header(); ?>
	
	<div id="primary" class="content-area">

		<?php 
			$args = array(
				'post_type' => 'service',
				'posts_per_page' => -1,
			);
			$loop = new WP_Query( $args );
			if ($loop->have_posts()) :
		?>
		<section class="services-page">
			<div class="container">
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
			</div>
		</section><!-- /services -->
		<?php endif; wp_reset_postdata(); ?>

	</div><!-- /content-area -->

<?php get_footer(); ?>