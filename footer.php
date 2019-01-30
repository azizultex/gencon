
		<footer class="footer">
			<div class="container">
				<div class="row eq-height">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="footer-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php $footer_logo = get_field('footer_logo', 'options'); if ($footer_logo): ?>
								<img src="<?php echo $footer_logo['url']; ?>" class="img-responsive" alt="<?php echo $footer_logo['alt']; ?>">
								<?php else: ?>
								<img src="<?php echo get_theme_file_uri(); ?>/images/footer-logo.png" class="img-responsive" alt="GenCon">
								<?php endif; ?>
							</a>
						</div>

						<div class="copyright hidden-sm hidden-xs">
							<p>Copyright © <?=date('Y')?> GenCon. All Rights Reserved.</p>
						</div>
					</div>

					<div class="col-md-1 col-sm-2 col-xs-2 col pl-0">
						<div class="widget widget-sitemap">
							<h6 class="widget-title">Sitemap</h6>
							<?php 
						  		wp_nav_menu( array(
		                            'menu'               => 'Footer menu',
		                            'theme_location'     => 'menu-2',
		                            'depth'              => 2,
		                            'container'          => 'false',
		                            'menu_class'         => 'list-unstyled',
		                            'menu_id'            => '',
		                            'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
		                            'walker'             => new wp_bootstrap_navwalker(),
		                        ));
		                    ?>
						</div>
					</div><!-- /widget -->

					<div class="col-md-2 col-sm-3 col-xs-3 col">
						<div class="widget widget-services">
							<h6 class="widget-title">Services</h6>
							<ul class="list-unstyled">
								<li><a href="#">Design Build</a></li>
								<li><a href="#">Construction Management</a></li>
								<li><a href="#">General Contracting & Consulting</a></li>
								<li><a href="#">GenCon Services, Inc.</a></li>
							</ul>
						</div>
					</div><!-- /widget -->

					<div class="col-md-2 col-sm-3 col-xs-3 col">
						<div class="widget widget-about">
							<h6 class="widget-title">About Us</h6>
							<ul class="list-unstyled">
								<li><a href="#">Our Company</a></li>
								<li><a href="#">Meet the Team</a></li>
							</ul>
						</div>
					</div><!-- /widget -->

					<div class="col-md-3 col-sm-4 col-xs-4 col">
						<div class="widget widget-contact">
							<h6 class="widget-title"><?php _e('Contact', 'gencon'); ?></h6>
							<?php $contacts = get_field('contacts', 'options'); if ($contacts): ?>
							<ul class="contacts list-unstyled">
								<?php if ($contacts['address']): ?>
								<li class="address">
									<div class="icon pull-left">
										<i class="icon-map"></i>
									</div>
									<div class="text">
										<a href="<?php echo $contacts['google_map_url']; ?>" target="_blank"><?php echo $contacts['address']; ?></a>
									</div>
								</li>
								<?php endif; ?>

								<?php if ($contacts['phone']): ?>
								<li class="phone">
									<div class="icon pull-left">
										<i class="icon-phone"></i>
									</div>
									<div class="text">
										<a href="tel:<?php echo $contacts['phone']; ?>"><?php echo $contacts['phone']; ?></a>
									</div>
								</li>
								<?php endif; ?>
								
								<?php if ($contacts['email']): ?>
								<li class="email">
									<div class="icon pull-left">
										<i class="icon-envelope"></i>
									</div>

									<div class="text">
										<a href="mailto:<?php echo $contacts['email']; ?>"><?php echo $contacts['email']; ?></a>
									</div>
								</li>
								<?php endif; ?>
							</ul>
							<?php endif; ?>

				        	<?php $social_media = get_field('social_media', 'options'); if ($social_media): ?>
				            <ul class="social-media list-inline">
				            	<?php foreach ($social_media as $social): ?>
				        		<li><a href="<?php echo $social['url']; ?>" target="_blank"><i class="<?php echo $social['icon']['value']; ?>"></i></a></li>
				            	<?php endforeach; ?>
				        	</ul>
		                    <?php endif; ?>
						</div>
					</div><!-- /widget -->

					<div class="hidden-lg hidden-md col-sm-12 col-xs-12">
						<div class="copyright">
							<p>Copyright © <?=date('Y')?> GenCon. All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- /footer -->
		<?php wp_footer(); ?>
	</body>
</html>