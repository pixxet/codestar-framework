<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Password
 *
 * @since 1.0
 * @version 1.0
 *
 */
class CSFramework_Option_button_set extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();

    echo '<input type="hidden" name="'. $this->element_name() .'" value="'. $this->element_value() .'"'. $this->element_class() . $this->element_attributes() .'/>';

    ?>

    <div class="button-group" role="group">
    	<?php foreach ($this->field['options'] as $key => $option): ?>
    		<?php if (($this->element_value() === '' && $this->field['default'] == $key) || $this->element_value() == $key) { $active = true; } else { $active = false; } ?>

    		<button data-value="<?php echo $key; ?>" type="button" class="button <?php if ($active === true): ?>button-primary<?php else: ?>button-default<?php endif; ?>"><?php echo $option; ?></button>
	    <?php endforeach; ?>
    </div>

    <?php

    echo $this->element_after();

  }

}