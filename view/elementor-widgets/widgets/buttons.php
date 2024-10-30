<?php

namespace Scselementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 *
 * Laamya elementor about page section widget.
 *
 * @since 1.0
 */
class Scs_Buttons extends Widget_Base {


	/**
	 * get_name
	 *
	 * @return void
	 */
	public function get_name() {
		return 'scs-buttons';
	}

	/**
	 * get_title
	 *
	 * @return void
	 */
	public function get_title() {
		return esc_html__( 'Chat skype buttons', 'chat-skype' );
	}

	/**
	 * get_icon
	 *
	 * @return void
	 */
	public function get_icon() {
		return 'eicon-headphones';
	}

	/**
	 * get_categories
	 *
	 * @return void
	 */
	public function get_categories() {
		return array( 'scs-elements' );
	}

	protected function _register_controls() {

		// Chat skype Buttons Settings.

		$this->start_controls_section(
			'scs__general__settings',
			array(
				'label' => esc_html__( 'General settings', 'chat-skype' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'skypeid',
			array(
				'label'       => esc_html__( 'Skype ID', 'chat-skype' ),
				'description' => esc_html__( 'Add your Skype ID including country code. eg: myskypeid345', 'chat-skype' ),
				'label_block' => false,
				'type'        => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'style',
			array(
				'label'       => esc_html__( 'Style', 'chat-skype' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'default'     => '1',
				'options'     => array(
					'1' => esc_html__( 'Advanced button', 'chat-skype' ),
					'2' => esc_html__( 'Basic button', 'chat-skype' ),
				),

			)
		);

		$this->add_control(
			'agent__photo',
			array(
				'label'       => esc_html__( 'Agent photo', 'chat-skype' ),
				'description' => esc_html__( 'Add agent photo to show in button.', 'chat-skype' ),
				'type'        => Controls_Manager::MEDIA,
				'label_block' => true,
				'default'     => array(
					'url' => SCS_DIR_URL . 'assets/image/user.webp',
				),
				'condition'   => array(
					'style' => '1',
				),
			)
		);

		$this->add_control(
			'agent__name',
			array(
				'label'       => esc_html__( 'Agent name', 'chat-skype' ),
				'description' => esc_html__( 'Write agent name to show in button.', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'Robert', 'chat-skype' ),
				'condition'   => array(
					'style' => '1',
				),
			)
		);

		$this->add_control(
			'agent__designation',
			array(
				'label'       => esc_html__( 'Agent designation', 'chat-skype' ),
				'description' => esc_html__( 'Write agent designation to show in button.', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'Sales Support', 'chat-skype' ),
				'condition'   => array(
					'style' => '1',
				),
			)
		);

		$this->add_control(
			'custom__button__label',
			array(
				'label'       => esc_html__( 'Button label', 'chat-skype' ),
				'description' => esc_html__( 'Add custom button label.', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'How can I help you?', 'chat-skype' ),
			)
		);

		$this->add_control(
			'online__text',
			array(
				'label'       => esc_html__( 'Online badget text', 'chat-skype' ),
				'description' => esc_html__( 'Add custom badget text when user in online.', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'I\'m avaiable', 'chat-skype' ),
				'condition'   => array(
					'style' => '1',
				),
			)
		);

		$this->add_control(
			'offline__text',
			array(
				'label'       => esc_html__( 'Offline badget text', 'chat-skype' ),
				'description' => esc_html__( 'Add custom badget text when user in offline.', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => esc_html__( 'I\'m offline', 'chat-skype' ),
				'condition'   => array(
					'style' => '1',
				),
			)
		);

		$this->end_controls_section(); // End section top content

		$this->start_controls_section(
			'scs__availablity__manager',
			array(
				'label'     => esc_html__( 'Chat settings', 'chat-skype' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => array(
					'style' => '1',
				),
			)
		);

		$this->add_control(
			'timezone',
			array(
				'label'       => esc_html__( 'Timezone', 'chat-skype' ),
				'description' => esc_html__( 'When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)', 'chat-skype' ),
				'type'        => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => false,
				'default'     => '1',
				'options'     => array(
					'1'                                => esc_html__( 'Select timezone', 'chat-skype' ),
					'Africa/Abidjan'                   => esc_html__( 'Africa/Abidjan', 'chat-skype' ),
					'Africa/Accra'                     => esc_html__( 'Africa/Accra', 'chat-skype' ),
					'Africa/Addis_Ababa'               => esc_html__( 'Africa/Addis_Ababa', 'chat-skype' ),
					'Africa/Algiers'                   => esc_html__( 'Africa/Algiers', 'chat-skype' ),
					'Africa/Asmara'                    => esc_html__( 'Africa/Asmara', 'chat-skype' ),
					'Africa/Asmera'                    => esc_html__( 'Africa/Asmera', 'chat-skype' ),
					'Africa/Bamako'                    => esc_html__( 'Africa/Bamako', 'chat-skype' ),
					'Africa/Bangui'                    => esc_html__( 'Africa/Bangui', 'chat-skype' ),
					'Africa/Banjul'                    => esc_html__( 'Africa/Banjul', 'chat-skype' ),
					'Africa/Bissau'                    => esc_html__( 'Africa/Bissau', 'chat-skype' ),
					'Africa/Blantyre'                  => esc_html__( 'Africa/Blantyre', 'chat-skype' ),
					'Africa/Brazzaville'               => esc_html__( 'Africa/Brazzaville', 'chat-skype' ),
					'Africa/Bujumbura'                 => esc_html__( 'Africa/Bujumbura', 'chat-skype' ),
					'Africa/Cairo'                     => esc_html__( 'Africa/Cairo', 'chat-skype' ),
					'Africa/Casablanca'                => esc_html__( 'Africa/Casablanca', 'chat-skype' ),
					'Africa/Ceuta'                     => esc_html__( 'Africa/Ceuta', 'chat-skype' ),
					'Africa/Conakry'                   => esc_html__( 'Africa/Conakry', 'chat-skype' ),
					'Africa/Dakar'                     => esc_html__( 'Africa/Dakar', 'chat-skype' ),
					'Africa/Dar_es_Salaam'             => esc_html__( 'Africa/Dar_es_Salaam', 'chat-skype' ),
					'Africa/Djibouti'                  => esc_html__( 'Africa/Djibouti', 'chat-skype' ),
					'Africa/Douala'                    => esc_html__( 'Africa/Douala', 'chat-skype' ),
					'Africa/El_Aaiun'                  => esc_html__( 'Africa/El_Aaiun', 'chat-skype' ),
					'Africa/Freetown'                  => esc_html__( 'Africa/Freetown', 'chat-skype' ),
					'Africa/Gaborone'                  => esc_html__( 'Africa/Gaborone', 'chat-skype' ),
					'Africa/Harare'                    => esc_html__( 'Africa/Harare', 'chat-skype' ),
					'Africa/Johannesburg'              => esc_html__( 'Africa/Johannesburg', 'chat-skype' ),
					'Africa/Juba'                      => esc_html__( 'Africa/Juba', 'chat-skype' ),
					'Africa/Kampala'                   => esc_html__( 'Africa/Kampala', 'chat-skype' ),
					'Africa/Khartoum'                  => esc_html__( 'Africa/Khartoum', 'chat-skype' ),
					'Africa/Kigali'                    => esc_html__( 'Africa/Kigali', 'chat-skype' ),
					'Africa/Kinshasa'                  => esc_html__( 'Africa/Kinshasa', 'chat-skype' ),
					'Africa/Lagos'                     => esc_html__( 'Africa/Lagos', 'chat-skype' ),
					'Africa/Libreville'                => esc_html__( 'Africa/Libreville', 'chat-skype' ),
					'Africa/Lome'                      => esc_html__( 'Africa/Lome', 'chat-skype' ),
					'Africa/Luanda'                    => esc_html__( 'Africa/Luanda', 'chat-skype' ),
					'Africa/Lubumbashi'                => esc_html__( 'Africa/Lubumbashi', 'chat-skype' ),
					'Africa/Lusaka'                    => esc_html__( 'Africa/Lusaka', 'chat-skype' ),
					'Africa/Malabo'                    => esc_html__( 'Africa/Malabo', 'chat-skype' ),
					'Africa/Maputo'                    => esc_html__( 'Africa/Maputo', 'chat-skype' ),
					'Africa/Maseru'                    => esc_html__( 'Africa/Maseru', 'chat-skype' ),
					'Africa/Mbabane'                   => esc_html__( 'Africa/Mbabane', 'chat-skype' ),
					'Africa/Mogadishu'                 => esc_html__( 'Africa/Mogadishu', 'chat-skype' ),
					'Africa/Monrovia'                  => esc_html__( 'Africa/Monrovia', 'chat-skype' ),
					'Africa/Nairobi'                   => esc_html__( 'Africa/Nairobi', 'chat-skype' ),
					'Africa/Ndjamena'                  => esc_html__( 'Africa/Ndjamena', 'chat-skype' ),
					'Africa/Niamey'                    => esc_html__( 'Africa/Niamey', 'chat-skype' ),
					'Africa/Nouakchott'                => esc_html__( 'Africa/Nouakchott', 'chat-skype' ),
					'Africa/Ouagadougou'               => esc_html__( 'Africa/Ouagadougou', 'chat-skype' ),
					'Africa/Porto-Novo'                => esc_html__( 'Africa/Porto-Novo', 'chat-skype' ),
					'Africa/Sao_Tome'                  => esc_html__( 'Africa/Sao_Tome', 'chat-skype' ),
					'Africa/Timbuktu'                  => esc_html__( 'Africa/Timbuktu', 'chat-skype' ),
					'Africa/Tripoli'                   => esc_html__( 'Africa/Tripoli', 'chat-skype' ),
					'Africa/Tunis'                     => esc_html__( 'Africa/Tunis', 'chat-skype' ),
					'Africa/Windhoek'                  => esc_html__( 'Africa/Windhoek', 'chat-skype' ),
					'America/Adak'                     => esc_html__( 'America/Adak', 'chat-skype' ),
					'America/Anchorage'                => esc_html__( 'America/Anchorage', 'chat-skype' ),
					'America/Anguilla'                 => esc_html__( 'America/Anguilla', 'chat-skype' ),
					'America/Antigua'                  => esc_html__( 'America/Antigua', 'chat-skype' ),
					'America/Argentina/Buenos_Aires'   => esc_html__( 'America/Argentina/Buenos_Aires', 'chat-skype' ),
					'America/Argentina/Catamarca'      => esc_html__( 'America/Argentina/Catamarca', 'chat-skype' ),
					'America/Argentina/ComodRivadavia' => esc_html__( 'America/Argentina/ComodRivadavia', 'chat-skype' ),
					'America/Argentina/Cordoba'        => esc_html__( 'America/Argentina/Cordoba', 'chat-skype' ),
					'America/Argentina/Jujuy'          => esc_html__( 'America/Argentina/Jujuy', 'chat-skype' ),
					'America/Argentina/La_Rioja'       => esc_html__( 'America/Argentina/La_Rioja', 'chat-skype' ),
					'America/Argentina/Mendoza'        => esc_html__( 'America/Argentina/Mendoza', 'chat-skype' ),
					'America/Argentina/Rio_Gallegos'   => esc_html__( 'America/Argentina/Rio_Gallegos', 'chat-skype' ),
					'America/Argentina/Salta'          => esc_html__( 'America/Argentina/Salta', 'chat-skype' ),
					'America/Argentina/San_Juan'       => esc_html__( 'America/Argentina/San_Juan', 'chat-skype' ),
					'America/Argentina/San_Luis'       => esc_html__( 'America/Argentina/San_Luis', 'chat-skype' ),
					'America/Argentina/Tucuman'        => esc_html__( 'America/Argentina/Tucuman', 'chat-skype' ),
					'America/Argentina/Ushuaia'        => esc_html__( 'America/Argentina/Ushuaia', 'chat-skype' ),
					'America/Aruba'                    => esc_html__( 'America/Aruba', 'chat-skype' ),
					'America/Asuncion'                 => esc_html__( 'America/Asuncion', 'chat-skype' ),
					'America/Atikokan'                 => esc_html__( 'America/Atikokan', 'chat-skype' ),
					'America/Atka'                     => esc_html__( 'America/Atka', 'chat-skype' ),
					'America/Bahia'                    => esc_html__( 'America/Bahia', 'chat-skype' ),
					'America/Bahia_Banderas'           => esc_html__( 'America/Bahia_Banderas', 'chat-skype' ),
					'America/Barbados'                 => esc_html__( 'America/Barbados', 'chat-skype' ),
					'America/Belem'                    => esc_html__( 'America/Belem', 'chat-skype' ),
					'America/Belize'                   => esc_html__( 'America/Belize', 'chat-skype' ),
					'America/Blanc-Sablon'             => esc_html__( 'America/Blanc-Sablon', 'chat-skype' ),
					'America/Boa_Vista'                => esc_html__( 'America/Boa_Vista', 'chat-skype' ),
					'America/Bogota'                   => esc_html__( 'America/Bogota', 'chat-skype' ),
					'America/Boise'                    => esc_html__( 'America/Boise', 'chat-skype' ),
					'America/Buenos_Aires'             => esc_html__( 'America/Buenos_Aires', 'chat-skype' ),
					'America/Cambridge_Bay'            => esc_html__( 'America/Cambridge_Bay', 'chat-skype' ),
					'America/Campo_Grande'             => esc_html__( 'America/Campo_Grande', 'chat-skype' ),
					'America/Cancun'                   => esc_html__( 'America/Cancun', 'chat-skype' ),
					'America/Caracas'                  => esc_html__( 'America/Caracas', 'chat-skype' ),
					'America/Catamarca'                => esc_html__( 'America/Catamarca', 'chat-skype' ),
					'America/Cayenne'                  => esc_html__( 'America/Cayenne', 'chat-skype' ),
					'America/Cayman'                   => esc_html__( 'America/Cayman', 'chat-skype' ),
					'America/Chicago'                  => esc_html__( 'America/Chicago', 'chat-skype' ),
					'America/Chihuahua'                => esc_html__( 'America/Chihuahua', 'chat-skype' ),
					'America/Coral_Harbour'            => esc_html__( 'America/Coral_Harbour', 'chat-skype' ),
					'America/Cordoba'                  => esc_html__( 'America/Cordoba', 'chat-skype' ),
					'America/Costa_Rica'               => esc_html__( 'America/Costa_Rica', 'chat-skype' ),
					'America/Creston'                  => esc_html__( 'America/Creston', 'chat-skype' ),
					'America/Cuiaba'                   => esc_html__( 'America/Cuiaba', 'chat-skype' ),
					'America/Curacao'                  => esc_html__( 'America/Curacao', 'chat-skype' ),
					'America/Danmarkshavn'             => esc_html__( 'America/Danmarkshavn', 'chat-skype' ),
					'America/Dawson'                   => esc_html__( 'America/Dawson', 'chat-skype' ),
					'America/Denver'                   => esc_html__( 'America/Denver', 'chat-skype' ),
					'America/Araguaina'                => esc_html__( 'America/Araguaina', 'chat-skype' ),
					'America/Dominica'                 => esc_html__( 'America/Dominica', 'chat-skype' ),
					'America/Edmonton'                 => esc_html__( 'America/Edmonton', 'chat-skype' ),
					'America/Eirunepe'                 => esc_html__( 'America/Eirunepe', 'chat-skype' ),
					'America/El_Salvador'              => esc_html__( 'America/El_Salvador', 'chat-skype' ),
					'America/Ensenada'                 => esc_html__( 'America/Ensenada', 'chat-skype' ),
					'America/Fort_Nelson'              => esc_html__( 'America/Fort_Nelson', 'chat-skype' ),
					'America/Fort_Wayne'               => esc_html__( 'America/Fort_Wayne', 'chat-skype' ),
					'America/Fortaleza'                => esc_html__( 'America/Fortaleza', 'chat-skype' ),
					'America/Glace_Bay'                => esc_html__( 'America/Glace_Bay', 'chat-skype' ),
					'America/Godthab'                  => esc_html__( 'America/Godthab', 'chat-skype' ),
					'America/Goose_Bay'                => esc_html__( 'America/Goose_Bay', 'chat-skype' ),
					'America/Grand_Turk'               => esc_html__( 'America/Grand_Turk', 'chat-skype' ),
					'America/Grenada'                  => esc_html__( 'America/Grenada', 'chat-skype' ),
					'America/Guadeloupe'               => esc_html__( 'America/Guadeloupe', 'chat-skype' ),
					'America/Guatemala'                => esc_html__( 'America/Guatemala', 'chat-skype' ),
					'America/Guayaquil'                => esc_html__( 'America/Guayaquil', 'chat-skype' ),
					'America/Guyana'                   => esc_html__( 'America/Guyana', 'chat-skype' ),
					'America/Halifax'                  => esc_html__( 'America/Halifax', 'chat-skype' ),
					'America/Havana'                   => esc_html__( 'America/Havana', 'chat-skype' ),
					'America/Hermosillo'               => esc_html__( 'America/Hermosillo', 'chat-skype' ),
					'America/Indiana/Indianapolis'     => esc_html__( 'Indiana/Indianapolis', 'chat-skype' ),
					'America/Indiana/Knox'             => esc_html__( 'America/Indiana/Knox', 'chat-skype' ),
					'America/Indiana/Marengo'          => esc_html__( 'America/Indiana/Marengo', 'chat-skype' ),
					'America/Indiana/Petersburg'       => esc_html__( 'America/Indiana/Petersburg', 'chat-skype' ),
					'America/Indiana/Tell_City'        => esc_html__( 'America/Indiana/Tell_City', 'chat-skype' ),
					'America/Indiana/Vevay'            => esc_html__( 'America/Indiana/Vevay', 'chat-skype' ),
					'America/Indiana/Vincennes'        => esc_html__( 'America/Indiana/Vincennes', 'chat-skype' ),
					'America/Indiana/Winamac'          => esc_html__( 'America/Indiana/Winamac', 'chat-skype' ),
					'America/Indianapolis'             => esc_html__( 'America/Indianapolis', 'chat-skype' ),
					'America/Inuvik'                   => esc_html__( 'America/Inuvik', 'chat-skype' ),
					'America/Iqaluit'                  => esc_html__( 'America/Iqaluit', 'chat-skype' ),
					'America/Jamaica'                  => esc_html__( 'America/Jamaica', 'chat-skype' ),
					'America/Jujuy'                    => esc_html__( 'America/Jujuy', 'chat-skype' ),
					'America/Juneau'                   => esc_html__( 'America/Juneau', 'chat-skype' ),
					'America/Kentucky/Louisville'      => esc_html__( 'America/Kentucky/Louisville', 'chat-skype' ),
					'America/Kentucky/Monticello'      => esc_html__( 'America/Kentucky/Monticello', 'chat-skype' ),
					'America/Knox_IN'                  => esc_html__( 'America/Knox_IN', 'chat-skype' ),
					'America/Kralendijk'               => esc_html__( 'America/Kralendijk', 'chat-skype' ),
					'America/La_Paz'                   => esc_html__( 'America/La_Paz', 'chat-skype' ),
					'America/Lima'                     => esc_html__( 'America/Lima', 'chat-skype' ),
					'America/Los_Angeles'              => esc_html__( 'America/Los_Angeles', 'chat-skype' ),
					'America/Louisville'               => esc_html__( 'America/Louisville', 'chat-skype' ),
					'America/Lower_Princes'            => esc_html__( 'America/Lower_Princes', 'chat-skype' ),
					'America/Maceio'                   => esc_html__( 'America/Maceio', 'chat-skype' ),
					'America/Managua'                  => esc_html__( 'America/Managua', 'chat-skype' ),
					'America/Manaus'                   => esc_html__( 'America/Manaus', 'chat-skype' ),
					'America/Marigot'                  => esc_html__( 'America/Marigot', 'chat-skype' ),
					'America/Martinique'               => esc_html__( 'America/Martinique', 'chat-skype' ),
					'America/Matamoros'                => esc_html__( 'America/Matamoros', 'chat-skype' ),
					'America/Mazatlan'                 => esc_html__( 'America/Mazatlan', 'chat-skype' ),
					'America/Mendoza'                  => esc_html__( 'America/Mendoza', 'chat-skype' ),
					'America/Menominee'                => esc_html__( 'America/Menominee', 'chat-skype' ),
					'America/Merida'                   => esc_html__( 'America/Merida', 'chat-skype' ),
					'America/Metlakatla'               => esc_html__( 'America/Metlakatla', 'chat-skype' ),
					'America/Mexico_City'              => esc_html__( 'America/Mexico_City', 'chat-skype' ),
					'America/Miquelon'                 => esc_html__( 'America/Miquelon', 'chat-skype' ),
					'America/Moncton'                  => esc_html__( 'America/Moncton', 'chat-skype' ),
					'America/Monterrey'                => esc_html__( 'America/Monterrey', 'chat-skype' ),
					'America/Montevideo'               => esc_html__( 'America/Montevideo', 'chat-skype' ),
					'America/Montreal'                 => esc_html__( 'America/Montreal', 'chat-skype' ),
					'America/Montserrat'               => esc_html__( 'America/Montserrat', 'chat-skype' ),
					'America/Nassau'                   => esc_html__( 'America/Nassau', 'chat-skype' ),
					'America/New_York'                 => esc_html__( 'America/New_York', 'chat-skype' ),
					'America/Nipigon'                  => esc_html__( 'America/Nipigon', 'chat-skype' ),
					'America/Nome'                     => esc_html__( 'America/Nome', 'chat-skype' ),
					'America/Noronha'                  => esc_html__( 'America/Noronha', 'chat-skype' ),
					'America/North_Dakota/Beulah'      => esc_html__( 'America/North_Dakota/Beulah', 'chat-skype' ),
					'America/North_Dakota/Center'      => esc_html__( 'America/North_Dakota/Center', 'chat-skype' ),
					'America/North_Dakota/New_Salem'   => esc_html__( 'America/North_Dakota/New_Salem', 'chat-skype' ),
					'America/Ojinaga'                  => esc_html__( 'America/Ojinaga', 'chat-skype' ),
					'America/Panama'                   => esc_html__( 'America/Panama', 'chat-skype' ),
					'America/Pangnirtung'              => esc_html__( 'America/Pangnirtung', 'chat-skype' ),
					'America/Paramaribo'               => esc_html__( 'America/Paramaribo', 'chat-skype' ),
					'America/Phoenix'                  => esc_html__( 'America/Phoenix', 'chat-skype' ),
					'America/Port-au-Prince'           => esc_html__( 'America/Port-au-Prince', 'chat-skype' ),
					'America/Port_of_Spain'            => esc_html__( 'America/Port_of_Spain', 'chat-skype' ),
					'America/Porto_Acre'               => esc_html__( 'America/Porto_Acre', 'chat-skype' ),
					'America/Porto_Velho'              => esc_html__( 'America/Porto_Velho', 'chat-skype' ),
					'America/Puerto_Rico'              => esc_html__( 'America/Puerto_Rico', 'chat-skype' ),
					'America/Punta_Arenas'             => esc_html__( 'America/Punta_Arenas', 'chat-skype' ),
					'America/Rainy_River'              => esc_html__( 'America/Rainy_River', 'chat-skype' ),
					'America/Rankin_Inlet'             => esc_html__( 'America/Rankin_Inlet', 'chat-skype' ),
					'America/Recife'                   => esc_html__( 'America/Recife', 'chat-skype' ),
					'America/Regina'                   => esc_html__( 'America/Regina', 'chat-skype' ),
					'America/Resolute'                 => esc_html__( 'America/Resolute', 'chat-skype' ),
					'America/Rio_Branco'               => esc_html__( 'America/Rio_Branco', 'chat-skype' ),
					'America/Rosario'                  => esc_html__( 'America/Rosario', 'chat-skype' ),
					'America/Santa_Isabel'             => esc_html__( 'America/Santa_Isabel', 'chat-skype' ),
					'America/Santarem'                 => esc_html__( 'America/Santarem', 'chat-skype' ),
					'America/Santiago'                 => esc_html__( 'America/Santiago', 'chat-skype' ),
					'America/Santo_Domingo'            => esc_html__( 'America/Santo_Domingo', 'chat-skype' ),
					'America/Sao_Paulo'                => esc_html__( 'America/Sao_Paulo', 'chat-skype' ),
					'America/Scoresbysund'             => esc_html__( 'America/Scoresbysund', 'chat-skype' ),
					'America/Shiprock'                 => esc_html__( 'America/Shiprock', 'chat-skype' ),
					'America/Sitka'                    => esc_html__( 'America/Sitka', 'chat-skype' ),
					'America/St_Barthelemy'            => esc_html__( 'America/St_Barthelemy', 'chat-skype' ),
					'America/St_Johns'                 => esc_html__( 'America/St_Johns', 'chat-skype' ),
					'America/St_Kitts'                 => esc_html__( 'America/St_Kitts', 'chat-skype' ),
					'America/St_Lucia'                 => esc_html__( 'America/St_Lucia', 'chat-skype' ),
					'America/St_Thomas'                => esc_html__( 'America/St_Thomas', 'chat-skype' ),
					'America/St_Vincent'               => esc_html__( 'America/St_Vincent', 'chat-skype' ),
					'America/Swift_Current'            => esc_html__( 'America/Swift_Current', 'chat-skype' ),
					'America/Tegucigalpa'              => esc_html__( 'America/Tegucigalpa', 'chat-skype' ),
					'America/Thule'                    => esc_html__( 'America/Thule', 'chat-skype' ),
					'America/Thunder_Bay'              => esc_html__( 'America/Thunder_Bay', 'chat-skype' ),
					'America/Tijuana'                  => esc_html__( 'America/Tijuana', 'chat-skype' ),
					'America/Toronto'                  => esc_html__( 'America/Toronto', 'chat-skype' ),
					'America/Tortola'                  => esc_html__( 'America/Tortola', 'chat-skype' ),
					'America/Vancouver'                => esc_html__( 'America/Vancouver', 'chat-skype' ),
					'America/Virgin'                   => esc_html__( 'America/Virgin', 'chat-skype' ),
					'America/Whitehorse'               => esc_html__( 'America/Whitehorse', 'chat-skype' ),
					'America/Winnipeg'                 => esc_html__( 'America/Winnipeg', 'chat-skype' ),
					'America/Yakutat'                  => esc_html__( 'America/Yakutat', 'chat-skype' ),
					'America/Yellowknife'              => esc_html__( 'America/Yellowknife', 'chat-skype' ),
					'Antarctica/Casey'                 => esc_html__( 'Antarctica/Casey', 'chat-skype' ),
					'Antarctica/Davis'                 => esc_html__( 'Antarctica/Davis', 'chat-skype' ),
					'Antarctica/DumontDUrville'        => esc_html__( 'Antarctica/DumontDUrville', 'chat-skype' ),
					'Antarctica/Macquarie'             => esc_html__( 'Antarctica/Macquarie', 'chat-skype' ),
					'Antarctica/Mawson'                => esc_html__( 'Antarctica/Mawson', 'chat-skype' ),
					'Antarctica/McMurdo'               => esc_html__( 'Antarctica/McMurdo', 'chat-skype' ),
					'Antarctica/Palmer'                => esc_html__( 'Antarctica/Palmer', 'chat-skype' ),
					'Antarctica/Rothera'               => esc_html__( 'Antarctica/Rothera', 'chat-skype' ),
					'Antarctica/South_Pole'            => esc_html__( 'Antarctica/South_Pole', 'chat-skype' ),
					'Antarctica/Syowa'                 => esc_html__( 'Antarctica/Syowa', 'chat-skype' ),
					'Antarctica/Troll'                 => esc_html__( 'Antarctica/Troll', 'chat-skype' ),
					'Antarctica/Vostok'                => esc_html__( 'Antarctica/Vostok', 'chat-skype' ),
					'Arctic/Longyearbyen'              => esc_html__( 'Arctic/Longyearbyen', 'chat-skype' ),
					'Asia/Aden'                        => esc_html__( 'Asia/Aden', 'chat-skype' ),
					'Asia/Almaty'                      => esc_html__( 'Asia/Almaty', 'chat-skype' ),
					'Asia/Amman'                       => esc_html__( 'Asia/Amman', 'chat-skype' ),
					'Asia/Anadyr'                      => esc_html__( 'Asia/Anadyr', 'chat-skype' ),
					'Asia/Aqtau'                       => esc_html__( 'Asia/Aqtau', 'chat-skype' ),
					'Asia/Aqtobe'                      => esc_html__( 'Asia/Aqtobe', 'chat-skype' ),
					'Asia/Ashgabat'                    => esc_html__( 'Asia/Ashgabat', 'chat-skype' ),
					'Asia/Ashkhabad'                   => esc_html__( 'Asia/Ashkhabad', 'chat-skype' ),
					'Asia/Atyrau'                      => esc_html__( 'Asia/Atyrau', 'chat-skype' ),
					'Asia/Baghdad'                     => esc_html__( 'Asia/Baghdad', 'chat-skype' ),
					'Asia/Bahrain'                     => esc_html__( 'Asia/Bahrain', 'chat-skype' ),
					'Asia/Baku'                        => esc_html__( 'Asia/Baku', 'chat-skype' ),
					'Asia/Bangkok'                     => esc_html__( 'Asia/Bangkok', 'chat-skype' ),
					'Asia/Barnaul'                     => esc_html__( 'Asia/Barnaul', 'chat-skype' ),
					'Asia/Beirut'                      => esc_html__( 'Asia/Beirut', 'chat-skype' ),
					'Asia/Bishkek'                     => esc_html__( 'Asia/Bishkek', 'chat-skype' ),
					'Asia/Brunei'                      => esc_html__( 'Asia/Brunei', 'chat-skype' ),
					'Asia/Calcutta'                    => esc_html__( 'Asia/Calcutta', 'chat-skype' ),
					'Asia/Chita'                       => esc_html__( 'Asia/Chita', 'chat-skype' ),
					'Asia/Choibalsan'                  => esc_html__( 'Asia/Choibalsan', 'chat-skype' ),
					'Asia/Chongqing'                   => esc_html__( 'Asia/Chongqing', 'chat-skype' ),
					'Asia/Chungking'                   => esc_html__( 'Asia/Chungking', 'chat-skype' ),
					'Asia/Colombo'                     => esc_html__( 'Asia/Colombo', 'chat-skype' ),
					'Asia/Dacca'                       => esc_html__( 'Asia/Dacca', 'chat-skype' ),
					'Asia/Damascus'                    => esc_html__( 'Asia/Damascus', 'chat-skype' ),
					'Asia/Dhaka'                       => esc_html__( 'Asia/Dhaka', 'chat-skype' ),
					'Asia/Dili'                        => esc_html__( 'Asia/Dili', 'chat-skype' ),
					'Asia/Dubai'                       => esc_html__( 'Asia/Dubai', 'chat-skype' ),
					'Asia/Dushanbe'                    => esc_html__( 'Asia/Dushanbe', 'chat-skype' ),
					'Asia/Famagusta'                   => esc_html__( 'Asia/Famagusta', 'chat-skype' ),
					'Asia/Gaza'                        => esc_html__( 'Asia/Gaza', 'chat-skype' ),
					'Asia/Harbin'                      => esc_html__( 'Asia/Harbin', 'chat-skype' ),
					'Asia/Hebron'                      => esc_html__( 'Asia/Hebron', 'chat-skype' ),
					'Asia/Ho_Chi_Minh'                 => esc_html__( 'Asia/Ho_Chi_Minh', 'chat-skype' ),
					'Asia/Hong_Kong'                   => esc_html__( 'Asia/Hong_Kong', 'chat-skype' ),
					'Asia/Hovd'                        => esc_html__( 'Asia/Hovd', 'chat-skype' ),
					'Asia/Irkutsk'                     => esc_html__( 'Asia/Irkutsk', 'chat-skype' ),
					'Asia/Istanbul'                    => esc_html__( 'Asia/Istanbul', 'chat-skype' ),
					'Asia/Jakarta'                     => esc_html__( 'Asia/Jakarta', 'chat-skype' ),
					'Asia/Jayapura'                    => esc_html__( 'Asia/Jayapura', 'chat-skype' ),
					'Asia/Jerusalem'                   => esc_html__( 'Asia/Jerusalem', 'chat-skype' ),
					'Asia/Kabul'                       => esc_html__( 'Asia/Kabul', 'chat-skype' ),
					'Asia/Kamchatka'                   => esc_html__( 'Asia/Kamchatka', 'chat-skype' ),
					'Asia/Karachi'                     => esc_html__( 'Asia/Karachi', 'chat-skype' ),
					'Asia/Kashgar'                     => esc_html__( 'Asia/Kashgar', 'chat-skype' ),
					'Asia/Kathmandu'                   => esc_html__( 'Asia/Kathmandu', 'chat-skype' ),
					'Asia/Katmandu'                    => esc_html__( 'Asia/Katmandu', 'chat-skype' ),
					'Asia/Khandyga'                    => esc_html__( 'Asia/Khandyga', 'chat-skype' ),
					'Asia/Kolkata'                     => esc_html__( 'Asia/Kolkata', 'chat-skype' ),
					'Asia/Krasnoyarsk'                 => esc_html__( 'Asia/Krasnoyarsk', 'chat-skype' ),
					'Asia/Kuala_Lumpur'                => esc_html__( 'Asia/Kuala_Lumpur', 'chat-skype' ),
					'Asia/Kuching'                     => esc_html__( 'Asia/Kuching', 'chat-skype' ),
					'Asia/Kuwait'                      => esc_html__( 'Asia/Kuwait', 'chat-skype' ),
					'Asia/Macao'                       => esc_html__( 'Asia/Macao', 'chat-skype' ),
					'Asia/Macau'                       => esc_html__( 'Asia/Macau', 'chat-skype' ),
					'Asia/Magadan'                     => esc_html__( 'Asia/Magadan', 'chat-skype' ),
					'Asia/Makassar'                    => esc_html__( 'Asia/Makassar', 'chat-skype' ),
					'Asia/Manila'                      => esc_html__( 'Asia/Manila', 'chat-skype' ),
					'Asia/Muscat'                      => esc_html__( 'Asia/Muscat', 'chat-skype' ),
					'Asia/Nicosia'                     => esc_html__( 'Asia/Nicosia', 'chat-skype' ),
					'Asia/Novokuznetsk'                => esc_html__( 'Asia/Novokuznetsk', 'chat-skype' ),
					'Asia/Novosibirsk'                 => esc_html__( 'Asia/Novosibirsk', 'chat-skype' ),
					'Asia/Omsk'                        => esc_html__( 'Asia/Omsk', 'chat-skype' ),
					'Asia/Oral'                        => esc_html__( 'Asia/Oral', 'chat-skype' ),
					'Asia/Phnom_Penh'                  => esc_html__( 'Asia/Phnom_Penh', 'chat-skype' ),
					'Asia/Pontianak'                   => esc_html__( 'Asia/Pontianak', 'chat-skype' ),
					'Asia/Pyongyang'                   => esc_html__( 'Asia/Pyongyang', 'chat-skype' ),
					'Asia/Qatar'                       => esc_html__( 'Asia/Qatar', 'chat-skype' ),
					'Asia/Qyzylorda'                   => esc_html__( 'Asia/Qyzylorda', 'chat-skype' ),
					'Asia/Rangoon'                     => esc_html__( 'Asia/Rangoon', 'chat-skype' ),
					'Asia/Riyadh'                      => esc_html__( 'Asia/Riyadh', 'chat-skype' ),
					'Asia/Saigon'                      => esc_html__( 'Asia/Saigon', 'chat-skype' ),
					'Asia/Sakhalin'                    => esc_html__( 'Asia/Sakhalin', 'chat-skype' ),
					'Asia/Samarkand'                   => esc_html__( 'Asia/Samarkand', 'chat-skype' ),
					'Asia/Seoul'                       => esc_html__( 'Asia/Seoul', 'chat-skype' ),
					'Asia/Shanghai'                    => esc_html__( 'Asia/Shanghai', 'chat-skype' ),
					'Asia/Singapore'                   => esc_html__( 'Asia/Singapore', 'chat-skype' ),
					'Asia/Srednekolymsk'               => esc_html__( 'Asia/Srednekolymsk', 'chat-skype' ),
					'Asia/Taipei'                      => esc_html__( 'Asia/Taipei', 'chat-skype' ),
					'Asia/Tashkent'                    => esc_html__( 'Asia/Tashkent', 'chat-skype' ),
					'Asia/Tbilisi'                     => esc_html__( 'Asia/Tbilisi', 'chat-skype' ),
					'Asia/Tehran'                      => esc_html__( 'Asia/Tehran', 'chat-skype' ),
					'Asia/Tel_Aviv'                    => esc_html__( 'Asia/Tel_Aviv', 'chat-skype' ),
					'Asia/Thimbu'                      => esc_html__( 'Asia/Thimbu', 'chat-skype' ),
					'Asia/Thimphu'                     => esc_html__( 'Asia/Thimphu', 'chat-skype' ),
					'Asia/Tokyo'                       => esc_html__( 'Asia/Tokyo', 'chat-skype' ),
					'Asia/Tomsk'                       => esc_html__( 'Asia/Tomsk', 'chat-skype' ),
					'Asia/Ujung_Pandang'               => esc_html__( 'Asia/Ujung_Pandang', 'chat-skype' ),
					'Asia/Ulaanbaatar'                 => esc_html__( 'Asia/Ulaanbaatar', 'chat-skype' ),
					'Asia/Ulan_Bator'                  => esc_html__( 'Asia/Ulan_Bator', 'chat-skype' ),
					'Asia/Urumqi'                      => esc_html__( 'Asia/Urumqi', 'chat-skype' ),
					'Asia/Ust-Nera'                    => esc_html__( 'Asia/Ust-Nera', 'chat-skype' ),
					'Asia/Vientiane'                   => esc_html__( 'Asia/Vientiane', 'chat-skype' ),
					'Asia/Vladivostok'                 => esc_html__( 'Asia/Vladivostok', 'chat-skype' ),
					'Asia/Yakutsk'                     => esc_html__( 'Asia/Yakutsk', 'chat-skype' ),
					'Asia/Yangon'                      => esc_html__( 'Asia/Yangon', 'chat-skype' ),
					'Asia/Yekaterinburg'               => esc_html__( 'Asia/Yekaterinburg', 'chat-skype' ),
					'Asia/Yerevan'                     => esc_html__( 'Asia/Yerevan', 'chat-skype' ),
					'Atlantic/Azores'                  => esc_html__( 'Atlantic/Azores', 'chat-skype' ),
					'Atlantic/Bermuda'                 => esc_html__( 'Atlantic/Bermuda', 'chat-skype' ),
					'Atlantic/Canary'                  => esc_html__( 'Atlantic/Canary', 'chat-skype' ),
					'Atlantic/Cape_Verde'              => esc_html__( 'Atlantic/Cape_Verde', 'chat-skype' ),
					'Atlantic/Faeroe'                  => esc_html__( 'Atlantic/Faeroe', 'chat-skype' ),
					'Atlantic/Faroe'                   => esc_html__( 'Atlantic/Faroe', 'chat-skype' ),
					'Atlantic/Jan_Mayen'               => esc_html__( 'Atlantic/Jan_Mayen', 'chat-skype' ),
					'Atlantic/Madeira'                 => esc_html__( 'Atlantic/Madeira', 'chat-skype' ),
					'Atlantic/Reykjavik'               => esc_html__( 'Atlantic/Reykjavik', 'chat-skype' ),
					'Atlantic/South_Georgia'           => esc_html__( 'Atlantic/South_Georgia', 'chat-skype' ),
					'Atlantic/St_Helena'               => esc_html__( 'Atlantic/St_Helena', 'chat-skype' ),
					'Atlantic/Stanley'                 => esc_html__( 'Atlantic/Stanley', 'chat-skype' ),
					'Australia/ACT'                    => esc_html__( 'Australia/ACT', 'chat-skype' ),
					'Australia/Adelaide'               => esc_html__( 'Australia/Adelaide', 'chat-skype' ),
					'Australia/Brisbane'               => esc_html__( 'Australia/Brisbane', 'chat-skype' ),
					'Australia/Broken_Hill'            => esc_html__( 'Asia/Broken_Hill', 'chat-skype' ),
					'Australia/Canberra'               => esc_html__( 'Australia/Canberra', 'chat-skype' ),
					'Australia/Currie'                 => esc_html__( 'Australia/Currie', 'chat-skype' ),
					'Australia/Darwin'                 => esc_html__( 'Australia/Darwin', 'chat-skype' ),
					'Australia/Eucla'                  => esc_html__( 'Australia/Eucla', 'chat-skype' ),
					'Australia/Hobart'                 => esc_html__( 'Australia/Hobart', 'chat-skype' ),
					'Australia/LHI'                    => esc_html__( 'Australia/LHI', 'chat-skype' ),
					'Australia/Lindeman'               => esc_html__( 'Australia/Lindeman', 'chat-skype' ),
					'Australia/Lord_Howe'              => esc_html__( 'Australia/Lord_Howe', 'chat-skype' ),
					'Australia/Melbourne'              => esc_html__( 'Australia/Melbourne', 'chat-skype' ),
					'Australia/NSW'                    => esc_html__( 'Australia/NSW', 'chat-skype' ),
					'Australia/North'                  => esc_html__( 'Australia/North', 'chat-skype' ),
					'Australia/Perth'                  => esc_html__( 'Australia/Perth', 'chat-skype' ),
					'Australia/Queensland'             => esc_html__( 'Australia/Queensland', 'chat-skype' ),
					'Australia/South'                  => esc_html__( 'Australia/South', 'chat-skype' ),
					'Australia/Sydney'                 => esc_html__( 'Australia/Sydney', 'chat-skype' ),
					'Australia/Tasmania'               => esc_html__( 'Australia/Tasmania', 'chat-skype' ),
					'Australia/Victoria'               => esc_html__( 'Australia/Victoria', 'chat-skype' ),
					'Australia/West'                   => esc_html__( 'Australia/West', 'chat-skype' ),
					'Australia/Yancowinna'             => esc_html__( 'Australia/Yancowinna', 'chat-skype' ),
					'Brazil/Acre'                      => esc_html__( 'Brazil/Acre', 'chat-skype' ),
					'Brazil/DeNoronha'                 => esc_html__( 'Brazil/DeNoronha', 'chat-skype' ),
					'Brazil/East'                      => esc_html__( 'Brazil/East', 'chat-skype' ),
					'Brazil/West'                      => esc_html__( 'Brazil/West', 'chat-skype' ),
					'CET'                              => esc_html__( 'CET', 'chat-skype' ),
					'CST6CDT'                          => esc_html__( 'CST6CDT', 'chat-skype' ),
					'Canada/Atlantic'                  => esc_html__( 'Canada/Atlantic', 'chat-skype' ),
					'Canada/Central'                   => esc_html__( 'Canada/Central', 'chat-skype' ),
					'Canada/Eastern'                   => esc_html__( 'Canada/Eastern', 'chat-skype' ),
					'Canada/Mountain'                  => esc_html__( 'Canada/Mountain', 'chat-skype' ),
					'Canada/Newfoundland'              => esc_html__( 'Canada/Newfoundland', 'chat-skype' ),
					'Canada/Pacific'                   => esc_html__( 'Canada/Pacific', 'chat-skype' ),
					'Canada/Saskatchewan'              => esc_html__( 'Canada/Saskatchewan', 'chat-skype' ),
					'Canada/Yukon'                     => esc_html__( 'Canada/Yukon', 'chat-skype' ),
					'Chile/Continental'                => esc_html__( 'Chile/Continental', 'chat-skype' ),
					'Chile/EasterIsland'               => esc_html__( 'Chile/EasterIsland', 'chat-skype' ),
					'Cuba'                             => esc_html__( 'Cuba', 'chat-skype' ),
					'EET'                              => esc_html__( 'EET', 'chat-skype' ),
					'EST'                              => esc_html__( 'EST', 'chat-skype' ),
					'EST5EDT'                          => esc_html__( 'EST5EDT', 'chat-skype' ),
					'Egypt'                            => esc_html__( 'Egypt', 'chat-skype' ),
					'Eire'                             => esc_html__( 'Eire', 'chat-skype' ),
					'Etc/GMT'                          => esc_html__( 'Etc/GMT', 'chat-skype' ),
					'Etc/GMT+0'                        => esc_html__( 'Etc/GMT+0', 'chat-skype' ),
					'Etc/GMT+1'                        => esc_html__( 'Etc/GMT+1', 'chat-skype' ),
					'Etc/GMT+10'                       => esc_html__( 'Etc/GMT+10', 'chat-skype' ),
					'Etc/GMT+11'                       => esc_html__( 'Etc/GMT+11', 'chat-skype' ),
					'Etc/GMT+12'                       => esc_html__( 'Etc/GMT+12', 'chat-skype' ),
					'Etc/GMT+2'                        => esc_html__( 'Etc/GMT+2', 'chat-skype' ),
					'Etc/GMT+3'                        => esc_html__( 'Etc/GMT+3', 'chat-skype' ),
					'Etc/GMT+4'                        => esc_html__( 'Etc/GMT+4', 'chat-skype' ),
					'Etc/GMT+5'                        => esc_html__( 'Etc/GMT+5', 'chat-skype' ),
					'Etc/GMT+6'                        => esc_html__( 'Etc/GMT+6', 'chat-skype' ),
					'Etc/GMT+7'                        => esc_html__( 'Etc/GMT+7', 'chat-skype' ),
					'Etc/GMT+8'                        => esc_html__( 'Etc/GMT+8', 'chat-skype' ),
					'Etc/GMT+9'                        => esc_html__( 'Etc/GMT+9', 'chat-skype' ),
					'Etc/GMT-0'                        => esc_html__( 'Etc/GMT-0', 'chat-skype' ),
					'Etc/GMT-1'                        => esc_html__( 'Etc/GMT-1', 'chat-skype' ),
					'Etc/GMT-10'                       => esc_html__( 'Etc/GMT-10', 'chat-skype' ),
					'Etc/GMT-11'                       => esc_html__( 'Etc/GMT-11', 'chat-skype' ),
					'Etc/GMT-12'                       => esc_html__( 'Etc/GMT-12', 'chat-skype' ),
					'Etc/GMT-13'                       => esc_html__( 'Etc/GMT-13', 'chat-skype' ),
					'Etc/GMT-14'                       => esc_html__( 'Etc/GMT-14', 'chat-skype' ),
					'Etc/GMT-2'                        => esc_html__( 'Etc/GMT-2', 'chat-skype' ),
					'Etc/GMT-3'                        => esc_html__( 'Etc/GMT-3', 'chat-skype' ),
					'Etc/GMT-4'                        => esc_html__( 'Etc/GMT-4', 'chat-skype' ),
					'Etc/GMT-5'                        => esc_html__( 'Etc/GMT-5', 'chat-skype' ),
					'Etc/GMT-6'                        => esc_html__( 'Etc/GMT-6', 'chat-skype' ),
					'Etc/GMT-7'                        => esc_html__( 'Etc/GMT-7', 'chat-skype' ),
					'Etc/GMT-8'                        => esc_html__( 'Etc/GMT-8', 'chat-skype' ),
					'Etc/GMT-9'                        => esc_html__( 'Etc/GMT-9', 'chat-skype' ),
					'Etc/GMT0'                         => esc_html__( 'Etc/GMT0', 'chat-skype' ),
					'Etc/Greenwich'                    => esc_html__( 'Etc/Greenwich', 'chat-skype' ),
					'Etc/UCT'                          => esc_html__( 'Etc/UCT', 'chat-skype' ),
					'Etc/UTC'                          => esc_html__( 'Etc/UTC', 'chat-skype' ),
					'Etc/Universal'                    => esc_html__( 'Etc/Universal', 'chat-skype' ),
					'Etc/Zulu'                         => esc_html__( 'Etc/Zulu', 'chat-skype' ),
					'Europe/Amsterdam'                 => esc_html__( 'Europe/Amsterdam', 'chat-skype' ),
					'Europe/Andorra'                   => esc_html__( 'Europe/Andorra', 'chat-skype' ),
					'Europe/Astrakhan'                 => esc_html__( 'Europe/Astrakhan', 'chat-skype' ),
					'Europe/Athens'                    => esc_html__( 'Europe/Athens', 'chat-skype' ),
					'Europe/Belfast'                   => esc_html__( 'Europe/Belfast', 'chat-skype' ),
					'Europe/Belgrade'                  => esc_html__( 'Europe/Belgrade', 'chat-skype' ),
					'Europe/Berlin'                    => esc_html__( 'Europe/Berlin', 'chat-skype' ),
					'Europe/Bratislava'                => esc_html__( 'Europe/Bratislava', 'chat-skype' ),
					'Europe/Brussels'                  => esc_html__( 'Europe/Brussels', 'chat-skype' ),
					'Europe/Bucharest'                 => esc_html__( 'Europe/Bucharest', 'chat-skype' ),
					'Europe/Budapest'                  => esc_html__( 'Europe/Budapest', 'chat-skype' ),
					'Europe/Busingen'                  => esc_html__( 'Europe/Busingen', 'chat-skype' ),
					'Europe/Chisinau'                  => esc_html__( 'Europe/Chisinau', 'chat-skype' ),
					'Europe/Copenhagen'                => esc_html__( 'Europe/Copenhagen', 'chat-skype' ),
					'Europe/Dublin'                    => esc_html__( 'Europe/Dublin', 'chat-skype' ),
					'Europe/Gibraltar'                 => esc_html__( 'Europe/Gibraltar', 'chat-skype' ),
					'Europe/Guernsey'                  => esc_html__( 'Europe/Guernsey', 'chat-skype' ),
					'Europe/Helsinki'                  => esc_html__( 'Europe/Helsinki', 'chat-skype' ),
					'Europe/Isle_of_Man'               => esc_html__( 'Europe/Isle_of_Man', 'chat-skype' ),
					'Europe/Istanbul'                  => esc_html__( 'Europe/Istanbul', 'chat-skype' ),
					'Europe/Jersey'                    => esc_html__( 'Europe/Jersey', 'chat-skype' ),
					'Europe/Kaliningrad'               => esc_html__( 'Europe/Kaliningrad', 'chat-skype' ),
					'Europe/Kiev'                      => esc_html__( 'Europe/Kiev', 'chat-skype' ),
					'Europe/Kirov'                     => esc_html__( 'Europe/Kirov', 'chat-skype' ),
					'Europe/Lisbon'                    => esc_html__( 'Europe/Lisbon', 'chat-skype' ),
					'Europe/Ljubljana'                 => esc_html__( 'Europe/Ljubljana', 'chat-skype' ),
					'Europe/London'                    => esc_html__( 'Europe/London', 'chat-skype' ),
					'Europe/Luxembourg'                => esc_html__( 'Europe/Luxembourg', 'chat-skype' ),
					'Europe/Madrid'                    => esc_html__( 'Europe/Madrid', 'chat-skype' ),
					'Europe/Malta'                     => esc_html__( 'Europe/Malta', 'chat-skype' ),
					'Europe/Mariehamn'                 => esc_html__( 'Europe/Mariehamn', 'chat-skype' ),
					'Europe/Minsk'                     => esc_html__( 'Europe/Minsk', 'chat-skype' ),
					'Europe/Monaco'                    => esc_html__( 'Europe/Monaco', 'chat-skype' ),
					'Europe/Moscow'                    => esc_html__( 'Europe/Moscow', 'chat-skype' ),
					'Europe/Nicosia'                   => esc_html__( 'Europe/Nicosia', 'chat-skype' ),
					'Europe/Oslo'                      => esc_html__( 'Europe/Oslo', 'chat-skype' ),
					'Europe/Paris'                     => esc_html__( 'Europe/Paris', 'chat-skype' ),
					'Europe/Podgorica'                 => esc_html__( 'Europe/Podgorica', 'chat-skype' ),
					'Europe/Prague'                    => esc_html__( 'Europe/Prague', 'chat-skype' ),
					'Europe/Riga'                      => esc_html__( 'Europe/Riga', 'chat-skype' ),
					'Europe/Rome'                      => esc_html__( 'Europe/Rome', 'chat-skype' ),
					'Europe/Samara'                    => esc_html__( 'Europe/Samara', 'chat-skype' ),
					'Europe/San_Marino'                => esc_html__( 'Europe/San_Marino', 'chat-skype' ),
					'Europe/Sarajevo'                  => esc_html__( 'Europe/Sarajevo', 'chat-skype' ),
					'Europe/Saratov'                   => esc_html__( 'Europe/Saratov', 'chat-skype' ),
					'Europe/Simferopol'                => esc_html__( 'Europe/Simferopol', 'chat-skype' ),
					'Europe/Skopje'                    => esc_html__( 'Europe/Skopje', 'chat-skype' ),
					'Europe/Sofia'                     => esc_html__( 'Europe/Sofia', 'chat-skype' ),
					'Europe/Stockholm'                 => esc_html__( 'Europe/Stockholm', 'chat-skype' ),
					'Europe/Tallinn'                   => esc_html__( 'Europe/Tallinn', 'chat-skype' ),
					'Europe/Tirane'                    => esc_html__( 'Europe/Tirane', 'chat-skype' ),
					'Europe/Tiraspol'                  => esc_html__( 'Europe/Tiraspol', 'chat-skype' ),
					'Europe/Ulyanovsk'                 => esc_html__( 'Europe/Ulyanovsk', 'chat-skype' ),
					'Europe/Uzhgorod'                  => esc_html__( 'Europe/Uzhgorod', 'chat-skype' ),
					'Europe/Vaduz'                     => esc_html__( 'Europe/Vaduz', 'chat-skype' ),
					'Europe/Vatican'                   => esc_html__( 'Europe/Vatican', 'chat-skype' ),
					'Europe/Vienna'                    => esc_html__( 'Europe/Vienna', 'chat-skype' ),
					'Europe/Vilnius'                   => esc_html__( 'Europe/Vilnius', 'chat-skype' ),
					'Europe/Volgograd'                 => esc_html__( 'Europe/Volgograd', 'chat-skype' ),
					'Europe/Warsaw'                    => esc_html__( 'Europe/Warsaw', 'chat-skype' ),
					'Europe/Zagreb'                    => esc_html__( 'Europe/Zagreb', 'chat-skype' ),
					'Europe/Zaporozhye'                => esc_html__( 'Europe/Zaporozhye', 'chat-skype' ),
					'Europe/Zurich'                    => esc_html__( 'Europe/Zurich', 'chat-skype' ),
					'GB'                               => esc_html__( 'GB', 'chat-skype' ),
					'GB-Eire'                          => esc_html__( 'GB-Eire', 'chat-skype' ),
					'GMT'                              => esc_html__( 'GMT', 'chat-skype' ),
					'GMT+0'                            => esc_html__( 'GMT+0', 'chat-skype' ),
					'GMT-0'                            => esc_html__( 'GMT-0', 'chat-skype' ),
					'GMT0'                             => esc_html__( 'GMT0', 'chat-skype' ),
					'Greenwich'                        => esc_html__( 'Greenwich', 'chat-skype' ),
					'HST'                              => esc_html__( 'HST', 'chat-skype' ),
					'Hongkong'                         => esc_html__( 'Hongkong', 'chat-skype' ),
					'Iceland'                          => esc_html__( 'Iceland', 'chat-skype' ),
					'Indian/Antananarivo'              => esc_html__( 'Indian/Antananarivo', 'chat-skype' ),
					'Indian/Chagos'                    => esc_html__( 'Indian/Chagos', 'chat-skype' ),
					'Indian/Christmas'                 => esc_html__( 'Indian/Christmas', 'chat-skype' ),
					'Indian/Cocos'                     => esc_html__( 'Indian/Cocos', 'chat-skype' ),
					'Indian/Comoro'                    => esc_html__( 'Indian/Comoro', 'chat-skype' ),
					'Indian/Kerguelen'                 => esc_html__( 'Indian/Kerguelen', 'chat-skype' ),
					'Indian/Mahe'                      => esc_html__( 'Indian/Mahe', 'chat-skype' ),
					'Indian/Maldives'                  => esc_html__( 'Indian/Maldives', 'chat-skype' ),
					'Indian/Mauritius'                 => esc_html__( 'Indian/Mauritius', 'chat-skype' ),
					'Indian/Mayotte'                   => esc_html__( 'Indian/Mayotte', 'chat-skype' ),
					'Indian/Reunion'                   => esc_html__( 'Indian/Reunion', 'chat-skype' ),
					'Iran'                             => esc_html__( 'Iran', 'chat-skype' ),
					'Israel'                           => esc_html__( 'Israel', 'chat-skype' ),
					'Jamaica'                          => esc_html__( 'Jamaica', 'chat-skype' ),
					'Japan'                            => esc_html__( 'Japan', 'chat-skype' ),
					'Kwajalein'                        => esc_html__( 'Kwajalein', 'chat-skype' ),
					'Libya'                            => esc_html__( 'Libya', 'chat-skype' ),
					'MET'                              => esc_html__( 'MET', 'chat-skype' ),
					'MST'                              => esc_html__( 'MST', 'chat-skype' ),
					'MST7MDT'                          => esc_html__( 'MST7MDT', 'chat-skype' ),
					'Mexico/BajaNorte'                 => esc_html__( 'Mexico/BajaNorte', 'chat-skype' ),
					'Mexico/BajaSur'                   => esc_html__( 'Mexico/BajaSur', 'chat-skype' ),
					'Mexico/General'                   => esc_html__( 'Mexico/General', 'chat-skype' ),
					'NZ'                               => esc_html__( 'NZ', 'chat-skype' ),
					'NZ-CHAT'                          => esc_html__( 'NZ-CHAT', 'chat-skype' ),
					'Navajo'                           => esc_html__( 'Navajo', 'chat-skype' ),
					'PRC'                              => esc_html__( 'PRC', 'chat-skype' ),
					'PST8PDT'                          => esc_html__( 'PST8PDT', 'chat-skype' ),
					'Pacific/Apia'                     => esc_html__( 'Pacific/Apia', 'chat-skype' ),
					'Pacific/Auckland'                 => esc_html__( 'Pacific/Auckland', 'chat-skype' ),
					'Pacific/Bougainville'             => esc_html__( 'Pacific/Bougainville', 'chat-skype' ),
					'Pacific/Chatham'                  => esc_html__( 'Pacific/Chatham', 'chat-skype' ),
					'Pacific/Chuuk'                    => esc_html__( 'Pacific/Chuuk', 'chat-skype' ),
					'Pacific/Easter'                   => esc_html__( 'Pacific/Easter', 'chat-skype' ),
					'Pacific/Efate'                    => esc_html__( 'Pacific/Efate', 'chat-skype' ),
					'Pacific/Enderbury'                => esc_html__( 'Pacific/Enderbury', 'chat-skype' ),
					'Pacific/Fakaofo'                  => esc_html__( 'Pacific/Fakaofo', 'chat-skype' ),
					'Pacific/Fiji'                     => esc_html__( 'Pacific/Fiji', 'chat-skype' ),
					'Pacific/Funafuti'                 => esc_html__( 'Pacific/Funafuti', 'chat-skype' ),
					'Pacific/Galapagos'                => esc_html__( 'Pacific/Galapagos', 'chat-skype' ),
					'Pacific/Gambier'                  => esc_html__( 'Pacific/Gambier', 'chat-skype' ),
					'Pacific/Guadalcanal'              => esc_html__( 'Pacific/Guadalcanal', 'chat-skype' ),
					'Pacific/Guam'                     => esc_html__( 'Pacific/Guam', 'chat-skype' ),
					'Pacific/Honolulu'                 => esc_html__( 'Pacific/Honolulu', 'chat-skype' ),
					'Pacific/Johnston'                 => esc_html__( 'Pacific/Johnston', 'chat-skype' ),
					'Pacific/Kiritimati'               => esc_html__( 'Pacific/Kiritimati', 'chat-skype' ),
					'Pacific/Kosrae'                   => esc_html__( 'Pacific/Kosrae', 'chat-skype' ),
					'Pacific/Kwajalein'                => esc_html__( 'Pacific/Kwajalein', 'chat-skype' ),
					'Pacific/Majuro'                   => esc_html__( 'Pacific/Majuro', 'chat-skype' ),
					'Pacific/Marquesas'                => esc_html__( 'Pacific/Marquesas', 'chat-skype' ),
					'Pacific/Midway'                   => esc_html__( 'Pacific/Midway', 'chat-skype' ),
					'Pacific/Nauru'                    => esc_html__( 'Pacific/Nauru', 'chat-skype' ),
					'Pacific/Niue'                     => esc_html__( 'Pacific/Niue', 'chat-skype' ),
					'Pacific/Norfolk'                  => esc_html__( 'Pacific/Norfolk', 'chat-skype' ),
					'Pacific/Noumea'                   => esc_html__( 'Pacific/Noumea', 'chat-skype' ),
					'Pacific/Pago_Pago'                => esc_html__( 'Pacific/Pago_Pago', 'chat-skype' ),
					'Pacific/Palau'                    => esc_html__( 'Pacific/Palau', 'chat-skype' ),
					'Pacific/Pitcairn'                 => esc_html__( 'Pacific/Pitcairn', 'chat-skype' ),
					'Pacific/Pohnpei'                  => esc_html__( 'Pacific/Pohnpei', 'chat-skype' ),
					'Pacific/Ponape'                   => esc_html__( 'Pacific/Ponape', 'chat-skype' ),
					'Pacific/Port_Moresby'             => esc_html__( 'Pacific/Port_Moresby', 'chat-skype' ),
					'Pacific/Rarotonga'                => esc_html__( 'Pacific/Rarotonga', 'chat-skype' ),
					'Pacific/Saipan'                   => esc_html__( 'Pacific/Saipan', 'chat-skype' ),
					'Pacific/Samoa'                    => esc_html__( 'Pacific/Samoa', 'chat-skype' ),
					'Pacific/Tahiti'                   => esc_html__( 'Pacific/Tahiti', 'chat-skype' ),
					'Pacific/Tarawa'                   => esc_html__( 'Pacific/Tarawa', 'chat-skype' ),
					'Pacific/Tongatapu'                => esc_html__( 'Pacific/Tongatapu', 'chat-skype' ),
					'Pacific/Truk'                     => esc_html__( 'Pacific/Truk', 'chat-skype' ),
					'Pacific/Wake'                     => esc_html__( 'Pacific/Wake', 'chat-skype' ),
					'Pacific/Wallis'                   => esc_html__( 'Pacific/Wallis', 'chat-skype' ),
					'Pacific/Yap'                      => esc_html__( 'Pacific/Yap', 'chat-skype' ),
					'Poland'                           => esc_html__( 'Poland', 'chat-skype' ),
					'Portugal'                         => esc_html__( 'Portugal', 'chat-skype' ),
					'ROC'                              => esc_html__( 'ROC', 'chat-skype' ),
					'ROK'                              => esc_html__( 'ROK', 'chat-skype' ),
					'Singapore'                        => esc_html__( 'Singapore', 'chat-skype' ),
					'Turkey'                           => esc_html__( 'Turkey', 'chat-skype' ),
					'UCT'                              => esc_html__( 'UCT', 'chat-skype' ),
					'US/Alaska'                        => esc_html__( 'US/Alaska', 'chat-skype' ),
					'US/Aleutian'                      => esc_html__( 'US/Aleutian', 'chat-skype' ),
					'US/Arizona'                       => esc_html__( 'US/Arizona', 'chat-skype' ),
					'US/Central'                       => esc_html__( 'US/Central', 'chat-skype' ),
					'US/East-Indiana'                  => esc_html__( 'US/East-Indiana', 'chat-skype' ),
					'US/Eastern'                       => esc_html__( 'US/Eastern', 'chat-skype' ),
					'US/Hawaii'                        => esc_html__( 'US/Hawaii', 'chat-skype' ),
					'US/Indiana-Starke'                => esc_html__( 'US/Indiana-Starke', 'chat-skype' ),
					'US/Michigan'                      => esc_html__( 'US/Michigan', 'chat-skype' ),
					'US/Mountain'                      => esc_html__( 'US/Mountain', 'chat-skype' ),
					'US/Pacific'                       => esc_html__( 'US/Pacific', 'chat-skype' ),
					'US/Pacific-New'                   => esc_html__( 'US/Pacific-New', 'chat-skype' ),
					'US/Samoa'                         => esc_html__( 'US/Samoa', 'chat-skype' ),
					'UTC'                              => esc_html__( 'UTC', 'chat-skype' ),
					'Universal'                        => esc_html__( 'Universal', 'chat-skype' ),
					'W-SU'                             => esc_html__( 'W-SU', 'chat-skype' ),
					'WET'                              => esc_html__( 'WET', 'chat-skype' ),
				),
			)
		);

		// start sunday popover.
		$this->add_control(
			'popover-sunday',
			array(
				'label' => esc_html__( 'Sunday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'sunday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-sunday' => 'yes',
				),
			)
		);

		$this->add_control(
			'sunday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-sunday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end sunday popover.

		// start monday popover.
		$this->add_control(
			'popover-monday',
			array(
				'label' => esc_html__( 'Monday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'monday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-monday' => 'yes',
				),
			)
		);

		$this->add_control(
			'monday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-monday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end monday popover.

		// start tuesday popover.
		$this->add_control(
			'popover-tuesday',
			array(
				'label' => esc_html__( 'Tuesday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'tuesday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-tuesday' => 'yes',
				),
			)
		);

		$this->add_control(
			'tuesday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-tuesday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end tuesday popover.

		// start wednesday popover.
		$this->add_control(
			'popover-wednesday',
			array(
				'label' => esc_html__( 'Wednesday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'wednesday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-wednesday' => 'yes',
				),
			)
		);

		$this->add_control(
			'wednesday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-wednesday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end wednesday popover.

		// start sunday popover.
		$this->add_control(
			'popover-thursday',
			array(
				'label' => esc_html__( 'Thursday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'thursday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-thursday' => 'yes',
				),
			)
		);

		$this->add_control(
			'thursday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-thursday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end thursday popover.

		// start sunday popover.
		$this->add_control(
			'popover-friday',
			array(
				'label' => esc_html__( 'Friday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'friday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-friday' => 'yes',
				),
			)
		);

		$this->add_control(
			'friday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-friday' => 'yes',
				),
			)
		);

		$this->end_popover();
		// end friday popover.

		$this->add_control(
			'popover-saturday',
			array(
				'label' => esc_html__( 'Saturday', 'chat-skype' ),
				'type'  => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			)
		);

		$this->start_popover();
		$this->add_control(
			'saturday__start',
			array(
				'label'       => esc_html__( 'Start time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '00:00',
				'condition'   => array(
					'popover-saturday' => 'yes',
				),
			)
		);

		$this->add_control(
			'saturday__end',
			array(
				'label'       => esc_html__( 'End time', 'chat-skype' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false,
				'default'     => '23:59',
				'condition'   => array(
					'popover-saturday' => 'yes',
				),
			)
		);
		$this->end_popover();

		$this->end_controls_section(); // End section top content.

		$this->start_controls_section(
			'scs__appearance',
			array(
				'label' => esc_html__( 'Appearance settings', 'chat-skype' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'visibility',
			array(
				'label'       => esc_html__( 'Visibility on', 'chat-skype' ),
				'type'        => Controls_Manager::SELECT2,
				'label_block' => false,
				'default'     => 'skySupport-show-everywhere',
				'options'     => array(
					'skySupport-show-everywhere'    => esc_html__( 'Everywhere', 'chat-skype' ),
					'skySupport-desktop-only'       => esc_html__( 'Desktops only', 'chat-skype' ),
					'skySupport-tablet-only'        => esc_html__( 'Tablets only', 'chat-skype' ),
					'skySupport-mobile-tablet-only' => esc_html__( 'Mobile and tablets', 'chat-skype' ),
					'skySupport-mobile-only'        => esc_html__( 'Mobile only', 'chat-skype' ),
				),

			)
		);

		$this->add_control(
			'button__sizes',
			array(
				'label'       => esc_html__( 'Size', 'chat-skype' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'default'     => 'skySupport-btn-md',
				'options'     => array(
					'skySupport-btn-sm' => esc_html__( 'Small', 'chat-skype' ),
					'skySupport-btn-md' => esc_html__( 'Medium', 'chat-skype' ),
					'skySupport-btn-lg' => esc_html__( 'Large', 'chat-skype' ),
				),
			)
		);

		$this->add_control(
			'bg__color',
			array(
				'label'     => esc_html__( 'Backgound color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0088cc',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'bg__color__hover',
			array(
				'label'     => esc_html__( 'Hover backgound color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0278b3',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg:hover' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'text__color',
			array(
				'label'     => esc_html__( 'Text color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'text__color__hover',
			array(
				'label'     => esc_html__( 'Hover text color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'           => 'border',
				'label'          => esc_html__( 'Border', 'chat-skype' ),
				'selector'       => '{{WRAPPER}} .skySupportButtons, {{WRAPPER}} .skySupport-button-2',
				'fields_options' => array(
					'border' => array(
						'label'   => esc_html__( 'Border', 'chat-skype' ),
						'default' => 'solid',
					),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => '#0088cc',
					),
				),
			)
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name'           => 'border__hover',
				'label'          => esc_html__( 'Hover border', 'chat-skype' ),
				'default'        => '#0278b3',
				'selector'       => '{{WRAPPER}} .skySupportButtons:hover, {{WRAPPER}} .skySupport-button-2:hover',
				'fields_options' => array(
					'border' => array(
						'label'   => esc_html__( 'Hover border', 'chat-skype' ),
						'default' => 'solid',
					),
					'width'  => array(
						'default' => array(
							'top'      => '1',
							'right'    => '1',
							'bottom'   => '1',
							'left'     => '1',
							'isLinked' => false,
						),
					),
					'color'  => array(
						'default' => '#0278b3',
					),
				),
			)
		);

		$this->add_control(
			'button__icon',
			array(
				'label'       => esc_html__( 'Change icon', 'chat-skype' ),
				'type'        => \Elementor\Controls_Manager::ICONS,
				'default'     => array(
					'value' => 'fas fa-phone-alt',
				),
				'condition'   => array(
					'style' => '2',
				),
				'recommended' => array(
					'fa-solid'   => array(
						'envelope',
						'envelope-open',
						'facebook-messenger',
					),
					'fa-regular' => array(
						'envelope',
						'envelope-open',
					),

				),
			)
		);

		$this->add_control(
			'icon__color',
			array(
				'label'     => esc_html__( 'Icon color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0088cc',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style' => '2',
				),
			)
		);

		$this->add_control(
			'icon__color__hover',
			array(
				'label'     => esc_html__( 'Icon hover color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#0278b3',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-btn-bg:hover i' => 'color: {{VALUE}}',
				),
				'condition' => array(
					'style' => '2',
				),
			)
		);

		$this->add_control(
			'show__icon__bg__color',
			array(
				'label'        => esc_html__( 'Want bg in icon?', 'chat-skype' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'chat-skype' ),
				'label_off'    => esc_html__( 'No', 'chat-skype' ),
				'return_value' => 'skySupport-button-3',
				'condition'    => array(
					'style' => '2',
				),
			)
		);

		$this->add_control(
			'icon__bg__color',
			array(
				'label'     => esc_html__( 'Icon bg color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-button-3.skySupport-btn-bg i' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'style'                 => '2',
					'show__icon__bg__color' => 'skySupport-button-3',
				),
			)
		);

		$this->add_control(
			'icon__bg__color__hover',
			array(
				'label'     => esc_html__( 'Icon hover bg color', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => array(
					'{{WRAPPER}} [class*="skySupport-button-"].skySupport-button-3.skySupport-btn-bg:hover i' => 'background-color: {{VALUE}}',
				),
				'condition' => array(
					'style'                 => '2',
					'show__icon__bg__color' => 'skySupport-button-3',
				),
			)
		);

		$this->add_control(
			'rounded',
			array(
				'label'        => esc_html__( 'Rounded?', 'chat-skype' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'chat-skype' ),
				'label_off'    => esc_html__( 'No', 'chat-skype' ),
				'return_value' => 'skySupport-btn-rounded',
			)
		);

		$this->add_control(
			'text_align',
			array(
				'label'     => esc_html__( 'Alignment', 'chat-skype' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'chat-skype' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'chat-skype' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => esc_html__( 'Right', 'chat-skype' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'left',
				'toggle'    => true,
				'selectors' => array(
					'{{WRAPPER}} .button-wrapper' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->end_controls_section(); // End section top content.
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		// button settings.
		$style        = $settings['style'];
		$skypeid      = $settings['skypeid'];
		$timezone     = $settings['timezone'];
		$visibility   = $settings['visibility'];
		$icon         = $settings['button__icon']['value'];
		$rounded      = $settings['rounded'];
		$icon__bg     = $settings['show__icon__bg__color'];
		$sizes        = $settings['button__sizes'];
		$photo        = $settings['agent__photo']['url'];
		$name         = $settings['agent__name'];
		$designation  = $settings['agent__designation'];
		$label_text   = $settings['custom__button__label'];
		$online_text  = $settings['online__text'];
		$offline_text = $settings['offline__text'];
		// availablity.
		$sunday           = ( $settings['sunday__start'] ? $settings['sunday__start'] : '0:00' ) . '-' . ( $settings['sunday__end'] ? $settings['sunday__end'] : '23:59' );
		$monday           = ( $settings['monday__start'] ? $settings['monday__start'] : '0:00' ) . '-' . ( $settings['monday__end'] ? $settings['monday__end'] : '23:59' );
		$tuesday          = ( $settings['tuesday__start'] ? $settings['tuesday__start'] : '0:00' ) . '-' . ( $settings['tuesday__end'] ? $settings['tuesday__end'] : '23:59' );
		$wednesday        = ( $settings['wednesday__start'] ? $settings['wednesday__start'] : '0:00' ) . '-' . ( $settings['wednesday__end'] ? $settings['wednesday__end'] : '23:59' );
		$thursday         = ( $settings['thursday__start'] ? $settings['thursday__start'] : '0:00' ) . '-' . ( $settings['thursday__end'] ? $settings['thursday__end'] : '23:59' );
		$friday           = ( $settings['friday__start'] ? $settings['friday__start'] : '0:00' ) . '-' . ( $settings['friday__end'] ? $settings['friday__end'] : '23:59' );
		$saturday         = ( $settings['saturday__start'] ? $settings['saturday__start'] : '0:00' ) . '-' . ( $settings['saturday__end'] ? $settings['saturday__end'] : '23:59' );
		$sky_support_icon = $icon ? $icon : 'fas fa-phone-alt';
		?>
		<?php if ( $style === '1' ) : ?>
			<div class="button-wrapper">
				<button 
				<?php
				if ( $timezone ) {
					?>
					data-timezone="<?php esc_attr( $timezone ); ?>" <?php } ?> class="skySupportButtons skySupport-button-4 sp-btn-bg <?php echo esc_attr( $visibility ); ?> <?php echo esc_attr( $rounded ); ?> avatar-active <?php echo esc_attr( $sizes ); ?>" data-btnavailablety='{ "sunday":"<?php echo esc_attr( $sunday ); ?>", "monday":"<?php echo esc_attr( $monday ); ?>", "tuesday":"<?php echo esc_attr( $tuesday ); ?>", "wednesday":"<?php echo esc_attr( $wednesday ); ?>", "thursday":"<?php echo esc_attr( $thursday ); ?>", "friday":"<?php echo esc_attr( $friday ); ?>", "saturday":"<?php echo esc_attr( $saturday ); ?>" }'>
					<?php if ( $photo ) { ?>
						<img src="<?php echo esc_attr( $photo ); ?>" />
					<?php } ?>
					<div class="info-wrapper">
						<?php if ( $name || $designation ) { ?>
							<p class="info">
							<?php
							if ( $name ) {
								?>
								<?php echo esc_html( $name ); ?><?php } ?> <?php
								if ( $designation ) {
									?>
								/ <?php echo esc_html( $designation ); ?><?php } ?></p>
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
					<a href="skype:<?php echo esc_url( $skypeid ); ?>?chat" target="_blank"></a>
				</button>
			</div>
		<?php else : ?>
			<div class="button-wrapper">
				<a href="skype:<?php echo esc_url( $skypeid ); ?>?chat" class="skySupport-button-2 <?php echo esc_attr( $icon__bg ); ?> skySupport-btn-bg <?php echo esc_attr( $visibility ); ?> <?php echo esc_attr( $rounded ); ?> <?php echo esc_attr( $sizes ); ?>">
					<i class="<?php echo esc_attr( $sky_support_icon ); ?>"></i> 
					<?php if ( $label_text ) { ?>
						<span><?php echo esc_html( $label_text ); ?></span>
					<?php } ?>
				</a>
			</div>
		<?php endif; ?>
		<?php
	}
}
