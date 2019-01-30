<?php get_header(); ?>

	<div id="primary" class="content-area">

		<section class="news-page-main">
			<div class="container">
				<?php $header_title = get_field('page_header_title', getPageID()); if ($header_title): ?>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="section-title text-center">
							<h4 class="title"><?php echo $header_title; ?></h4>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="row eq-height justify-content-center">
					<?php if (have_posts()): while(have_posts()): the_post(); ?>
					<div class="col-md-4 col-sm-6 col-xs-6 col">
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
					<?php endwhile; else: ?>
						<div class="entry-content col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 30px">
					        <h5 class="no-content text-center"><?php _e('Not found posts!!!', 'gencon'); ?></h5>
					    </div>
					<?php endif; ?>
				</div>

				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="blog-pagination">
							<?php 
								the_posts_pagination( 
									array( 
										'mid_size'  => 2,
										'screen_reader_text' => ' ',
										'prev_text' => __( '<i class="icon-angle-down"></i>', 'gencon' ),
										'next_text' => __( '<i class="icon-angle-down"></i>', 'gencon' ),
									) 
								); 
							?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /latest-news -->

	</div><!-- /content-area -->

<?php get_footer(); ?>  