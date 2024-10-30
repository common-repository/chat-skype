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

/**
 * Chat skype support buttons init
 */
function scs_buttons_template_init( $args ) {
	$buttonObj = new Scs_Buttons_Template( $args );

	if ( ! empty( $args['style'] ) ) {

		// Style Switch
		switch ( $args['style'] ) {
			case '1':
				$buttonObj->scs_button_s1();
				break;
			case '2':
				$buttonObj->scs_button_s2();
				break;
			default:
				$buttonObj->scs_button_s1();
				break;
		}
	}
}
