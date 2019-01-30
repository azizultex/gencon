<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section class="error-404 not-found text-center">
						<header class="page-header">
							<h1 class="hero"><?php _e('404', 'gencon'); ?></h1>
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'gencon' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'gencon' ); ?></p>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php get_footer();