<?php
/**
 *
 * @package    Chat skype support Wp plugin
 * @version    1.0
 * @author     ThemeAtelier
 * @description Creaate chat bubble for this plugin.
 * @Websites: https://themeatelier.net/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wp_footer', 'scs_chat_popup' );
function scs_chat_popup() {
	$options         = get_option( 'scs-opt' );
	$opt_availablity = $options['opt-availablity'];
	$sunday_from     = $opt_availablity ? $opt_availablity['availablity-sunday']['from'] : '00:00';
	$sunday_to       = $opt_availablity ? $opt_availablity['availablity-sunday']['to'] : '23:59';
	$monday_from     = $opt_availablity ? $opt_availablity['availablity-monday']['from'] : '00:00';
	$monday_to       = $opt_availablity ? $opt_availablity['availablity-monday']['to'] : '23:59';
	$tuesday_from    = $opt_availablity ? $opt_availablity['availablity-tuesday']['from'] : '00:00';
	$tuesday_to      = $opt_availablity ? $opt_availablity['availablity-tuesday']['to'] : '23:59';
	$wednesday_from  = $opt_availablity ? $opt_availablity['availablity-wednesday']['from'] : '00:00';
	$wednesday_to    = $opt_availablity ? $opt_availablity['availablity-wednesday']['to'] : '23:59';
	$thursday_from   = $opt_availablity ? $opt_availablity['availablity-thursday']['from'] : '00:00';
	$thursday_to     = $opt_availablity ? $opt_availablity['availablity-thursday']['to'] : '23:59';
	$friday_from     = $opt_availablity ? $opt_availablity['availablity-friday']['from'] : '00:00';
	$friday_to       = $opt_availablity ? $opt_availablity['availablity-friday']['to'] : '23:59';
	$saturday_from   = $opt_availablity ? $opt_availablity['availablity-saturday']['from'] : '00:00';
	$saturday_to     = $opt_availablity ? $opt_availablity['availablity-saturday']['to'] : '23:59';
	$sunday          = ( $sunday_from ? $sunday_from : '0:00' ) . '-' . ( $sunday_to ? $sunday_to : '23:59' );
	$monday          = ( $monday_from ? $monday_from : '0:00' ) . '-' . ( $monday_to ? $monday_to : '23:59' );
	$tuesday         = ( $tuesday_from ? $tuesday_from : '0:00' ) . '-' . ( $tuesday_to ? $tuesday_to : '23:59' );
	$wednesday       = ( $wednesday_from ? $wednesday_from : '0:00' ) . '-' . ( $wednesday_to ? $wednesday_to : '23:59' );
	$thursday        = ( $thursday_from ? $thursday_from : '0:00' ) . '-' . ( $thursday_to ? $thursday_to : '23:59' );
	$friday          = ( $friday_from ? $friday_from : '0:00' ) . '-' . ( $friday_to ? $friday_to : '23:59' );
	$saturday        = ( $saturday_from ? $saturday_from : '0:00' ) . '-' . ( $saturday_to ? $saturday_to : '23:59' );
	$random          = wp_rand( 1, 13 );
	$bubble_type     = null;
	$button_label    = $options['bubble-text'];
	if ( '1' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble circle-bubble circle-animation-' . esc_attr( $options['circle-animation'] ) . ' ">
      <span class="open-icon"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
      <span class="close-icon"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
    </button>';
	} elseif ( '2' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-bg">
      <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
      <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
      <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
      </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '3' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble">
      <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
      <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
      <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
      </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '4' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-rounded skySupport-btn-bg">
    <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
    <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
    <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
    </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '5' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-rounded">
  <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
  <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
  </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '6' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-bg bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
  <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
  </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '7' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble  bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
  <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
  </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '8' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-bg skySupport-btn-rounded bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
  <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
  </div>' . esc_attr( $button_label ) . '</button>';
	} elseif ( '9' === $options['opt-button-style'] ) {
		$bubble_type = '<button class="skySupport-bubble bubble skySupport-btn-rounded bubble-transparent">
  <div class="bubble__icon bubble-animation' . esc_attr( $options['circle-animation'] ) . '">
  <span class="bubble__icon--open"><i class="' . esc_html( $options['circle-button-icon'] ) . '"></i></span>
  <span class="bubble__icon--close"><i class="' . esc_html( $options['circle-button-close'] ) . '"></i></span>
  </div>' . esc_attr( $button_label ) . '</button>';
	}
	?>
	<div class="skySupport skySupport-
	<?php
	if ( isset( $options['bubble-visibility'] ) ) {
		echo esc_attr( $options['bubble-visibility'] );
	}
	?>
	-only <?php if ( $options['autoshow-popup'] ) : ?>
	skySupport-show<?php endif; ?> <?php
	if ( 'dark' === $options['bubble-style'] ) :
		?>
	dark-mode <?php elseif ( 'night' === $options['bubble-style'] ) : ?>
	night-mode<?php endif; ?> <?php
	if ( 'left' === $options['bubble-position'] ) {
		?>
		skySupport-left<?php } ?>">
		<?php echo wp_kses_post( $bubble_type ); ?>
		<div class="skySupport__popup animation
	<?php if ( 'random' === $options['select-animation'] ) : ?>
		<?php echo esc_attr( $random ); ?>
		<?php else : ?>
		<?php echo esc_attr( $options['select-animation'] ); ?><?php endif; ?> chat-availability" 
					<?php
					if ( $options['select-timezone'] ) {
						?>
						data-timezone="<?php echo esc_attr( $options['select-timezone'] ); ?>" <?php } ?> data-availability='{ "sunday":"<?php echo esc_attr( $sunday ); ?>", "monday":"<?php echo esc_attr( $monday ); ?>", "tuesday":"<?php echo esc_attr( $tuesday ); ?>", "wednesday":"<?php echo esc_attr( $wednesday ); ?>", "thursday":"<?php echo esc_attr( $thursday ); ?>", "friday":"<?php echo esc_attr( $friday ); ?>", "saturday":"<?php echo esc_attr( $saturday ); ?>" }'>
			<div class="skySupport__popup--header 
		<?php if ( 'center' === $options['header-content-position'] ) { ?>
			header-center<?php } ?>">
				<div class="image">
					<img src="<?php echo esc_attr( $options['agent-photo']['url'] ); ?>" />
				</div>
				<div class="info">
					<h4 class="info__name">
						<?php echo esc_html( $options['agent-name'] ); ?>
					</h4>
					<p class="info__title">
						<?php echo esc_html( $options['agent-subtitle'] ); ?>
					</p>
				</div>
			</div>
			<div class="skySupport__popup--content">
				<div class="current-time"></div>
				<div class="sms">
					<div class="sms__user">
						<img src="<?php echo esc_attr( $options['agent-photo']['url'] ); ?>" />
					</div>
					<div class="sms__text">
						<p>
							<?php echo esc_html( $options['agent-message'] ); ?>
						</p>
					</div>
				</div>
				<button class="skySupport__send-message">
					<i class="<?php echo esc_html( $options['before-chat-icon'] ); ?>"></i>
					<?php echo esc_html( $options['chat-button-text'] ); ?>
					<a href="skype:<?php echo esc_attr( $options['opt-skypeid'] ); ?>?chat" target="_blank"></a>
				</button>
			</div>
		</div>
	</div>
	<?php
}
?>