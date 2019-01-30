<?php
/*
Template Name: Contact
*/
get_header(); ?>

	<div id="primary" class="content-area">

		<section class="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="section-title">
							<h1 class="title">Get in Touch</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend, elit at luctus sodales.</p>
						</div>

						<div class="row eq-height">
							<div class="col-md-6 col-sm-6 col-xs-6 col">
								<div class="office-location">
									<h5 class="name">Corporate HQ</h5>
									<p><a href="#" target="_blank">323 Manley Street <br>West Bridgewater, MA 02379</a></p>
									<p>Phone: <a href="tel:(508) 580-4626">(508) 580-4626</a></p>
								</div>
							</div><!-- /office-location -->

							<div class="col-md-6 col-sm-6 col-xs-6 col">
								<div class="office-location">
									<h5 class="name">Cape Cod</h5>
									<p><a href="#" target="_blank">802 MacArthur Boulevard <br>Pocasset, MA 02559</a></p>
								</div>
							</div><!-- /office-location -->

							<div class="col-md-6 col-sm-6 col-xs-6 col">
								<div class="office-location">
									<h5 class="name">South Boston</h5>
									<p><a href="#" target="_blank">11 Elkins Street, Suite 460 <br>South Boston, MA 02127</a></p>
								</div>
							</div><!-- /office-location -->

							<div class="col-md-6 col-sm-6 col-xs-6 col">
								<div class="office-location">
									<h5 class="name">North Shore</h5>
									<p><a href="#" target="_blank">33 Lawrence Street <br>Methuen, MA 01844</a></p>
								</div>
							</div><!-- /office-location -->
						</div>
						
					</div>

					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="contact-form">
							<h5>We look forward to Hearing from you.</h5>

							<?php echo do_shortcode('[gravityform id="1" title="false" description="false" tabindex="10" ajax="false"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /contact -->

		<section class="career">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="content">
							<h3 class="title">Join Our Team</h3>
							<p>GenCon is one of the fastest growing private companies in the northeast! We are always looking for talented, motivated, honest individuals to join our team. If you have interest in our company, we invite you to submit your resume for review.</p>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-6 col">
						<div class="content">
							<h3 class="title">Subcontractors</h3>
							<p>GenCon prequalifies all of our subcontractors to ensure that we provide the best quality work for our clients. If you are interested in becoming part of the GenCon team, <a href="#">please click here</a> to download our Prequalification Application. Once complete, please return via email to : <a href="mailto:info@gencondb.com">info@gencondb.com</a></p>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /quick-contact -->

	</div><!-- /content-area -->


<?php get_footer(); ?>