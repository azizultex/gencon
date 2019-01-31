<?php get_header(); ?>
	
	<div class="content-area">

		<?php while (have_posts()) : the_post(); $service = get_field('service'); ?>
		<section class="services-page">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title">
							<h3 class="title"><i class="<?php echo $service['icon']; ?>"></i> <?php the_title(); ?></h3>
						</div>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="content">
							<?php if (has_post_thumbnail()): ?>
							<div class="col-md-6 col-sm-7 col-xs-12 alignright plr-0">
								<div class="media">
									<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
								</div>
							</div>
							<?php endif; ?>

							<?php if ($service['content']): ?>
								<?php foreach ($service['content'] as $content): ?>
									
									<?php if (in_array('title', $content['select_options'])): ?>
									<h5><?php echo $content['title']; ?></h5>
									<?php endif; ?>
									
									<?php if (in_array('content', $content['select_options'])): ?>
									<?php echo $content['content']; ?>
									<?php endif; ?>

									<?php if (in_array('lists', $content['select_options'])): ?>
										<ul>
											<?php foreach ($content['lists'] as $list): ?>
											<li><?php echo $list['text']; ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>

								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /services -->
		<?php endwhile; ?>

		<?php 
			$page_id = get_queried_object_id();
			$args = array(
				'post_type' => 'service',
				'posts_per_page' => -1,
			);
			$loop = new WP_Query( $args );
			if ($loop->have_posts()) :
		?>
		<section class="services">
			<div class="container">
				<div class="row eq-height justify-content-center">
					<?php while ($loop->have_posts()) : $loop->the_post(); $post_id = get_the_ID(); $service = get_field('service'); ?>
					<div class="col-md-2 col-sm-3 col-xs-4 col">
						<a class="service-item text-center <?php if($page_id == $post_id) echo 'active smoothScroll'; ?>" href="<?php if($page_id == $post_id) { echo '#primary';}else { echo the_permalink(); } ?>">
							<?php if ($service['icon']): ?>
							<div class="icon">
								<i class="<?php echo $service['icon']; ?>"></i>
							</div>
							<?php endif; ?>

							<div class="text">
								<h6><?php the_title(); ?></h6>
							</div>

							<div class="arrow">
								<i class="icon-arrow-<?php if($page_id == $post_id) { echo 'up';}else { echo 'right'; } ?>"></i>
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