<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SCS_Field_icon' ) ) {
	class SCS_Field_icon extends SCS_Fields {

		public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
			parent::__construct( $field, $value, $unique, $where, $parent );
		}

		public function render() {

			$args = wp_parse_args(
				$this->field,
				array(
					'button_title' => esc_html__( 'Add Icon', 'chat-skype' ),
					'remove_title' => esc_html__( 'Remove Icon', 'chat-skype' ),
				)
			);

			echo wp_kses_post( $this->field_before() );

			$nonce  = wp_create_nonce( 'scs_icon_nonce' );
			$hidden = ( empty( $this->value ) ) ? ' hidden' : '';

			echo '<div class="scs-icon-select">';
			echo '<span class="scs-icon-preview' . esc_attr( $hidden ) . '"><i class="' . esc_attr( $this->value ) . '"></i></span>';
			echo '<a href="#" class="button button-primary scs-icon-add" data-nonce="' . esc_attr( $nonce ) . '">' . esc_html( $args['button_title'] ) . '</a>';
			echo '<a href="#" class="button scs-warning-primary scs-icon-remove' . esc_attr( $hidden ) . '">' . esc_html( $args['remove_title'] ) . '</a>';
			echo '<input type="hidden" name="' . esc_attr( $this->field_name() ) . '" value="' . esc_attr( $this->value ) . '" class="scs-icon-value"' . wp_kses_post( $this->field_attributes() ) . ' />';
			echo '</div>';

			echo wp_kses_post( $this->field_after() );
		}

		public function enqueue() {
			add_action( 'admin_footer', array( 'SCS_Field_icon', 'add_footer_modal_icon' ) );
			add_action( 'customize_controls_print_footer_scripts', array( 'SCS_Field_icon', 'add_footer_modal_icon' ) );
		}

		public static function add_footer_modal_icon() {
			?>
		<div id="scs-modal-icon" class="scs-modal scs-modal-icon hidden">
		<div class="scs-modal-table">
			<div class="scs-modal-table-cell">
			<div class="scs-modal-overlay"></div>
			<div class="scs-modal-inner">
				<div class="scs-modal-title">
				<?php esc_html_e( 'Add Icon', 'chat-skype' ); ?>
				<div class="scs-modal-close scs-icon-close"></div>
				</div>
				<div class="scs-modal-header">
				<input type="text" placeholder="<?php esc_html_e( 'Search...', 'chat-skype' ); ?>" class="scs-icon-search" />
				</div>
				<div class="scs-modal-content">
				<div class="scs-modal-loading"><div class="scs-loading"></div></div>
				<div class="scs-modal-load"></div>
				</div>
			</div>
			</div>
		</div>
		</div>
			<?php
		}
	}
}
