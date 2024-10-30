<?php
/**
 * The Custom Shortcode For This Plugin.
 *
 * @since        1.0.0
 * @version      1.0.0
 *
 * @package    Chat_Skype
 * @author     ThemeAtelier
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * scs_custom_buttons_shortcode
 *
 * @param  mixed $atts
 * @return void
 */
function scs_custom_buttons_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'style'       => '1',
			'photo'       => SCS_DIR_URL . 'assets/image/user.webp',
			'name'        => esc_html__( 'Robert', 'chat-skype' ),
			'designation' => esc_html__( 'Sales Support', 'chat-skype' ),
			'label'       => esc_html__( 'How can I help you?', 'chat-skype' ),
			'online'      => esc_html__( 'I\'m avaiable', 'chat-skype' ),
			'offline'     => esc_html__( 'I\'m offline', 'chat-skype' ),
			'skypeid'     => esc_html__( '008801813381520', 'chat-skype' ),
			'visibility'  => 'skySupport-show-everywhere',
			'sizes'       => 'skySupport-btn-md',
			'rounded'     => 'skySupport-btn-rounded',
			'timezone'    => '',
			'sunday'      => esc_html__( '00:00-23:59', 'chat-skype' ),
			'monday'      => esc_html__( '00:00-23:59', 'chat-skype' ),
			'tuesday'     => esc_html__( '00:00-23:59', 'chat-skype' ),
			'wednesday'   => esc_html__( '00:00-23:59', 'chat-skype' ),
			'thursday'    => esc_html__( '00:00-23:59', 'chat-skype' ),
			'friday'      => esc_html__( '00:00-23:59', 'chat-skype' ),
			'saturday'    => esc_html__( '00:00-23:59', 'chat-skype' ),
		),
		$atts
	);

	ob_start();

	scs_buttons_template_init( $atts );

	return ob_get_clean();
}
add_shortcode( 'scs', 'scs_custom_buttons_shortcode' );
