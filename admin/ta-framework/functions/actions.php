<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'scs_get_icons' ) ) {
	/**
	 * scs_get_icons
	 *
	 * @return void
	 */
	function scs_get_icons() {

		$nonce = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';

		if ( ! wp_verify_nonce( $nonce, 'scs_icon_nonce' ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) ) );
		}

		ob_start();

		$icon_library = ( apply_filters( 'scs_fa4', false ) ) ? 'fa4' : 'fa5';

		SCS::include_plugin_file( 'fields/icon/' . $icon_library . '-icons.php' );

		$icon_lists = apply_filters( 'scs_field_icon_add_icons', scs_get_default_icons() );

		if ( ! empty( $icon_lists ) ) {

			foreach ( $icon_lists as $list ) {

				echo ( count( $icon_lists ) >= 2 ) ? '<div class="scs-icon-title">' . esc_attr( $list['title'] ) . '</div>' : '';

				foreach ( $list['icons'] as $icon ) {
					echo '<i title="' . esc_attr( $icon ) . '" class="' . esc_attr( $icon ) . '"></i>';
				}
			}
		} else {

				echo '<div class="scs-error-text">' . esc_html__( 'No data available.', 'chat-skype' ) . '</div>';

		}

		$content = ob_get_clean();

		wp_send_json_success( array( 'content' => $content ) );
	}
	add_action( 'wp_ajax_scs-get-icons', 'scs_get_icons' );
}

/**
 *
 * Export
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'scs_export' ) ) {
	/**
	 * scs_export
	 *
	 * @return void
	 */
	function scs_export() {

		$nonce  = ( ! empty( $_GET['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_GET['nonce'] ) ) : '';
		$unique = ( ! empty( $_GET['unique'] ) ) ? sanitize_text_field( wp_unslash( $_GET['unique'] ) ) : '';

		if ( ! wp_verify_nonce( $nonce, 'scs_backup_nonce' ) ) {
			die( esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) );
		}

		if ( empty( $unique ) ) {
			die( esc_html__( 'Error: Invalid key.', 'chat-skype' ) );
		}

		// Export
		header( 'Content-Type: application/json' );
		header( 'Content-disposition: attachment; filename=backup-' . gmdate( 'd-m-Y' ) . '.json' );
		header( 'Content-Transfer-Encoding: binary' );
		header( 'Pragma: no-cache' );
		header( 'Expires: 0' );

		echo wp_json_encode( get_option( $unique ) );

		die();
	}
	add_action( 'wp_ajax_scs-export', 'scs_export' );
}

/**
 *
 * Import Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'scs_import_ajax' ) ) {
	function scs_import_ajax() {

		$nonce  = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
		$unique = ( ! empty( $_POST['unique'] ) ) ? sanitize_text_field( wp_unslash( $_POST['unique'] ) ) : '';
		$data   = ( ! empty( $_POST['data'] ) ) ? wp_kses_post_deep( json_decode( wp_unslash( trim( $_POST['data'] ) ), true ) ) : array();

		if ( ! wp_verify_nonce( $nonce, 'scs_backup_nonce' ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) ) );
		}

		if ( empty( $unique ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid key.', 'chat-skype' ) ) );
		}

		if ( empty( $data ) || ! is_array( $data ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: The response is not a valid JSON response.', 'chat-skype' ) ) );
		}

		// Success
		update_option( $unique, $data );

		wp_send_json_success();
	}
	add_action( 'wp_ajax_scs-import', 'scs_import_ajax' );
}

/**
 *
 * Reset Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'scs_reset_ajax' ) ) {
	function scs_reset_ajax() {

		$nonce  = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
		$unique = ( ! empty( $_POST['unique'] ) ) ? sanitize_text_field( wp_unslash( $_POST['unique'] ) ) : '';

		if ( ! wp_verify_nonce( $nonce, 'scs_backup_nonce' ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) ) );
		}

		// Success
		delete_option( $unique );

		wp_send_json_success();
	}
	add_action( 'wp_ajax_scs-reset', 'scs_reset_ajax' );
}

/**
 *
 * Chosen Ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'scs_chosen_ajax' ) ) {
	function scs_chosen_ajax() {

		$nonce = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
		$type  = ( ! empty( $_POST['type'] ) ) ? sanitize_text_field( wp_unslash( $_POST['type'] ) ) : '';
		$term  = ( ! empty( $_POST['term'] ) ) ? sanitize_text_field( wp_unslash( $_POST['term'] ) ) : '';
		$query = ( ! empty( $_POST['query_args'] ) ) ? wp_kses_post_deep( $_POST['query_args'] ) : array();

		if ( ! wp_verify_nonce( $nonce, 'scs_chosen_ajax_nonce' ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) ) );
		}

		if ( empty( $type ) || empty( $term ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: Invalid term ID.', 'chat-skype' ) ) );
		}

		$capability = apply_filters( 'scs_chosen_ajax_capability', 'manage_options' );

		if ( ! current_user_can( $capability ) ) {
			wp_send_json_error( array( 'error' => esc_html__( 'Error: You do not have permission to do that.', 'chat-skype' ) ) );
		}

		// Success
		$options = SCS_Fields::field_data( $type, $term, $query );

		wp_send_json_success( $options );
	}
	add_action( 'wp_ajax_scs-chosen', 'scs_chosen_ajax' );
}
