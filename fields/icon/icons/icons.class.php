<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages

class CSFramework_Icons {

	private $icons = array();
	private $icon_files;

	private $jsons;

	/**
	 *
	 * instance
	 * @access private
	 * @var class
	 *
	 */
	private static $instance = null;

 	public function __construct($prefix) {
 		$this->prefix = $prefix;

 		$this->icon_files = glob( CS_DIR . '/fields/icon/icons/icons.arr.*.php' );


 	}

 	// instance
 	public static function instance( $prefix = 'fa' ) {
 		if ( is_null( self::$instance ) && CS_ACTIVE_FRAMEWORK ) {
 			self::$instance = new self( $prefix );
 		}
 		return self::$instance;
 	}

	private function array_delete($array, $element) {
	    return (is_array($element)) ? array_values(array_diff($array, $element)) : array_values(array_diff($array, array($element)));
	}

	public function set_jsons($jsons) {
		$this->jsons = $jsons;
	}

	public function get_icons() {
		foreach ($this->icon_files as $filename) {
			$icons = false;

			require_once $filename;

			if (is_object($icons)) {
				$this->get_the_object($icons);
			} else {
        		echo '<h4 class="cs-icon-title">'. __( 'Error! Can not load json file.', 'cs-framework' ) .'</h4>';
        	}
		}
	}

	public function get_the_object($object) {

		echo ( count( $this->jsons ) + count($this->icon_files) >= 2 ) ? '<h4 class="cs-icon-title">'. $object->name .'</h4>' : '';

		foreach ( $object->icons as $icon ) {
		  echo '<a class="cs-icon-tooltip" data-icon="'. $icon .'" data-title="'. $icon .'"><span class="cs-icon cs-selector"><i class="'. $icon .'"></i></span></a>';
		}
	}

}