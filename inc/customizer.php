<?php
/**
 * juancarloswebsites Theme Customizer
 *
 * @package juancarloswebsites
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function juancarloswebsites_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'juancarloswebsites_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'juancarloswebsites_customize_partial_blogdescription',
		) );
	}

	$wp_customize->add_panel(
		'juancarloswebsites_theme_options',
		array(
			'priority'        => 5,
			'capability'      => 'edit_theme_options',
			'theme_supports'  => '',
			'title'           => __( 'Portfolio Homepage Options', 'juancarloswebsites' ),
			'description'     => __( 'Theme Settings', 'juancarloswebsites' ),
		)
	);

	/**
	* Top bar message settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'topbar_message_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'       => 10,
			'title'          => __( 'Topbar Message Section', 'juancarloswebsites' ),
			'description'    => __( 'Topbar Options version 1.0.0', 'juancarloswebsites' ),
			'panel'          => 'juancarloswebsites_theme_options',
		)
	);

	/**
	* Enable topbar message settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'enable_topbar',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Enable topbar message Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'enable_topbar_control',
			array(
				'label'       => __( 'Topbar Message Option', 'juancarloswebsites' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'enable_topbar',
				'type'        => 'checkbox',
				'description' => 'Enable Topbar',
			)
		)
	);

	/**
	* Topbar color settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'topbar_color',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Topbar color Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_color_control',
			array(
				'label'       => __( 'Topbar Color Option', 'juancarloswebsites' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'topbar_color',
				'type'        => 'color',
				'description' => 'Topbar color',
			)
		)
	);

	/**
	* Topbar message settings
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'topbar_message',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Topbar color Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'topbar_message_control',
			array(
				'label'       => __( 'Topbar Message Option', 'juancarloswebsites' ),
				'section'     => 'topbar_message_section',
				'settings'    => 'topbar_message',
				'type'        => 'text',
				'description' => 'Topbar message',
			)
		)
	);

	/**
	* Slider settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'slider_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'Top Slider Section', 'juancarloswebsites' ),
			'description'  => __( 'Slider Options version 1.0.0', 'juancarloswebsites' ),
			'panel'      => 'juancarloswebsites_theme_options',
		)
	);

	for ( $i = 1; $i <= 5; $i++ ) :

		// Slider Setting.
		$wp_customize->add_setting(
			'slider_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Media_Control(
				$wp_customize,
				'slider_' . $i . '_control',
				array(
					'label'       => 'Slider Image ' . $i,
					'section'     => 'slider_section',
					'settings'    => 'slider_' . $i,
					'type'      => 'image',
					'description' => 'Add image for slider ' . $i,
				)
			)
		);

		/**
		* Slider message position settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_text_position_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider message position Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_text_position_' . $i . '_control',
				array(
					'label'       => __( 'Slider message position', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_text_position_' . $i,
					'description' => 'Text alignment ' . $i,
					'type'      => 'select',
					'choices' => array(
						'left' => 'left',
						'center' => 'center',
						'right' => 'right',
					),
				)
			)
		);

				/**
		* Slider intro top header message settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_top_header_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider intro top header message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_top_header_' . $i . '_control',
				array(
					'label'       => __( 'Slider intro top header message', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_top_header_' . $i,
					'type'        => 'text',
					'description' => 'Add intro message for slider ' . $i,
				)
			)
		);

		/**
		* Slider center main header message settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_header_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider center main header message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_header_' . $i . '_control',
				array(
					'label'       => __( 'Slider Center Mian header message', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_header_' . $i,
					'type'        => 'text',
					'description' => 'Add message for slider ' . $i,
				)
			)
		);

		/**
		* Slider subheader message settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_subheader_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider subheader message Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_subheader_' . $i . '_control',
				array(
					'label'       => __( 'Slider subheader', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_subheader_' . $i,
					'type'        => 'text',
					'description' => 'Add subheader for slider ' . $i,
				)
			)
		);

		/**
		* Slider button text settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_btn_text_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider button text Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_btn_text_' . $i . '_control',
				array(
					'label'       => __( 'Slider button text', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_btn_text_' . $i,
					'type'        => 'text',
					'description' => 'Button text for slider' . $i,
				)
			)
		);

		/**
		* Slider link or page settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'slider_btn_link_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider link or page Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'slider_btn_link_' . $i . '_control',
				array(
					'label'       => __( 'Slider Button Link', 'juancarloswebsites' ),
					'section'     => 'slider_section',
					'settings'    => 'slider_btn_link_' . $i,
					'type'        => 'dropdown-pages',
					'description' => 'Slider button link',
				)
			)
		);

		// Slider Mobile Setting.
		$wp_customize->add_setting(
			'slider_mobile_' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Slider Mobile Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'slider_mobile_' . $i . '_control',
				array(
					'label'       => 'Slider Mobile Image ' . $i,
					'section'     => 'slider_section',
					'settings'    => 'slider_mobile_' . $i,
					'type'        => 'image',
					'description' => 'Add image for slider ' . $i,
				)
			)
		);

	endfor;

	/**
	* About Me settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'about_me_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'About Me Section', 'juancarloswebsites' ),
			'description'  => __( 'About Me Section Options version 1.0.0', 'juancarloswebsites' ),
			'panel'      => 'juancarloswebsites_theme_options',
		)
	);

	/**
	* About Me header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'about_me_header',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// About Me header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'about_me_header_control',
			array(
				'label'       => __( 'About Me header', 'juancarloswebsites' ),
				'section'     => 'about_me_section',
				'settings'    => 'about_me_header',
				'type'      => 'text',
				'description' => 'About Me header',
			)
		)
	);

	/**
	 * About Me message settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'about_me_message',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// About Me message Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'about_me_message_control',
			array(
				'label'       => __( 'About Me message', 'juancarloswebsites' ),
				'section'     => 'about_me_section',
				'settings'    => 'about_me_message',
				'type'        => 'textarea',
				'description' => 'Add About Me message',
			)
		)
	);

	// Github button text control.
	$wp_customize->add_setting(
		'github_btn_text',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Github button text Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github_btn_text_control',
			array(
				'label'       => __( 'Github Button Text', 'juancarloswebsites' ),
				'section'     => 'about_me_section',
				'settings'    => 'github_btn_text',
				'type'        => 'text',
				'description' => 'Add Github button Text ',
			)
		)
	);

	// About Me github button link Setting.
	$wp_customize->add_setting(
		'github_btn_link',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// About Me github button link Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'github_btn_link_control',
			array(
				'label'       => __( 'Github Profile Button Link', 'juancarloswebsites' ),
				'section'     => 'about_me_section',
				'settings'    => 'github_btn_link',
				'type'        => 'text',
				'description' => 'Example: https://github.com/user',
			)
		)
	);

	/**
	* Services settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'services_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'       => 10,
			'title'          => __( 'Add Services/Skills Section', 'juancarloswebsites' ),
			'description'    => __( 'Services Options version 1.0.0', 'juancarloswebsites' ),
			'panel'          => 'juancarloswebsites_theme_options',
		)
	);

	// Services Image Setting.
	$wp_customize->add_setting(
		'service_img',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Services Image Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'service_img_control',
			array(
				'label'       => 'Service Background Image ',
				'section'     => 'services_section',
				'settings'    => 'service_img',
				'type'        => 'image',
				'description' => 'Add image for Service background',
			)
		)
	);

	/**
	* Services header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'services_section_header',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Services Image Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'services_section_header_control',
			array(
				'label'       => __( 'Services Section header ', 'juancarloswebsites' ),
				'section'     => 'services_section',
				'settings'    => 'services_section_header',
				'type'        => 'text',
				'description' => 'Add header for Service background',
			)
		)
	);
	
	/**
	* Services subheader settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'services_section_subheader',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Services subheader Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'services_section_subheader_control',
			array(
				'label'       => __( 'Services Section subheader', 'juancarloswebsites' ),
				'section'     => 'services_section',
				'settings'    => 'services_section_subheader',
				'type'        => 'text',
				'description' => 'Add subheader for services section',
			)
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) :

		/**
		* Service Title settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_header_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Title Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_header_' . $i . '_control',
				array(
					'label'       => __( 'Service ' . $i . ' Title', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_header_' . $i,
					'type'        => 'text',
					'description' => 'Add Title for service #' . $i,
				)
			)
		);

		/**
		* Service Description 1 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_1',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 1 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_1_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 1', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_1',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 2 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_2',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 2 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_2_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 2', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_2',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 3 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_3',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 3 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_3_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 3', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_3',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 4 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_4',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 4 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_4_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 4', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_4',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 5 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_5',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 5 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_5_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 5', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_5',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);

		/**
		* Service Description 6 settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'service_' . $i . '_description_6',
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Service Description 6 Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'service_' . $i . '_description_6_control',
				array(
					'label'       => __( 'Service ' . $i . ' Description 6', 'juancarloswebsites' ),
					'section'     => 'services_section',
					'settings'    => 'service_' . $i . '_description_6',
					'type'        => 'text',
					'description' => 'Add single Description for service #' . $i,
				)
			)
		);
	endfor;

	/**
	* Projects settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_section(
		'projects_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'       => 10,
			'title'          => __( 'Add Projects/Contributions Section', 'juancarloswebsites' ),
			'description'    => __( 'Projects/Contributions Options version 1.0.0', 'juancarloswebsites' ),
			'panel'          => 'juancarloswebsites_theme_options',
		)
	);

	/**
	* Projects header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'projects_header',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Projects header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'services_header_control',
			array(
				'label'       => __( 'Projects Section header ', 'juancarloswebsites' ),
				'section'     => 'projects_section',
				'settings'    => 'projects_header',
				'type'        => 'text',
				'description' => 'Add header for Projcects/Examples section',
			)
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) :

		/**
		* Projects Title settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'project_header_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Projects Title Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'project_header_' . $i . '_control',
				array(
					'label'       => __( 'Project ' . $i . ' Title', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'project_header_' . $i,
					'type'        => 'text',
					'description' => 'Add Title for Project #' . $i,
				)
			)
		);

		/**
		* Projects SubTitle settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'project_subheader_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Projects SubTitle Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'project_subheader_' . $i . '_control',
				array(
					'label'       => __( 'Project ' . $i . ' SubTitle', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'project_subheader_' . $i,
					'type'        => 'text',
					'description' => 'Add SubTitle for Project #' . $i,
				)
			)
		);

		/**
		* Project Description settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'project_description_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Project Description Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'project_description_' . $i . '_control',
				array(
					'label'       => __( 'Project ' . $i . ' Description', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'project_description_' . $i,
					'type'        => 'textarea',
					'description' => 'Add Description for Project #' . $i,
				)
			)
		);

		// Project button link Setting.
		$wp_customize->add_setting(
			'project_' . $i . '_btn_link',
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Project button link Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'project_btn_link_control' . $i,
				array(
					'label'       => __( 'Project Button Link ' . $i, 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'project_' . $i . '_btn_link',
					'type'        => 'text',
					'description' => 'Example: https://mywebsite.com/',
				)
			)
		);

		// Project button git control.
		$wp_customize->add_setting(
			'project_' . $i . '_btn_git',
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Project button git Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'project_btn_git_control' . $i,
				array(
					'label'       => __( 'Project Git link button ' . $i, 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'project_' . $i . '_btn_git',
					'type'        => 'text',
					'description' => 'Example: https://github.com/',
				)
			)
		);

		// Project Image Setting.
		$wp_customize->add_setting(
			'1st_project_img' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Project Image Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'1st_project_img' . $i . '_control',
				array(
					'label'       => '1st Project Desktop Image ' . $i,
					'section'     => 'projects_section',
					'settings'    => '1st_project_img' . $i,
					'type'        => 'image',
					'description' => 'Add 1st image for Project #' . $i,
				)
			)
		);

		// Project Image Setting.
		$wp_customize->add_setting(
			'2nd_project_img' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Project Image Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'2nd_project_img' . $i . '_control',
				array(
					'label'       => '2nd Project Mobile Image ' . $i,
					'section'     => 'projects_section',
					'settings'    => '2nd_project_img' . $i,
					'type'        => 'image',
					'description' => 'Add 2nd image for Project #' . $i,
				)
			)
		);

	endfor;

	/**
	* Contributions header settings Section
	*
	* @since  1.0.0
	*/
	$wp_customize->add_setting(
		'contributions_header',
		array(
			'default'   => '',
			'transport' => 'refresh',
		)
	);

	// Contributions header Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contributions_header_control',
			array(
				'label'       => __( 'Contributions Section header ', 'juancarloswebsites' ),
				'section'     => 'projects_section',
				'settings'    => 'contributions_header',
				'type'        => 'text',
				'description' => 'Add header for Project Contributions section',
			)
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) :

		/**
		* Contribution Title settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'contribution_header_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Contribution Title Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contribution_header_' . $i . '_control',
				array(
					'label'       => __( 'Contribution ' . $i . ' Title', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'contribution_header_' . $i,
					'type'        => 'text',
					'description' => 'Add Title for Contribution #' . $i,
				)
			)
		);

		/**
		* Contribution SubTitle settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'contribution_subheader_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Contribution SubTitle Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contribution_subheader_' . $i . '_control',
				array(
					'label'       => __( 'Contribution ' . $i . ' SubTitle', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'contribution_subheader_' . $i,
					'type'        => 'text',
					'description' => 'Add SubTitle for Contribution #' . $i,
				)
			)
		);

		/**
		* Contributions Description settings Section
		*
		* @since  1.0.0
		*/
		$wp_customize->add_setting(
			'contribution_description_' . $i,
			array(
				'default'   => '',
				'transport' => 'refresh',
			)
		);

		// Contributions Description Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contribution_description_' . $i . '_control',
				array(
					'label'       => __( 'Contribution ' . $i . ' Description', 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'contribution_description_' . $i,
					'type'        => 'textarea',
					'description' => 'Add Description for Contribution #' . $i,
				)
			)
		);

		// Contributions button link Setting.
		$wp_customize->add_setting(
			'contribution_' . $i . '_btn_link',
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Contributions button link Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contribution_btn_link_control' . $i,
				array(
					'label'       => __( 'Contribution Button Link ' . $i, 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'contribution_' . $i . '_btn_link',
					'type'        => 'text',
					'description' => 'Example: https://mywebsite.com/',
				)
			)
		);

		// Contribution git button control.
		$wp_customize->add_setting(
			'contribution_' . $i . '_btn_git',
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Contribution git button Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contribution_btn_git_control' . $i,
				array(
					'label'       => __( 'Contribution Git link button ' . $i, 'juancarloswebsites' ),
					'section'     => 'projects_section',
					'settings'    => 'contribution_' . $i . '_btn_git',
					'type'        => 'text',
					'description' => 'Example: https://github.com/',
				)
			)
		);

		// Contributions Image Setting.
		$wp_customize->add_setting(
			'1st_contribution_img' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Contributions Image Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'1st_contribution_img' . $i . '_control',
				array(
					'label'       => '1st Contribution Desktop Image ' . $i,
					'section'     => 'projects_section',
					'settings'    => '1st_contribution_img' . $i,
					'type'        => 'image',
					'description' => 'Add 1st image for Contribution #' . $i,
				)
			)
		);

		// Contributions Image Setting.
		$wp_customize->add_setting(
			'2nd_contribution_img' . $i,
			array(
				'default'           => '',
				'transport'         => 'refresh',
			)
		);

		// Contributions Image Setting Control.
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'2nd_contribution_img' . $i . '_control',
				array(
					'label'       => '2nd Contribution Mobile Image ' . $i,
					'section'     => 'projects_section',
					'settings'    => '2nd_contribution_img' . $i,
					'type'        => 'image',
					'description' => 'Add 2nd image for Contribution #' . $i,
				)
			)
		);

	endfor;

	/**
	 * Footer settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_section(
		'footer_section',
		array(
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'priority'     => 10,
			'title'      => __( 'Footer Section', 'juancarloswebsites' ),
			'description'  => __( 'Footer Section Options version 1.0.0', 'juancarloswebsites' ),
			'panel'      => 'juancarloswebsites_theme_options',
		)
	);

	/**
	 * Footer footer Menu title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_menu_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer footer Menu Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_menu_title_control',
			array(
				'label'       => __( 'Footer Menu Section Title', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_menu_title',
				'type'      => 'text',
				'description' => 'Footer Menu Section Title',
			)
		)
	);

	/**
	 * Footer social title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_social_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social  Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_title_control',
			array(
				'label'       => __( 'Footer Social Section Title', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_title',
				'type'      => 'text',
				'description' => 'Footer Social Section Title',
			)
		)
	);

	/**
	 * Footer linkedin setting
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_social_linkedin',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social linkedin Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_linkedin_control',
			array(
				'label'       => __( 'linkedin Icon Link', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_linkedin',
				'type'      => 'text',
				'description' => 'Example: https://linkedin.com/user',
			)
		)
	);

	// Footer social Github link Setting.
	$wp_customize->add_setting(
		'footer_social_github',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer social Github Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_social_github_control',
			array(
				'label'       => __( 'Github Icon Link', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_social_github',
				'type'      => 'text',
				'description' => 'Example: https://github.com/user',
			)
		)
	);

	/**
	 * Footer Contact Info title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Info Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_title_control',
			array(
				'label'       => __( 'Footer Contact Info Section Title', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_title',
				'type'      => 'text',
				'description' => 'Footer Contact Info Section Title',
			)
		)
	);

	/**
	 * Footer contact email title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_email_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer contact email title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_email_title_control',
			array(
				'label'       => __( 'Footer Contact Email Title', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_email_title',
				'type'      => 'text',
				'description' => 'Footer Contact Email label',
			)
		)
	);

	/**
	 * Footer Contact Email settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_contact_email',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Email Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_contact_email_control',
			array(
				'label'       => __( 'Footer Contact Email', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_contact_email',
				'type'      => 'text',
				'description' => 'Example: youremail@gmail.com',
			)
		)
	);

	/**
	 * Footer contact Phone title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_phone_title',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer contact Phone title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_phone_title_control',
			array(
				'label'       => __( 'Footer Contact Phone Title', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_phone_title',
				'type'      => 'text',
				'description' => 'Footer Contact Phone number label',
			)
		)
	);

	/**
	 * Footer Contact Phone Number settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_phone',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Contact Phone Number Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_phone_control',
			array(
				'label'       => __( 'Footer Contact Phone Number', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_phone',
				'type'      => 'text',
				'description' => 'Example: 9514992154',
			)
		)
	);

	/**
	 * Footer Address 1 title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_address_1',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Address 1 title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_address_1_control',
			array(
				'label'       => __( 'Footer Address 1', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_address_1',
				'type'      => 'text',
				'description' => 'Example: 12140 Yourstreet Ave.',
			)
		)
	);
	
	/**
	 * Footer Address 2 title settings Section
	 *
	 * @since  1.0.0
	 */
	$wp_customize->add_setting(
		'footer_address_2',
		array(
			'default'           => '',
			'transport'         => 'refresh',
		)
	);

	// Footer Address 2 title Setting Control.
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'footer_address_2_control',
			array(
				'label'       => __( 'Footer Address 2', 'juancarloswebsites' ),
				'section'     => 'footer_section',
				'settings'    => 'footer_address_2',
				'type'      => 'text',
				'description' => 'Example: Los Angeles, CA',
			)
		)
	);
}
add_action( 'customize_register', 'juancarloswebsites_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function juancarloswebsites_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function juancarloswebsites_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function juancarloswebsites_customize_preview_js() {
	wp_enqueue_script( 'juancarloswebsites-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'juancarloswebsites_customize_preview_js' );
