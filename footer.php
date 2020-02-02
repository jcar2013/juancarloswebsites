<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package juancarloswebsites
 */

do_action( 'get_mods_before_section', 'footer' );
$footer_section = get_section_mods( 'footer' );
?>

	</div><!-- #content .container-fluid -->
	<!-- <div id="footer-spacer"></div> -->
	<footer id="colophon" class="site-footer">
		<div class="site-container">
			<div class="row upper-footer row-upper-footer">
				<div class="col col-12 col-lg-5 col-sm-6">
					<div class="-footer-menu">
						<?php if ( ! empty( $footer_section->footer_mods->footer_menu_title ) ) : ?>
							<!-- <div class="col-12 col-lg"> -->
							<h4 class="footer-menu-title"><?php echo wp_kses_post( $footer_section->footer_mods->footer_menu_title); ?></h4>
								<?php
									wp_nav_menu(
										array(
											'theme_location'   => 'menu-contact-footer',
											'menu_class'        => 'footer-menu footer-menu-' . strtolower( $footer_section->footer_menu_title ),
										)
									);
								?>
							<!-- </div>.col -->
						<?php endif; ?>

					</div><!-- .row -->
				</div><!-- .col-4 -->

				<div class="col col-12 col-lg-3 col-sm-6 offset-lg-3">
					<div class="social-components-wrap">
						<h4 class="footer-social-title"><?php echo $footer_section->footer_mods->footer_social_title; ?></h4>
						<div class="social-icons-btns">
							<?php
							if ( ! empty( $footer_section->footer_mods->footer_social_linkedin ) ) {
								echo '<a href="' . $footer_section->footer_mods->footer_social_linkedin . '" target="_blank"><i class="fa fa-linkedin"></i></a>';
							}

							if ( ! empty( $footer_section->footer_mods->footer_social_github ) ) {
								echo '<a href="' . $footer_section->footer_mods->footer_social_github . '" target="_blank"><i class="fa fa-github-square"></i></a>';
							}

							?>
						</div><!-- .social-icons-btns -->
					</div><!-- .social-components-wrap -->
				</div><!-- .col -->
			</div> <!-- .rocontact-w -->

			<hr class="featurette-divider">

			<div class="row site-info align-items-center">
				<!-- End logo spacing column -->
				<div class="col col-12 col-md-6">
					<?php
					if ( ! empty( $footer_section->footer_mods->footer_email ) ) {
						echo "<a href='mailto:" . $footer_section->footer_mods->footer_email . "'>" . $footer_section->footer_mods->footer_email . '</a>';

						if ( ! empty( $footer_section->footer_mods->footer_phone ) || ! empty( $footer_section->footer_mods->footer_address_1 ) || ! empty( $footer_section->footer_mods->footer_address_2 ) ) {
							echo '<span class="sep"> | </span>';
						}
					}

					if ( ! empty( $footer_section->footer_mods->footer_phone ) ) {
						echo wp_kses_post( $footer_section->footer_mods->footer_phone);

						if ( ! empty( $footer_section->footer_mods->footer_address_1 ) || ! empty( $footer_section->footer_mods->footer_address_2 ) ) {
							echo '<span class="sep"> | </span>';
						}
					}

					if ( ! empty( $footer_section->footer_mods->footer_address_1 ) ) {
						echo wp_kses_post( $footer_section->footer_mods->footer_address_1);
					}

					if ( ! empty( $footer_section->footer_mods->footer_address_2 ) ) {
						echo wp_kses_post( $footer_section->footer_mods->footer_address_2);
					}
					?>
				</div><!-- .col -->
			</div><!-- .site-contact -->

			<div class="row site-info align-items-center">
				<!-- End logo spacing column -->
				<div class="col col-12 col-md-6">
					<?php
						/* Printing copyright date */
						echo sprintf( esc_html__( '%2$s %1$s juancarloswebsites', 'juancarloswebsites' ), date( 'Y' ), '&copy;' );
					?>
				<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						echo sprintf( esc_html__( 'Designed by %1$s', 'apera-bags' ), '<a href="https://juancarloswebsites.com" target="_blank">juancarloswebsites.com</a>' );
					?>
				</div><!-- .col -->
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->
<!-- Return to Top -->
<!-- <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a> -->
<?php wp_footer(); ?>
</body>
</html>
