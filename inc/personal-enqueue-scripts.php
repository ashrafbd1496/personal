<?php 
/**
 * Enqueue scripts and styles.
 */
class Personal_Enqueue_Scripts {

	/**
	 * hooking theme's scripts and stylesheet
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'personal_scripts'] );
	}

	/**
	 * Function for enqueue all scripts
	 */
	public function personal_scripts() {
		//google font 
		wp_enqueue_style('google-font','//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i');

		// // bootstrap stylesheet.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', [], null );
		wp_enqueue_style( 'bootstrap-icon', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', [], null );
		wp_enqueue_style( 'boxicons', get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css', [], null );
		wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', [], null );
		wp_enqueue_style( 'remixicon', get_template_directory_uri() . '/assets/vendor/remixicon/remixicon.css', [], null );
		wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', [], null );

		// // Fontawesome V4 stylesheet.
		// wp_enqueue_style( 'fontawesome-5', get_template_directory_uri() . '/assets/css/all.min.css', [], null );

		// Add custom fonts, used in the main stylesheet.
		//wp_enqueue_style( 'personal-fonts', lprd_fonts_url(), [], null );

		// Add main stylesheet
		wp_enqueue_style( 'personal-template-style', get_template_directory_uri() . '/assets/css/style.css', [], _S_VERSION );
			// Theme stylesheet.
		wp_enqueue_style( 'personal-theme-style', get_stylesheet_uri(), [], _S_VERSION );

		// Add responsive stylesheet
		// wp_enqueue_style( 'personal-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], null );

		/**
		 * Load All jQuery Library
		 */
		wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter.js', [], _S_VERSION, true );
		wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], _S_VERSION, true );
		wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', [], _S_VERSION, true );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', [], _S_VERSION, true );
		wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', [], _S_VERSION, true );
		wp_enqueue_script( 'noframework.waypoints', get_template_directory_uri() . '/assets/vendor/waypoints/noframework.waypoints.js', [], _S_VERSION, true );
		wp_enqueue_script( 'email-form-validate', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', [], _S_VERSION, true );

		wp_enqueue_script( 'personal-customizer', get_template_directory_uri() . '/js/customizer.js', ['jquery','customize-preview'], _S_VERSION, true );
		wp_enqueue_script( 'personal-navigation', get_template_directory_uri() . '/js/navigation.js', [], _S_VERSION, true );

		// Add personal-main js library
		wp_enqueue_script( 'personal-template-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '', true );

		//localize scripts
		wp_localize_script( 'personal-main-js', 'personal_localize', [
			'theme_url'       => apply_filters( 'personal-home-url', home_url() ),
			'theme_directory' => get_template_directory_uri(),
			'ajax_url'        => admin_url( 'admin-ajax.php' ),
			// 'nonce' => wp_create_nonce("validation_nonce")
		] );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

new Personal_Enqueue_Scripts();



