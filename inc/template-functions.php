<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package juancarloswebsites
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function juancarloswebsites_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Contact page body_class
	global $post;
	if ( is_page( 'about-me' ) ) {
		$classes[] = 'about-me-page';
	}
	
	return $classes;
}
add_filter( 'body_class', 'juancarloswebsites_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function juancarloswebsites_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'juancarloswebsites_pingback_header' );

/**
 * This will return an object of the section mods
 *
 * @param  string $section pass in the section for the mods desired.
 * @return object          returns an object of the mods for the passed section.
 */
function get_section_mods( $section ) {
	return the_mods_for_section( $section );
}

/**
 * This grabs all slides that are set in the customizer for the section that is passed in.
 *
 * @param  string $section should be a section reference example: top, about, services.
 * @return bool/object    returns false if no slides are set in customizer.
 */
function the_mods_for_section( $section ) {
	$mods_class = new stdClass();
	$count      = 0;
	if ( 'top' === $section ) :
		$mods_class->slides              = new stdClass();
		for ( $i = 1; $i <= 5; $i++ ) {
			if ( ! empty( get_theme_mod( 'slider_' . $i ) ) ) :
				$count++;
				$slide                       = new stdClass();
				$slide->slide_img            = get_theme_mod( 'slider_' . $i );
				$slide->slide_text_position  = get_theme_mod( 'slider_text_position_' . $i );
				$slide->slide_intro_header   = get_theme_mod( 'slider_top_header_' . $i );
				$slide->slide_header_message = get_theme_mod( 'slider_header_' . $i );
				$slide->slide_subheader      = get_theme_mod( 'slider_subheader_' . $i );
				$slide->slide_link_btn       = get_theme_mod( 'slider_btn_text_' . $i );
				$slide->slide_link           = get_theme_mod( 'slider_btn_link_' . $i );
				$slide->slide_mobile_img     = get_theme_mod( 'slider_mobile_' . $i );

				$mods_class->slides->{"slide_{$i}"}     = $slide;
			endif;
		}

		$mods_class->slides->count = $count;

		return $mods_class;
	endif;

	if ( 'about' === $section ) :
		if ( ! empty( get_theme_mod( 'about_me_message' ) ) ) :
			$count++;
			$about                   = new stdClass();
			$about->about_me_header  = get_theme_mod( 'about_me_header' );
			$about->about_me_message = get_theme_mod( 'about_me_message' );
			$about->github_btn_text  = get_theme_mod( 'github_btn_text' );
			$about->github_btn_link  = get_theme_mod( 'github_btn_link' );

			$mods_class->{'about_mods'}            = $about;
			$mods_class->{'about_mods'}->count     = $count;
		endif;

		return $mods_class;
	endif;

	if ( 'services' === $section ) :

		if ( ! empty( get_theme_mod( 'services_section_header' ) ) ) :
			$count++;
			$services_header                             = new stdClass();
			$services_header->services_background_img    = get_theme_mod( 'service_img' );
			$services_header->services_section_header    = get_theme_mod( 'services_section_header' );
			$services_header->services_section_subheader = get_theme_mod( 'services_section_subheader' );

			$mods_class->{'services_mods'}        = $services_header;
			$mods_class->{'services_mods'}->count = $count;
		endif;

		$mods_class->services = new stdClass();
		for ( $i = 1; $i <= 3; $i++ ) {

			if ( ! empty( get_theme_mod( 'service_header_' . $i ) ) ) :
				${"service_$i"}                       = new stdClass();
				${"service_$i"}->service_header       = get_theme_mod( 'service_header_' . $i );
				$mods_class->services->{"service_$i"} = ${"service_$i"};

				// Array for service discriptions.
				${"service_description_$i"} = array();
				for ( $c = 1; $c <= 6; $c++ ) {
					if ( ! empty( get_theme_mod( 'service_' . $i . '_description_' . $c ) ) ) {

						array_push( ${"service_description_$i"}, get_theme_mod( 'service_' . $i . '_description_' . $c ) );
						$mods_class->services->{"service_$i"}->service_descriptions = ${"service_description_$i"};
					}
				}

			endif;
		}

		return $mods_class;
	endif;

	if ( 'projects' === $section ) :
		if ( ! empty( get_theme_mod( 'projects_header' ) ) ) :
			$count++;
			$projects_section                             = new stdClass();
			$projects_section->project_section_header    = get_theme_mod( 'projects_header' );
			$projects_section->contribution_section_header    = get_theme_mod( 'contributions_header' );

			$mods_class->{'projects_mods'}        = $projects_section;
			$mods_class->{'projects_mods'}->count = $count;
		endif;

		$count                = 0;
		$mods_class->projects = new stdClass();
		for ( $i = 1; $i <= 4; $i++ ) {

			if ( ! empty( get_theme_mod( 'project_header_' . $i ) ) ) :
				$count++;
				${"project_$i"}                      = new stdClass();
				${"project_$i"}->project_header      = get_theme_mod( 'project_header_' . $i );
				${"project_$i"}->project_subheader   = get_theme_mod( 'project_subheader_' . $i );
				${"project_$i"}->project_description = get_theme_mod( 'project_description_' . $i );
				${"project_$i"}->project_btn_git    = get_theme_mod( 'project_' . $i . '_btn_git' );
				${"project_$i"}->project_btn_link    = get_theme_mod( 'project_' . $i . '_btn_link' );
				${"project_$i"}->project_img_1       = get_theme_mod( '1st_project_img' . $i );
				${"project_$i"}->project_img_2       = get_theme_mod( '2nd_project_img' . $i );

				$mods_class->projects->{"project_$i"} = ${"project_$i"};

			endif;
		}

		$mods_class->projects->count = $count;

		$mods_class->contributions = new stdClass();
		$count = 0;
		for ( $i = 1; $i <= 4; $i++ ) {

			if ( ! empty( get_theme_mod( 'contribution_header_' . $i ) ) ) :
				$count++;
				${"contribution_$i"}                      = new stdClass();
				${"contribution_$i"}->contribution_header      = get_theme_mod( 'contribution_header_' . $i );
				${"contribution_$i"}->contribution_subheader   = get_theme_mod( 'contribution_subheader_' . $i );
				${"contribution_$i"}->contribution_description = get_theme_mod( 'contribution_description_' . $i );
				${"contribution_$i"}->contribution_btn_git    = get_theme_mod( 'contribution_' . $i . '_btn_git' );
				${"contribution_$i"}->contribution_btn_link    = get_theme_mod( 'contribution_' . $i . '_btn_link' );
				${"contribution_$i"}->contribution_img_1       = get_theme_mod( '1st_contribution_img' . $i );
				${"contribution_$i"}->contribution_img_2       = get_theme_mod( '2nd_contribution_img' . $i );

				$mods_class->contributions->{"contribution_$i"} = ${"contribution_$i"};

			endif;
		}

		$mods_class->contributions->count = $count;

		return $mods_class;
	endif;

	if ( 'footer' === $section ) :
		if ( ! empty( get_theme_mod( 'footer_menu_title' ) ) ) :
			$count++;
			$footer                          = new stdClass();
			$footer->footer_menu_title       = get_theme_mod( 'footer_menu_title' );
			$footer->footer_social_title     = get_theme_mod( 'footer_social_title' );
			$footer->footer_social_linkedin  = get_theme_mod( 'footer_social_linkedin' );
			$footer->footer_social_github    = get_theme_mod( 'footer_social_github' );
			$footer->footer_contact_title    = get_theme_mod( 'footer_contact_title' );
			$footer->footer_email_title      = get_theme_mod( 'footer_contact_email_title' );
			$footer->footer_email            = get_theme_mod( 'footer_contact_email' );
			$footer->footer_phone_title      = get_theme_mod( 'footer_phone_title' );
			$footer->footer_phone            = get_theme_mod( 'footer_phone' );
			$footer->footer_address_1        = get_theme_mod( 'footer_address_1' );
			$footer->footer_address_2        = get_theme_mod( 'footer_address_2' );

			$mods_class->{'footer_mods'}        = $footer;
			$mods_class->{'footer_mods'}->count = $count;
		endif;

		return $mods_class;
	endif;

}
