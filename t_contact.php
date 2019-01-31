<?php
/*
Template Name: Contact
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<section class="contact">
			<div class="container">
				<div class="row">
					<?php $contact = get_field('contact_us'); if ($contact): ?>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<?php if ($contact['title'] || $contact['description']): ?>
						<div class="section-title">
							<?php if ($contact['title']): ?>
							<h1 class="title"><?php echo $contact['title']; ?></h1>
							<?php endif; ?>

							<?php echo $contact['description']; ?>
						</div>
						<?php endif; ?>

						<?php if ($contact['office']): ?>
						<div class="row eq-height">
							<?php foreach ($contact['office'] as $office): ?>
							<div class="col-md-6 col-sm-6 col-xs-6 col">
								<div class="office-location">
									<?php if ($office['title']): ?>
									<h5 class="name"><?php echo $office['title']; ?></h5>
									<?php endif; ?>

									<?php if ($office['address']): ?>
									<p><a href="<?php echo $office['google_map_address']; ?>" target="_blank"><?php echo $office['address']; ?></a></p>
									<?php endif; ?>

									<?php if ($office['phone']): ?>
									<p>Phone: <a href="tel:<?php echo $office['phone']; ?>"><?php echo $office['phone']; ?></a></p>
									<?php endif; ?>
								</div>
							</div><!-- /office-location -->
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="contact-form">
							<?php if ($contact['form_title']): ?>
							<h5><?php echo $contact['form_title']; ?></h5>
							<?php endif; ?>

							<?php echo do_shortcode('[gravityform id="1" title="false" description="false" tabindex="10" ajax="false"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact -->

		<?php $career = get_field('career'); if ($career): ?>
		<section class="career">
			<div class="container">
				<div class="row">
					<?php foreach ($career as $car): ?>
					<div class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="content">
							<?php if ($car['title']): ?>
							<h3 class="title"><?php echo $car['title']; ?></h3>
							<?php endif; ?>

							<?php echo $car['content']; ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- /quick-contact -->
		<?php endif; ?>

	</div><!-- /content-area -->


<?php get_footer(); ?>