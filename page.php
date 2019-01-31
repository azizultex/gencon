<?php get_header(); ?>
	
	<section class="news-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php if (have_posts()): while(have_posts()): the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
						<div class="content default-page-content">
							<?php the_content(); ?>
						</div>
					</article>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</section><!-- /contact -->

<?php get_footer(); ?>