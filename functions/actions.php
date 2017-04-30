<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'cs_get_icons' ) ) {
  function cs_get_icons() {

    do_action( 'cs_add_icons_before' );

    //$jsons = glob( CS_DIR . '/fields/icon/*.json' );

    require_once CS_DIR . '/fields/icon/icons/icons.class.php';
    $CSFramework_Icons = CSFramework_Icons::instance(CS_ICONS_PREFIX);
    echo '<div class="cs-icons-wrapper">';

    if( isset($jsons) && ! empty( $jsons ) ) {
      $CSFramework_Icons->set_jsons($jsons);

      foreach ( $jsons as $path ) {

        $object = cs_get_icon_fonts( 'fields/icon/'. basename( $path ) );

        if( is_object( $object ) ) {

          $CSFramework_Icons->get_the_object($object);

        } else {
          echo '<h4 class="cs-icon-title">'. __( 'Error! Can not load json file.', 'cs-framework' ) .'</h4>';
        }

      }

    }

    $CSFramework_Icons->get_icons();

    echo "</div>";

    do_action( 'cs_add_icons' );
    do_action( 'cs_add_icons_after' );

    die();
  }
  add_action( 'wp_ajax_cs-get-icons', 'cs_get_icons' );
}

/**
 *
 * Export options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'cs_export_options' ) ) {
  function cs_export_options() {

    header('Content-Type: plain/text');
    header('Content-disposition: attachment; filename=backup-options-'. gmdate( 'd-m-Y' ) .'.txt');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo cs_encode_string( get_option( CS_OPTION ) );

    die();
  }
  add_action( 'wp_ajax_cs-export-options', 'cs_export_options' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'cs_set_icons' ) ) {
  function cs_set_icons() {

    echo '<div id="cs-icon-dialog" class="cs-dialog" title="'. __( 'Add Icon', 'cs-framework' ) .'">';
    echo '<div class="cs-dialog-header cs-text-center"><input type="text" placeholder="'. __( 'Search a Icon...', 'cs-framework' ) .'" class="cs-icon-search" /></div>';
    echo '<div class="cs-dialog-load"><div class="cs-icon-loading">'. __( 'Loading...', 'cs-framework' ) .'</div></div>';
    echo '</div>';

  }
  add_action( 'admin_footer', 'cs_set_icons' );
  add_action( 'customize_controls_print_footer_scripts', 'cs_set_icons' );
}
