<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
class Scs_Buttons_Template {

	public static $getData;

	function __construct( array $args ) {
		self::$getData = $args;
	}
	// Template Style 1
	public function scs_button_s1() {
		$iterateData = self::$getData;
		$atts        = $iterateData;

		// button settings
		$skypeid = $atts['skypeid'];

		// visibility
		if ( $atts['visibility'] == 'only-desktop' ) {
			$buttonVisibility = 'skySupport-desktop-only';
		} elseif ( $atts['visibility'] == 'only-tablet' ) {
			$buttonVisibility = 'skySupport-tablet-only';
		} elseif ( $atts['visibility'] == 'only-tablet-mobile' ) {
			$buttonVisibility = 'skySupport-mobile-tablet-only';
		} else {
			echo '';
		}

		$buttonRounded    = $atts['rounded'];
		$buttonSizes      = $atts['sizes'];
		$agentPhoto       = $atts['photo'];
		$agentName        = $atts['name'];
		$agentDesignation = $atts['designation'];
		$label_text       = $atts['label'];
		$online_text      = $atts['online'];
		$offline_text     = $atts['offline'];
		// availablity
		$avlTimezone  = $atts['timezone'];
		$avlSunday    = $atts['sunday'];
		$avlMonday    = $atts['monday'];
		$avlTuesday   = $atts['tuesday'];
		$avlWednesday = $atts['wednesday'];
		$avlThursday  = $atts['thursday'];
		$avlFriday    = $atts['friday'];
		$avlSaturday  = $atts['saturday'];
		?>
		<div class="button-wrapper">
		<button 
		<?php
		if ( $avlTimezone ) {
			?>
				data-timezone="<?php echo esc_attr( $avlTimezone ); ?>" <?php } ?> class="skySupport-bubble skySupport-button-4 sp-btn-bg skySupport-btn-bg <?php echo esc_attr( $buttonVisibility ); ?> <?php echo esc_attr( $buttonRounded ); ?> avatar-active <?php echo esc_attr( $buttonSizes ); ?>" data-btnavailablety='{ "sunday":"<?php echo esc_attr( $avlSunday ); ?>", "monday":"<?php echo esc_attr( $avlMonday ); ?>", "tuesday":"<?php echo esc_attr( $avlTuesday ); ?>", "wednesday":"<?php echo esc_attr( $avlWednesday ); ?>", "thursday":"<?php echo esc_attr( $avlThursday ); ?>", "friday":"<?php echo esc_attr( $avlFriday ); ?>", "saturday":"<?php echo esc_attr( $avlSaturday ); ?>" }'>
			<?php if ( $agentPhoto ) { ?>
				<img src="<?php echo esc_attr( $agentPhoto ); ?>" />
			<?php } ?>

			<div class="info-wrapper">
				<?php if ( $agentName || $agentDesignation ) { ?>
					<p class="info">
					<?php
					if ( $agentName ) {
						?>
						<?php echo esc_html( $agentName ); ?><?php } ?> <?php
						if ( $agentDesignation ) {
							?>
						/ <?php echo esc_html( $agentDesignation ); ?><?php } ?></p>
				<?php } ?>
				<?php if ( $label_text ) { ?>
					<p class="title"><?php echo esc_html( $label_text ); ?></p>
				<?php } ?>
				<?php if ( $online_text ) { ?>
					<p class="online"><?php echo esc_html( $online_text ); ?></p>
				<?php } ?>
				<?php if ( $offline_text ) { ?>
					<p class="offline"><?php echo esc_html( $offline_text ); ?></p>
				<?php } ?>
			</div>

			<a href="skype:<?php echo esc_attr( $skypeid ); ?>?chat" target="_blank"></a>
		</button>
		</div>
		<?php
	}

	// // Template style 2
	function scs_button_s2() {
		$iterateData = self::$getData;
		$atts        = $iterateData;
		$skypeid     = esc_attr( $atts['skypeid'] );
		// visibility
		if ( $atts['visibility'] == 'only-desktop' ) {
			$buttonVisibility = 'skySupport-desktop-only';
		} elseif ( $atts['visibility'] == 'only-tablet' ) {
			$buttonVisibility = 'skySupport-tablet-only';
		} elseif ( $atts['visibility'] == 'only-tablet-mobile' ) {
			$buttonVisibility = 'skySupport-mobile-tablet-only';
		} else {
			echo '';
		}
		$buttonSizes   = $atts['sizes'];
		$buttonRounded = $atts['rounded'];
		$label_text    = $atts['label'];
		?>

		<div class="button-wrapper">
		<a href="https://t.me/<?php echo esc_attr( $skypeid ); ?>" class="skySupport-button-2 skySupport-btn-bg sp-btn-bg <?php echo esc_attr( $buttonSizes ); ?> <?php echo esc_attr( $buttonVisibility ); ?> <?php echo esc_attr( $buttonRounded ); ?>">
			<i class="fa-solid fa-phone"></i><?php echo esc_attr( $label_text ); ?>
		</a>
		</div>
		<?php
	}
} // End Class
