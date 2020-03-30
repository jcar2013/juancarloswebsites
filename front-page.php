<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package juancarloswebsites
 */

get_header();
?>
	<?php if ( is_home() ) : ?>
		<?php

		/* This can be used to filter slide object */
		do_action( 'get_mods_before_section', 'top' );

		/* This gets the slides as an object */
		$top_slider = get_section_mods( 'top' );

		/* This checks for slider object in order to parse slider section */
		if ( ! empty( $top_slider ) ) :
			?>
			<section class="header-slider-section hero-wrap">
				<div class="top-page-slider-wrap">
				<?php
				/* Foreach loop to build slider according to slides entered in the customizer */
				foreach ( $top_slider->slides as $slide ) :
					/* Checks for an img set in the slide object */
					if ( ! empty( $slide->slide_img ) ) :
						?>
						<div class="top-page-slide">
							<?php
							if ( wp_is_mobile() ) :
								?>
							<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_mobile_img ); ?>" style="background-image:linear-gradient(rgba(0, 0, 0, 0.8),rgba(0, 0, 0, 0.5)), url('<?php echo esc_url( $slide->slide_mobile_img ); ?>');">
								<?php
							else :
								if ( strpos( $slide->slide_img, '.mp4' ) !== false ) {
									?>
										<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_img ); ?>">
										<video autoplay="true" loop muted controls class="cta-slide">
											<source src="<?php echo esc_attr( $slide->slide_img ); ?>" type="video/mp4">
											Your browser does not support the video tag.
										</video>
										<?php
								} else {
									?>
										<div class="top-slide-img-holder" data-img-url="<?php echo esc_attr( $slide->slide_img ); ?>" style="background-image:linear-gradient(rgba(0, 0, 0, 0.75),rgba(0, 0, 0, 0.5)), url('<?php echo esc_url( $slide->slide_img ); ?>');">
										<?php
								}
							endif;
							/* Checks for an message set in the slide object */
							if ( ! empty( $slide->slide_header_message ) ) :
								?>
								<div class="row img-header-text-wrap">
									<div class="col col-12 img-header-text-container">
										<div class="text-box text-center<?php
										$set_text_align = ( ! empty( $slide->slide_text_position ) ) ? ' set-align-' . $slide->slide_text_position : ' set-align-center';
										echo wp_kses_data( $set_text_align );
										?>">
											<?php if ( ! empty( $slide->slide_intro_header ) ) : ?>
												<h4 class="img-subheader-text text-center"><?php echo wp_kses_data( $slide->slide_intro_header ); ?></h4>
											<?php endif; ?>
											<h2 class="img-header-text text-center"><?php echo wp_kses_data( $slide->slide_header_message ); ?></h2>
											<?php
											/* Checks for an subheader set in the slide object */
											if ( ! empty( $slide->slide_subheader ) ) :
												?>
												<h4 class="img-subheader-text text-center"><?php echo wp_kses_data( $slide->slide_subheader ); ?></h4>
											<?php endif; ?>
										</div><!-- .text-box -->
									</div><!-- .img-header-text-container -->

								</div><!-- .img-header-text-wrap -->							
							<?php endif; ?>
							</div><!-- .top-slide-img-holder -->
						</div><!-- .top-page-slide -->
					<?php endif; ?>

				<?php endforeach; ?>

			</div><!-- .top-page-slider -->

			</section><!-- .header-slider-section -->
		<?php endif; ?>

		<?php
		do_action( 'get_mods_before_section', 'about' );
		$about_me_section = get_section_mods( 'about' );

		if ( ! empty( $about_me_section->about_mods->about_me_message ) ) :
			?>
			<section class="about">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mx-auto text-center">
							<h2 class="about-title"><?php echo wp_kses_post( $about_me_section->about_mods->about_me_header ); ?></h2>
							<hr class="light my-4">
							<p class="text-faded mb-4"><?php echo wp_kses_post( $about_me_section->about_mods->about_me_message ); ?></p>
							<a class="btn btn-1 js-scroll-trigger" href="<?php echo esc_url( $about_me_section->about_mods->github_btn_link ); ?>"><?php echo wp_kses_post( $about_me_section->about_mods->github_btn_text ); ?></a>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
		do_action( 'get_mods_before_section', 'services' );
		$services_section = get_section_mods( 'services' );

		if ( ! empty( $services_section->services_mods->services_section_header ) ) :
			?>
				<section class="services" style="background-image:linear-gradient(rgba(0, 0, 0, 0.8),rgba(0, 0, 0, 0.5)), url(<?php echo esc_url( $services_section->services_mods->services_background_img ); ?>)">
					<div id="div-services" class="container">
						<div class="row">
							<div id="service-intro" class="col-lg-12 text-center">
								<h2 class="services-title text-uppercase"><?php echo wp_kses_post( $services_section->services_mods->services_section_header ); ?>	</h2>
								<h3 class="section-subheading"><?php echo wp_kses_post( $services_section->services_mods->services_section_subheader ); ?></h3>
							</div>
						</div>
						<div id="services-list" class="row">
							<?php
							foreach ( $services_section->services as $service ) :
								?>
								<div class="col-9 col-lg-3">
									<h6 class="services-box-heading"><?php echo wp_kses_post( $service->service_header ); ?></h6>
									<ul class="services-box-ul">
										<?php
										if ( ! empty( $service->service_descriptions ) ) :
											foreach ( $service->service_descriptions as $description ) :
												?>
												<li><?php echo wp_kses_post( $description ); ?></li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
		<?php endif; ?>

		<?php
		do_action( 'get_mods_before_section', 'projects' );
		$projects_section = get_section_mods( 'projects' );

		if ( ! empty( $projects_section->projects_mods->project_section_header ) ) : ?>

			<section class="projects">
				<div class="row row-projects">
					<div id="projects-intro" class="col-lg-12 text-center">
						<h2 class="services-title text-uppercase"><?php echo wp_kses_post( $projects_section->projects_mods->project_section_header ); ?>	</h2>
						<!-- <h3 class="section-subheading"><?php //echo wp_kses_post( $services_section->services_mods->services_section_subheader ); ?></h3> -->
					</div>
					<div class="col-12 project">
						<hr class="featurette-divider">

						<?php
						$count = 0;
						foreach ( $projects_section->projects as $project ) :
							if ( $project->project_header ) :
								if($count%2==0) {
									$slide = "right";
									$slide_mobile = "right-mobile";
									$col_order = 0;
								} else {
									$slide = "left";
									$slide_mobile = "left-mobile";
									$col_order = 1;     
								}
								?>

								<div class="row featurette">
									<div class="col-md-7 order-md-<?php echo $col_order; ?> col-description">
										<h2 class="project-heading"><?php echo wp_kses_post( $project->project_header ); ?> | <span class="text-muted"><?php echo wp_kses_post( $project->project_subheader ); ?></span></h2>
										<p class="project-description"><?php echo wp_kses_post( $project->project_description ); ?></p>
										<div class="text-center">
											<?php if ( ! empty( $project->project_btn_git ) ) : ?>
												<a class="btn btn-2 js-scroll-trigger btn-projects" href="<?php echo esc_url( $project->project_btn_git ); ?>">Github Repo</a>
											<?php endif; ?>
											<a class="btn btn-1 js-scroll-trigger btn-projects" href="<?php echo esc_url( $project->project_btn_link ); ?>">Visit Page</a>
										</div>
									</div>
									<div class="col-md-5 col-image">
										<img src="<?php echo esc_attr( $project->project_img_1 ); ?>" class="project-img img-fluid mx-auto" alt="project desktop image">
										<img src="<?php echo esc_attr( $project->project_img_2 ); ?>" class="project-mobile-img img-fluid mx-auto" alt="project mobile image">
									</div>
								</div>
								<?php 
									if($count !== $projects_section->projects->count) {
										echo "<hr class='featurette-divider'>";
									}
									$count++;
									?>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
					<div id="projects-intro" class="col-lg-12 text-center">
						<h2 class="services-title text-uppercase"><?php echo wp_kses_post( $projects_section->projects_mods->contribution_section_header ); ?>	</h2>
						<!-- <h3 class="section-subheading"><?php //echo wp_kses_post( $services_section->services_mods->services_section_subheader ); ?></h3> -->
					</div>
					<div class="col-12">
						<hr class="featurette-divider">

						<?php
						foreach ( $projects_section->contributions as $contribution ) :
							if ( $contribution->contribution_header ) :
								if($count%2==0) {
									$slide = "right";
									$slide_mobile = "right-mobile";
									$col_order = 0;
								} else {
									$slide = "left";
									$slide_mobile = "left-mobile";
									$col_order = 1;     
								}
								?>

								<div class="row featurette">
									<div class="col-md-7 order-md-<?php echo $col_order; ?> col-description">
										<h2 class="project-heading"><?php echo wp_kses_post( $contribution->contribution_header ); ?> | <span class="text-muted"><?php echo wp_kses_post( $contribution->contribution_subheader ); ?></span></h2>
										<p class="featurette-text"><?php echo wp_kses_post( $contribution->contribution_description ); ?></p>
										<div class="text-center">
											<?php if ( ! empty( $contribution->contribution_btn_git ) ) : ?>
												<a class="btn btn-2 js-scroll-trigger btn-projects" href="<?php echo esc_url( $project->project_btn_git ); ?>">Github Repo</a>
											<?php endif; ?>
											<a class="btn btn-1 js-scroll-trigger btn-projects" href="<?php echo esc_url( $contribution->contribution_btn_link ); ?>">Visit Page</a>
										</div>
									</div>
									<div class="col-md-5 col-image">
										<img src="<?php echo esc_attr( $contribution->contribution_img_1 ); ?>" class="project-img img-fluid mx-auto" alt="project desktop image">
										<img src="<?php echo esc_attr( $contribution->contribution_img_2 ); ?>" class="project-mobile-img img-fluid mx-auto" alt="project mobile image">
									</div>
								</div>
								<?php 
									if($count !== $contributions_section->projects->count) {
										echo "<hr class='featurette-divider'>";
									}
									$count++;
									?>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php else : ?>
			<div id="primary" class="content-area row">
				<main id="main" class="site-main col col-12">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>

				</main><!-- #main .col-12 -->
			</div><!-- #primary .row -->
		<?php endif; ?>

		<?php
		get_footer();
