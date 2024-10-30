<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: checkbox
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SCS_Field_checkbox' ) ) {
	class SCS_Field_checkbox extends SCS_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'inline'         => false,
					'query_args'     => array(),
					'check_all'      => false,
					'check_all_text' => esc_html__( 'Check/Uncheck All' ),
				)
			);

			$inline_class = ( $args['inline'] ) ? ' class="scs--inline-list"' : '';

			echo wp_kses_post( $this->field_before() );

			if ( isset( $this->field['options'] ) ) {

				$value   = ( is_array( $this->value ) ) ? $this->value : array_filter( (array) $this->value );
				$options = $this->field['options'];
				$options = ( is_array( $options ) ) ? $options : array_filter( $this->field_data( $options, false, $args['query_args'] ) );

				if ( is_array( $options ) && ! empty( $options ) ) {

					echo '<ul' . wp_kses_post( $inline_class ) . '>';

					foreach ( $options as $option_key => $option_value ) {

						if ( is_array( $option_value ) && ! empty( $option_value ) ) {

								echo '<li>';
							echo '<ul>';
								echo '<li><strong>' . esc_attr( $option_key ) . '</strong></li>';
							foreach ( $option_value as $sub_key => $sub_value ) {
								$checked = ( in_array( $sub_key, $value ) ) ? ' checked' : '';
								echo '<li>';
								echo '<label>';
								echo '<input type="checkbox" name="' . esc_attr( $this->field_name( '[]' ) ) . '" value="' . esc_attr( $sub_key ) . '"' . wp_kses_post( $this->field_attributes() ) . esc_attr( $checked ) . '/>';
								echo '<span class="scs--text">' . esc_attr( $sub_value ) . '</span>';
								echo '</label>';
								echo '</li>';
							}
							echo '</ul>';
								echo '</li>';

						} else {

							$checked = ( in_array( $option_key, $value ) ) ? ' checked' : '';

							echo '<li>';
							echo '<label>';
							echo '<input type="checkbox" name="' . esc_attr( $this->field_name( '[]' ) ) . '" value="' . esc_attr( $option_key ) . '"' . wp_kses_post( $this->field_attributes() ) . esc_attr( $checked ) . '/>';
							echo '<span class="scs--text">' . esc_attr( $option_value ) . '</span>';
							echo '</label>';
							echo '</li>';

						}
					}

					echo '</ul>';

					if ( $args['check_all'] ) {
						echo '<div class="scs-checkbox-all">' . esc_html( $args['check_all_text'] ) . '</div>';
					}
				} else {

						echo ( ! empty( $this->field['empty_message'] ) ) ? esc_attr( $this->field['empty_message'] ) : esc_html__( 'No data available.', 'chat-skype' );

				}
			} else {

					echo '<label class="scs-checkbox">';
					echo '<input type="hidden" name="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $this->value ) . '" class="scs--input"' . wp_kses_post( $this->field_attributes() ) . '/>';
					echo '<input type="checkbox" name="_pseudo" class="scs--checkbox"' . esc_attr( checked( $this->value, 1, false ) ) . wp_kses_post( $this->field_attributes() ) . '/>';
					echo ( ! empty( $this->field['label'] ) ) ? '<span class="scs--text">' . esc_attr( $this->field['label'] ) . '</span>' : '';
					echo '</label>';

			}

			echo wp_kses_post( $this->field_after() );
		}
	}
}
