<?php 
/*
Template Name: Basic
*/
get_header(); ?>

	<section class="basic_container">
		<div class="container">
			<?php if(get_field('basic_content')): 
				$field = get_field_object('orientation');
			?>
			<?php while(has_sub_field('basic_content')): ?>
			
					<?php if( get_sub_field('orientation') == 'No Photo' ): ?>
						<div class="row row-eq-height">
							<div class="basic basic_single">
								<div class="col-md-12">
										<?php if( get_sub_field('enable_basic_title') ): ?>
										<h2 style="text-align:<?php echo the_sub_field('basic_center_title'); ?>;"><?php echo the_sub_field('basic_title'); ?></h2>
										<?php endif; ?>
										<div style="text-align:<?php echo the_sub_field('basic_text_center'); ?>;"><?php echo get_sub_field('basic_text'); ?></div>
										<?php if( get_sub_field('enable_internal_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_internal_button_link'); ?>" class="btn-block btn btn-pink-border"><span><?php echo the_sub_field('basic_internal_button_title'); ?></span></a>
										<?php endif; ?>
										<?php if( get_sub_field('enable_external_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_external_button_link'); ?>" class="btn-block btn btn-pink-border" target="_blank"><span><?php echo the_sub_field('basic_external_button_title'); ?></span></a>
										<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>	
				
					<?php if( get_sub_field('orientation') == 'Photo Left' ): ?>
						<div class="row row-eq-height">
							<div class="basic basic_left">
								<div class="col-md-6">
									<img src="<?php echo get_sub_field('basic_photo'); ?>" />
								</div>
								<div class="col-md-6">
										<?php if( get_sub_field('enable_basic_title') ): ?>
											<h2 style="text-align:<?php echo the_sub_field('basic_center_title'); ?>;"><?php echo the_sub_field('basic_title'); ?></h2>
										<?php endif; ?>
										<div style="text-align:<?php echo the_sub_field('basic_text_center'); ?>;"><?php echo get_sub_field('basic_text'); ?></div>
										<?php if( get_sub_field('enable_internal_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_internal_button_link'); ?>" class="btn-block btn btn-pink-border"><span><?php echo the_sub_field('basic_internal_button_title'); ?></span></a>
										<?php endif; ?>
										<?php if( get_sub_field('enable_external_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_external_button_link'); ?>" class="btn-block btn btn-pink-border" target="_blank"><span><?php echo the_sub_field('basic_external_button_title'); ?></span></a>
										<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if( get_sub_field('orientation') == 'Photo Middle' ): ?>
						<div class="row row-eq-height">
							<div class="basic basic_middle">
								<div class="middle_box">
									<img src="<?php echo get_sub_field('basic_photo'); ?>" />
									<?php if( get_sub_field('enable_basic_title') ): ?>
										<h2 style="text-align:<?php echo the_sub_field('basic_center_title'); ?>;"><?php echo the_sub_field('basic_title'); ?></h2>
									<?php endif; ?>
									<div style="text-align:<?php echo the_sub_field('basic_text_center'); ?>;"><?php echo get_sub_field('basic_text'); ?></div>
									<?php if( get_sub_field('enable_internal_basic_button') ): ?>
										<a href="<?php echo the_sub_field('basic_internal_button_link'); ?>" class="btn-block btn btn-pink-border"><span><?php echo the_sub_field('basic_internal_button_title'); ?></span></a>
									<?php endif; ?>
									<?php if( get_sub_field('enable_external_basic_button') ): ?>
										<a href="<?php echo the_sub_field('basic_external_button_link'); ?>" class="btn-block btn btn-pink-border" target="_blank"><span><?php echo the_sub_field('basic_external_button_title'); ?></span></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php if( get_sub_field('orientation') == 'Photo Right' ): ?>
						<div class="row row-eq-height">
							<div class="basic basic_right">
								<div class="col-md-6 col-md-push-6">
									<img src="<?php echo get_sub_field('basic_photo'); ?>" />
								</div>
								<div class="col-md-6 col-md-pull-6">
										<?php if( get_sub_field('enable_basic_title') ): ?>
											<h2 style="text-align:<?php echo the_sub_field('basic_center_title'); ?>;"><?php echo the_sub_field('basic_title'); ?></h2>
										<?php endif; ?>
										<div style="text-align:<?php echo the_sub_field('basic_text_center'); ?>;"><?php echo get_sub_field('basic_text'); ?></div>
										<?php if( get_sub_field('enable_internal_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_internal_button_link'); ?>" class="btn-block btn btn-pink-border"><span><?php echo the_sub_field('basic_internal_button_title'); ?></span></a>
										<?php endif; ?>
										<?php if( get_sub_field('enable_external_basic_button') ): ?>
											<a href="<?php echo the_sub_field('basic_external_button_link'); ?>" class="btn-block btn btn-pink-border" target="_blank"><span><?php echo the_sub_field('basic_external_button_title'); ?></span></a>
										<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
<?php get_footer(); ?>