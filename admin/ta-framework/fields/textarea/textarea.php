<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: textarea
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SCS_Field_textarea' ) ) {
	class SCS_Field_textarea extends SCS_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			echo wp_kses_post( $this->field_before() );
			echo wp_kses_post( $this->shortcoder() );
			echo '<textarea name="' . esc_attr( $this->field_name() ) . '"' . wp_kses_post( $this->field_attributes() ) . '>' . wp_kses_post( $this->value ) . '</textarea>';
			echo wp_kses_post( $this->field_after() );
		}

		public function shortcoder() {

			if ( ! empty( $this->field['shortcoder'] ) ) {

				$shortcodes = ( is_array( $this->field['shortcoder'] ) ) ? $this->field['shortcoder'] : array_filter( (array) $this->field['shortcoder'] );
				$instances  = ( ! empty( SCS::$shortcode_instances ) ) ? SCS::$shortcode_instances : array();

				if ( ! empty( $shortcodes ) && ! empty( $instances ) ) {

					foreach ( $shortcodes as $shortcode ) {

						foreach ( $instances as $instance ) {

							if ( $instance['modal_id'] === $shortcode ) {

								$id    = $instance['modal_id'];
								$title = $instance['button_title'];

								echo '<a href="#" class="button button-primary scs-shortcode-button" data-modal-id="' . esc_attr( $id ) . '">' . esc_html( $title ) . '</a>';

							}
						}
					}
				}
			}
		}
	}
}
