<?php

/**
 *
 * @package    Chat skype support - WordPress plugin
 * @version    1.0
 * @author     ThemeAtelier
 * @Websites: https://themeatelier.net/
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( SCS_ALERT_MSG );
}

if ( ! class_exists( 'Scs_Enqueue' ) ) {
	class Scs_Enqueue {

		public function __construct( $args = array() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_enqueue_scripts' ) );
		}
		// Front-End enqueue scripts
		public function frontend_enqueue_scripts() {
			wp_enqueue_style( 'fontawesome', SCS_DIR_URL . 'assets/css/all.min.css', array(), '1.0', false );
			wp_enqueue_style( 'scs-main', SCS_DIR_URL . 'assets/css/scs-main.css', array(), '1.0', false );
			/********************
				Js Enqueue
			 */
			wp_enqueue_script( 'moment', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'moment-timezone', SCS_DIR_URL . 'assets/js/moment-timezone-with-data.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'scs-main', SCS_DIR_URL . 'assets/js/scs-main.js', array( 'jquery' ), '1.0', true );
		}
	}

	$obj = new Scs_Enqueue();
}
