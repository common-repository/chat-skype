<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: fieldset
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SCS_Field_fieldset' ) ) {
	class SCS_Field_fieldset extends SCS_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			echo wp_kses_post( $this->field_before() );

			echo '<div class="scs-fieldset-content" data-depend-id="' . esc_attr( $this->field['id'] ) . '">';

			foreach ( $this->field['fields'] as $field ) {

				$field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
				$field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
				$field_value   = ( isset( $this->value[ $field_id ] ) ) ? $this->value[ $field_id ] : $field_default;
				$unique_id     = ( ! empty( $this->unique ) ) ? $this->unique . '[' . $this->field['id'] . ']' : $this->field['id'];

				SCS::field( $field, $field_value, $unique_id, 'field/fieldset' );

			}

			echo '</div>';

			echo wp_kses_post( $this->field_after() );
		}
	}
}
