<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Shortcoder Class
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! class_exists( 'SCS_Shortcoder' ) ) {
	/**
	 * SCS_Shortcoder
	 */
	class SCS_Shortcoder extends SCS_Abstract {

		// constans
		public $unique       = '';
		public $abstract     = 'shortcoder';
		public $blocks       = array();
		public $sections     = array();
		public $pre_tabs     = array();
		public $pre_sections = array();
		public $args         = array(
			'button_title'   => 'Add Shortcode',
			'select_title'   => 'Select a shortcode',
			'insert_title'   => 'Insert Shortcode',
			'show_in_editor' => true,
			'show_in_custom' => false,
			'defaults'       => array(),
			'class'          => '',
			'gutenberg'      => array(
				'title'       => 'SCS Shortcodes',
				'description' => 'SCS Shortcode Block',
				'icon'        => 'screenoptions',
				'category'    => 'widgets',
				'keywords'    => array( 'shortcode', 'scs', 'insert' ),
				'placeholder' => 'Write shortcode here...',
			),
		);

		// run shortcode construct
		public function __construct( $key, $params = array() ) {

			$this->unique       = $key;
			$this->args         = apply_filters( "scs_{$this->unique}_args", wp_parse_args( $params['args'], $this->args ), $this );
			$this->sections     = apply_filters( "scs_{$this->unique}_sections", $params['sections'], $this );
			$this->pre_tabs     = $this->pre_tabs( $this->sections );
			$this->pre_sections = $this->pre_sections( $this->sections );

			add_action( 'admin_footer', array( $this, 'add_footer_modal_shortcode' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'add_footer_modal_shortcode' ) );
			add_action( 'wp_ajax_scs-get-shortcode-' . $this->unique, array( $this, 'get_shortcode' ) );

			if ( ! empty( $this->args['show_in_editor'] ) ) {

				$name = str_replace( '_', '-', sanitize_title( $this->unique ) );

				SCS::$shortcode_instances[] = wp_parse_args(
					array(
						'name'     => 'scs/' . $name,
						'modal_id' => $this->unique,
					),
					$this->args
				);

				// elementor editor support
				if ( SCS::is_active_plugin( 'elementor/elementor.php' ) ) {
						add_action( 'elementor/editor/before_enqueue_scripts', array( 'SCS', 'add_admin_enqueue_scripts' ) );
						add_action( 'elementor/editor/footer', array( 'SCS_Field_icon', 'add_footer_modal_icon' ) );
						add_action( 'elementor/editor/footer', array( $this, 'add_footer_modal_shortcode' ) );
				}
			}
		}

		// instance
		public static function instance( $key, $params = array() ) {
			return new self( $key, $params );
		}

		// get default value
		public function get_default( $field ) {

			$default = ( isset( $field['default'] ) ) ? $field['default'] : '';
			$default = ( isset( $this->args['defaults'][ $field['id'] ] ) ) ? $this->args['defaults'][ $field['id'] ] : $default;

			return $default;
		}

		public function add_footer_modal_shortcode() {

			if ( ! wp_script_is( 'chat-skype' ) ) {
				return;
			}

			$class        = ( $this->args['class'] ) ? ' ' . esc_attr( $this->args['class'] ) : '';
			$has_select   = ( count( $this->pre_tabs ) > 1 ) ? true : false;
			$single_usage = ( ! $has_select ) ? ' scs-shortcode-single' : '';
			$hide_header  = ( ! $has_select ) ? ' hidden' : '';

			?>
		<div id="scs-modal-<?php echo esc_attr( $this->unique ); ?>" class="wp-core-ui scs-modal scs-shortcode hidden<?php echo esc_attr( $single_usage . $class ); ?>" data-modal-id="<?php echo esc_attr( $this->unique ); ?>" data-nonce="<?php echo esc_attr( wp_create_nonce( 'scs_shortcode_nonce' ) ); ?>">
		<div class="scs-modal-table">
			<div class="scs-modal-table-cell">
			<div class="scs-modal-overlay"></div>
			<div class="scs-modal-inner">
				<div class="scs-modal-title">
				<?php echo $this->args['button_title']; ?>
				<div class="scs-modal-close"></div>
				</div>
				<?php

				echo '<div class="scs-modal-header' . esc_attr( $hide_header ) . '">';
				echo '<select>';
				echo ( $has_select ) ? '<option value="">' . esc_attr( $this->args['select_title'] ) . '</option>' : '';

				$tab_key = 1;

				foreach ( $this->pre_tabs as $tab ) {

					if ( ! empty( $tab['subs'] ) ) {

						echo '<optgroup label="' . esc_attr( $tab['title'] ) . '">';

						foreach ( $tab['subs'] as $sub ) {

							$view      = ( ! empty( $sub['view'] ) ) ? ' data-view="' . esc_attr( $sub['view'] ) . '"' : '';
							$shortcode = ( ! empty( $sub['shortcode'] ) ) ? ' data-shortcode="' . esc_attr( $sub['shortcode'] ) . '"' : '';
							$group     = ( ! empty( $sub['group_shortcode'] ) ) ? ' data-group="' . esc_attr( $sub['group_shortcode'] ) . '"' : '';

							echo '<option value="' . esc_attr( $tab_key ) . '"' . $view . $shortcode . $group . '>' . esc_attr( $sub['title'] ) . '</option>';

							++$tab_key;

						}

						echo '</optgroup>';

					} else {

						$view      = ( ! empty( $tab['view'] ) ) ? ' data-view="' . esc_attr( $tab['view'] ) . '"' : '';
						$shortcode = ( ! empty( $tab['shortcode'] ) ) ? ' data-shortcode="' . esc_attr( $tab['shortcode'] ) . '"' : '';
						$group     = ( ! empty( $tab['group_shortcode'] ) ) ? ' data-group="' . esc_attr( $tab['group_shortcode'] ) . '"' : '';

						echo '<option value="' . esc_attr( $tab_key ) . '"' . $view . $shortcode . $group . '>' . esc_attr( $tab['title'] ) . '</option>';

						++$tab_key;

					}
				}

				echo '</select>';
				echo '</div>';

				?>
				<div class="scs-modal-content">
				<div class="scs-modal-loading"><div class="scs-loading"></div></div>
				<div class="scs-modal-load"></div>
				</div>
				<div class="scs-modal-insert-wrapper hidden"><a href="#" class="button button-primary scs-modal-insert"><?php echo $this->args['insert_title']; ?></a></div>
			</div>
			</div>
		</div>
		</div>
			<?php
		}

		public function get_shortcode() {

			ob_start();

			$nonce         = ( ! empty( $_POST['nonce'] ) ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
			$shortcode_key = ( ! empty( $_POST['shortcode_key'] ) ) ? sanitize_text_field( wp_unslash( $_POST['shortcode_key'] ) ) : '';

			if ( ! empty( $shortcode_key ) && wp_verify_nonce( $nonce, 'scs_shortcode_nonce' ) ) {

				$unallows  = array( 'group', 'repeater', 'sorter' );
				$section   = $this->pre_sections[ $shortcode_key - 1 ];
				$shortcode = ( ! empty( $section['shortcode'] ) ) ? $section['shortcode'] : '';
				$view      = ( ! empty( $section['view'] ) ) ? $section['view'] : 'normal';

				if ( ! empty( $section ) ) {

					//
					// View: normal
					if ( ! empty( $section['fields'] ) && $view !== 'repeater' ) {

						echo '<div class="scs-fields">';

						echo ( ! empty( $section['description'] ) ) ? '<div class="scs-field scs-section-description">' . $section['description'] . '</div>' : '';

						foreach ( $section['fields'] as $field ) {

							if ( in_array( $field['type'], $unallows ) ) {
								$field['_notice'] = true; }

							// Extra tag improves for spesific fields (border, spacing, dimensions etc...)
							$field['tag_prefix'] = ( ! empty( $field['tag_prefix'] ) ) ? $field['tag_prefix'] . '_' : '';

							$field_default = ( isset( $field['id'] ) ) ? $this->get_default( $field ) : '';

							SCS::field( $field, $field_default, $shortcode, 'shortcode' );

						}

						echo '</div>';

					}

					//
					// View: group and repeater fields
					$repeatable_fields = ( $view === 'repeater' && ! empty( $section['fields'] ) ) ? $section['fields'] : array();
					$repeatable_fields = ( $view === 'group' && ! empty( $section['group_fields'] ) ) ? $section['group_fields'] : $repeatable_fields;

					if ( ! empty( $repeatable_fields ) ) {

						$button_title    = ( ! empty( $section['button_title'] ) ) ? ' ' . $section['button_title'] : esc_html__( 'Add New', 'chat-skype' );
						$inner_shortcode = ( ! empty( $section['group_shortcode'] ) ) ? $section['group_shortcode'] : $shortcode;

						echo '<div class="scs--repeatable">';

						echo '<div class="scs--repeat-shortcode">';

						echo '<div class="scs-repeat-remove fas fa-times"></div>';

						echo '<div class="scs-fields">';

						foreach ( $repeatable_fields as $field ) {

							if ( in_array( $field['type'], $unallows ) ) {
								$field['_notice'] = true; }

							// Extra tag improves for spesific fields (border, spacing, dimensions etc...)
							$field['tag_prefix'] = ( ! empty( $field['tag_prefix'] ) ) ? $field['tag_prefix'] . '_' : '';

							$field_default = ( isset( $field['id'] ) ) ? $this->get_default( $field ) : '';

							SCS::field( $field, $field_default, $inner_shortcode . '[0]', 'shortcode' );

						}

						echo '</div>';

						echo '</div>';

						echo '</div>';

						echo '<div class="scs--repeat-button-block"><a class="button scs--repeat-button" href="#"><i class="fas fa-plus-circle"></i> ' . $button_title . '</a></div>';

					}
				}
			} else {
					echo '<div class="scs-field scs-error-text">' . esc_html__( 'Error: Invalid nonce verification.', 'chat-skype' ) . '</div>';
			}

			wp_send_json_success( array( 'content' => ob_get_clean() ) );
		}

		// Once editor setup for gutenberg and media buttons
		public static function once_editor_setup() {

			if ( function_exists( 'register_block_type' ) ) {
				add_action( 'enqueue_block_editor_assets', array( 'SCS_Shortcoder', 'add_guteberg_blocks' ) );
			}

			if ( scs_wp_editor_api() ) {
				add_action( 'media_buttons', array( 'SCS_Shortcoder', 'add_media_buttons' ) );
			}
		}

		// Add gutenberg blocks.
		public static function add_guteberg_blocks() {

			$depends = array( 'wp-blocks', 'wp-element', 'wp-components' );

			if ( wp_script_is( 'wp-edit-widgets' ) ) {
				$depends[] = 'wp-edit-widgets';
			} else {
				$depends[] = 'wp-edit-post';
			}

			wp_enqueue_script( 'scs-gutenberg-block', SCS::include_plugin_url( 'assets/js/gutenberg.js' ), $depends );

			wp_localize_script( 'scs-gutenberg-block', 'scs_gutenberg_blocks', SCS::$shortcode_instances );

			foreach ( SCS::$shortcode_instances as $block ) {

				register_block_type(
					$block['name'],
					array(
						'editor_script' => 'scs-gutenberg-block',
					)
				);

			}
		}

		// Add media buttons
		public static function add_media_buttons( $editor_id ) {

			foreach ( SCS::$shortcode_instances as $value ) {
				echo '<a href="#" class="button button-primary scs-shortcode-button" data-editor-id="' . esc_attr( $editor_id ) . '" data-modal-id="' . esc_attr( $value['modal_id'] ) . '">' . esc_html( $value['button_title'] ) . '</a>';
			}
		}
	}
}
