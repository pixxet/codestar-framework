<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

$pages = array("");
foreach (get_pages() as $page) {
	$pages[$page->post_name] = $page->post_title;
}

$settings           = array(
  'menu_title'      => 'Pixxet',
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'pxt-pixxet',
  'menu_icon'	 => 'dashicons-art',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => 'Pixxet Theme <small>by <a href="https://www.pixxet.de/" target="_blank">Pixxet</a> - <a href="https://www.omarsharkeyeh.com/" target="_blank">Omar Sharkeyeh</a></small>',
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

$options = array();

$options[] = array(
	'name'          => 'general',
	'title'         => 'General',
	'icon'          => 'pxt pxt-check-circle-o',
	'fields'        => array(
		array(
			'id'           => 'site-font',
			'type'         => 'typography',
			'title'        => __( 'Site Font', 'pxt-pixxet-theme' ),
			'desc' => __( 'Choose a default logo image to display', 'pxt-pixxet-theme' ),
			'default'      => array(
				'family'   => 'Lato',
				'font'     => 'google',
			),
			'variant'      => true,
			'chosen'       => true,
		),
		array(
			'id'      => 'demo',
			'type'    => 'switcher',
			'title'   => __('Activate Demo mode?', 'pxt-pixxet-theme' ),
			//'label'   => __('Yes', 'pxt-pixxet-theme' ),
			'default' => false
		),

		array(
			'id'      => 'age-warning',
			'type'    => 'switcher',
			'title'   => __('Activate Age check?', 'pxt-pixxet-theme' ),
			//'label'   => __('Yes', 'pxt-pixxet-theme' ),
			'default' => true,
			'attributes'   => array(
				'data-depend-id' => 'age-warning',
			),
		),
		array(
			'id'        => 'age-warning-fields',
			'type'      => 'fieldset',
			'title'     => __('Age Warning', 'pxt-pixxet-theme'),
			'fields'    => array(
				array(
					'id'       => 'age-warning-text',
					'type'     => 'textarea',
					'title'    => __( 'Age warning message', 'pxt-pixxet-theme' ),
					'desc'     => __( 'The message displayed in the age warning box', 'pxt-pixxet-theme' ),
				),

				array(
					'id'       => 'age-warning-yes',
					'type'     => 'text',
					'title'    => __( 'Age warning message', 'pxt-pixxet-theme' ),
					'desc'     => __( 'The message displayed in the age warning box', 'pxt-pixxet-theme' ),
				),

				array(
					'id'       => 'age-warning-no',
					'type'     => 'text',
					'title'    => __( 'Age warning message', 'pxt-pixxet-theme' ),
					'desc'     => __( 'The message displayed in the age warning box', 'pxt-pixxet-theme' ),
				),

				array(
					'id'       => 'age-warning-redirect-site',
					'type'     => 'text',
					'title'    => __( 'Age warning message', 'pxt-pixxet-theme' ),
					'desc'     => __( 'The message displayed in the age warning box', 'pxt-pixxet-theme' ),
				),
			),
			'dependency' => array('age-warning','==', true),
		),

		array(
			'id'      => 'custom-name-active',
			'type'    => 'switcher',
			'title'   => __('Activate Custom Name', 'pxt-pixxet-theme' ),
			'default' => true,
			'attributes'   => array(
				'data-depend-id' => 'custom-name-active',
			),
		),

		array(
			'id'      => 'custom-name',
			'type'    => 'text',
			'title'   => __('Custom Name', 'pxt-pixxet-theme' ),
			'dependency' => array('custom-name-active', '==', true)
		),

		array(
			'id'      => 'address',
			'type'    => 'text',
			'title'   => __('Address', 'pxt-pixxet-theme' ),
		),

		array(
			'id'      => 'map-zoom',
			'type'    => 'number',
			'title'   => __('Map Zoom', 'pxt-pixxet-theme' ),
			'default' => 11,
		),
	)
);

$options[] = array(
	'name'          => 'home',
	'title'	        => __( 'Home page', 'pxt-pixxet-theme' ),
	'icon'          => 'pxt pxt-home',
	'fields'        => array(
		array(
			'id'	  => 'ff_slider_posts',
			'type'	  => 'number',
			'title'   => __( 'Firstfold Slider Posts', 'pxt-pixxet-theme' ),
			'desc'    => __( 'The number of posts in the firstfold slider, -1 is for unlimited', 'pxt-pixxet-theme' ),
			'default' => 1,
		),

		array(
			'id'	  => 'ff_slider_slides',
			'type'	  => 'number',
			'title'   => __( 'Firstfold Slider Slides', 'pxt-pixxet-theme' ),
			'desc'    => __( 'The max number of slides in the firstfold slider, -1 is for unlimited', 'pxt-pixxet-theme' ),
			'default' => 3,
		),

		array(
			'id'       => 'partners-title',
			'type'     => 'text',
			'title'    => __( 'Partners title', 'pxt-pixxet-theme' ),
			'desc'     => __( 'The title of the partners section', 'pxt-pixxet-theme' ),
		),

		array(
			'id'              => 'partners',
			'type'            => 'group',
			'title'	          => __( 'Partner', 'pxt-pixxet-theme' ),
			'button_title'    => __( 'Add New Partner', 'pxt-pixxet-theme'),
			'accordion_title' => __( 'New Partner', 'pxt-pixxet-theme'),
			'fields'          => array(
				array(
					'id'	      => 'name',
					'type'	      => 'text',
					'title'	      => __( 'Name', 'pxt-pixxet-theme' ),
					'desc'        => __( 'Add the Name of partner', 'pxt-pixxet-theme' ),
				),
				array(
				  'id'      => 'image',
				  'type'    => 'image',
				  'title'   => __('Logo', 'pxt-pixxet-theme'),
				),
				array(
					'id'	      => 'url',
					'type'	      => 'text',
					'title'	      => __( 'URL', 'pxt-pixxet-theme' ),
					'desc'        => __( 'Add the URL of partner', 'pxt-pixxet-theme' ),
				),

				array(
					'id'      => 'wide',
					'type'    => 'switcher',
					'title'   => __('Wide Logo?', 'pxt-pixxet-theme' ),
					'label'   => __('Yes', 'pxt-pixxet-theme' ),
					'default' => false
				)
			)
		),


		array(
			'id'       => 'collection-active',
			'type'     => 'switcher',
			'title'    => __( 'Activate collection section', 'pxt-pixxet-theme' ),
			'default'  => true,
			'attributes'   => array(
				'data-depend-id' => 'collection-active',
			),
		),

		array(
			'id'       => 'collection-title',
			'type'     => 'text',
			'title'    => __( 'Collection title', 'pxt-pixxet-theme' ),
			'desc'     => __( 'The title of the collection section', 'pxt-pixxet-theme' ),
			'dependency' => array('collection-active','==', true),
		),

		array(
			'id'      => 'collection-links',
			'type'    => 'switcher',
			'title'   => __('Activate links for the collection section?', 'pxt-pixxet-theme' ),
			'default' => false,
			'dependency' => array('collection-active','==', true),
		),

		array(
			'id'           => 'divisor',
			'type'         => 'image',
			'title'        => __( 'Divsor Section Image', 'pxt-pixxet-theme' ),
			'desc'         => __( 'Choose an image to display in the divisor section', 'pxt-pixxet-theme' ),
			'add_title'    => __( 'Add an image', 'pxt-pixxet-theme' ),
		),

		array(
			'id'      => 'gallery-active',
			'type'    => 'switcher',
			'title'   => __('Activate the gallery section?', 'pxt-pixxet-theme' ),
			'default' => true,
			'attributes'   => array(
				'data-depend-id' => 'gallery-active',
			),
		),

		array(
			'id'       => 'gallery-title',
			'type'     => 'text',
			'title'    => __( 'Gallery title', 'pxt-pixxet-theme' ),
			'desc'     => __( 'The title of the gallery section', 'pxt-pixxet-theme' ),
			'dependency' => array('allery-active','==', true),
		),


		array(
			'id'       => 'contact-home',
			'type'     => 'switcher',
			'title'    => __( 'Add contact us to homepage', 'pxt-pixxet-theme' ),
			'default'  => true,
			'attributes'   => array(
				'data-depend-id' => 'contact-home',
			),
		),

		array(
			'id'        => 'contact-fields',
			'type'      => 'fieldset',
			'title'     => __('Age Warning', 'pxt-pixxet-theme'),
			'dependency' => array('contact-home','==', true),
			'fields'    => array(

				array(
					'id'       => 'contact-title',
					'type'     => 'text',
					'title'    => __( 'Contact title', 'pxt-pixxet-theme' ),
					'desc'     => __( 'The title of the contact section', 'pxt-pixxet-theme' ),
				),

				array(
					'id'      => 'contact-form',
					'type'    => 'textarea',
					'title'   => __('Contact form', 'pxt-pixxet-theme'),
				),

				array(
					'id'       => 'contact-custom-email-active',
					'type'     => 'switcher',
					'title'    => __( 'Add custom contact email to form info', 'pxt-pixxet-theme' ),
					'default'  => false,
					'dependency' => array('contact-home','==', true),
					'attributes'   => array(
						'data-depend-id' => 'contact-email-custom-active',
					),
				),

				array(
					'id'       => 'contact-custom-email',
					'type'     => 'email',
					'title'    => __( 'Contact custom email', 'pxt-pixxet-theme' ),
					'desc'     => __( 'Custom email in the contact form info.', 'pxt-pixxet-theme' ),
					'dependency' => array('contact-email-custom-active','==', true),
				),

				array(
					'id'       => 'contact-tel',
					'type'     => 'text',
					'title'    => __( 'Contact phone', 'pxt-pixxet-theme' ),
					'desc'     => __( 'Telephone number in the contact form info.', 'pxt-pixxet-theme' ),
				),

				array(
					'id'       => 'contact-mobile',
					'type'     => 'text',
					'title'    => __( 'Contact mobile', 'pxt-pixxet-theme' ),
					'desc'     => __( 'Mobile number in the contact form info.', 'pxt-pixxet-theme' ),
				),
			)
		)
	)
);

$options[] = array(
	'name'          => 'header',
	'title'         => 'Header',
	'icon'          => 'pxt pxt-arrow-circle-up',
	'fields'        => array(
		array(
			'id'           => 'text-logo',
			'type'         => 'switcher',
			'title'        => __( 'Text Logo', 'pxt-pixxet-theme' ),
			'desc'         => __( 'Use sitename as text logo', 'pxt-pixxet-theme' ),		
			'default' => false,
			'attributes'   => array(
				'data-depend-id' => 'text-logo',
			),
		),

		array(
			'id'       => 'text-logo-custom',
			'type'     => 'text',
			'title'    => __( 'Custom text logo', 'pxt-pixxet-theme' ),
			'dependency' => array('text-logo','==', true),
		),

		array(
			'id'           => 'logo',
			'type'         => 'image',
			'title'        => __( 'Logo', 'pxt-pixxet-theme' ),
			'desc'         => __( 'Choose a default logo image to display', 'pxt-pixxet-theme' ),
			'add_title'    => __('Add Logo', 'pxt-pixxet-theme' ),
			'dependency' => array('text-logo','==', false),
		),

		array(
			'id'           => 'logo-intern',
			'type'         => 'image',
			'title'        => __( 'Logo for internal sections', 'pxt-pixxet-theme' ),
			'desc'         => __( 'Choose a default logo image to display', 'pxt-pixxet-theme' ),
			'add_title'    => __('Add Logo', 'pxt-pixxet-theme' ),
			'dependency' => array('text-logo','==', false),
		),
	),	
);


if (function_exists("ninja_forms_get_all_forms")) {

	$get_forms = array();

	foreach (ninja_forms_get_all_forms() as $form) {
		$get_forms[$form['id']] = $form['data']['form_title'];
	}

	$newsletter_form = array(
			'id'       => 'newsletter_form',
			'type'     => 'select',
			'title'    => __( 'Newsletter Form', 'pxt-pixxet-theme' ),
			'desc'     => __( 'The page which includes the newsletter form', 'pxt-pixxet-theme' ),
			'options'  => $get_forms,
			'class'    => 'chosen',
		);
} else {
	$newsletter_form = "";
}

$options[] = array(
	'name'          => 'footer',
	'title'	        => __( 'Footer', 'pxt-pixxet-theme' ),
	'icon'          => 'pxt pxt-arrow-circle-down',
	'fields'        => array(
		array(
			'id'	  => 'social_title',
			'type'	  => 'text',
			'title'   => __( 'Social Media Title', 'pxt-pixxet-theme' ),
			'desc'    => __( 'The title of the social media section', 'pxt-pixxet-theme' ),
		),
	)
);
if (is_array($newsletter_form)) {
	end($options);
	$key = key($options);
	array_push($options[$key]['fields'], $newsletter_form);
}


$options[] = array(
	'name'          => 'social_media',
	'title'	        => __( 'Social Media', 'pxt-pixxet-theme' ),
	'icon'          => 'pxt pxt-heart',
	'fields'        => array(

		array(
			'id'              => 'social_media',
			'type'            => 'group',
			'title'	          => __( 'Social Media', 'pxt-pixxet-theme' ),
			'button_title'    => __( 'Add New Social Media Network', 'pxt-pixxet-theme'),
			'accordion_title' => __( 'Add New Social Media Network', 'pxt-pixxet-theme'),
			'fields'          => array(
			 	array(
			 		'id'        => 'network',
			 		'type'      => 'fieldset',
			 		'title'     => __('Network', 'pxt-pixxet-theme'),
			 		'fields'    => array(
			 			array(
			 				'id'             => 'network_type',
			 				'type'           => 'select',
			 				'title'          => __('Network Type', 'pxt-pixxet-theme'),
			 				'options'        => array(
			 					'facebook'        => 'Facebook',
			 			    	'twitter'         => 'Twitter',
			 			    	'google+'         => 'Google+',
			 			    	'youtube'         => 'YouTube',
			 			    	'instagram'       => 'Instagram',
			 			    	'pinterest'       => 'Pinterest',
			 			    	'snapchat'        => 'SnapChat',
			 				),
			 				'default_option' => '',
			 				'class'          => 'chosen',
			 				'desc'           => __('(Optional)', 'pxt-pixxet-theme'),
			 				'attributes'   => array(
			 				  'data-depend-id' => 'network_type_%s',
			 				),
			 			),

			 			array(
			 			  'id'      => 'icon',
			 			  'type'    => 'icon',
			 			  'title'   => __('Icon', 'pxt-pixxet-theme'),
			 			  'default' => 'pxt',
			 			),
			 			array(
			 				'id'	      => 'url',
			 				'type'	      => 'text',
			 				'title'	      => __( 'URL', 'pxt-pixxet-theme' ),
			 				'desc'        => __( 'Add the URL of your social media network', 'pxt-pixxet-theme' ),
			 				'dependency'  => array('network_type_%s','==',''),
			 			),
			 			array(
			 				'id'	      => 'url_id',
			 				'type'	      => 'text',
			 				'title'	      => __( 'URL', 'pxt-pixxet-theme' ),
			 				'desc'        => __( 'Add the URL or the ID of your social media network', 'pxt-pixxet-theme' ),
			 				'dependency'  => array('network_type_%s','!=',''),
			 			),

			 			array(
			 				'id'	      => 'color',
			 				'type'	      => 'color_picker',
			 				'title'	      => __( 'Color', 'pxt-pixxet-theme' ),
			 				'desc'        => __( 'Choose the color of your social media network', 'pxt-pixxet-theme' ),
			 			)
			 		)
			 	)
			 )
		)
	)
);

CSFramework::instance( $settings, $options );






