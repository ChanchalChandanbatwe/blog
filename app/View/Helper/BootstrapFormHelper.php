<?php
/**
 * Form helper
 *
 * BootstrapFormHelper
 * Override the method to add class
 *
 * @package       BootstrapFormHelper.View.Helper
 */
class BootstrapFormHelper extends FormHelper {

  /**
   * Method override to add class in error class
   * @param array  $options 
   * @param [type] $class   class name
   * @param string $key     
   */
  public function addClass($options = array(), $class = null, $key = 'class') {
      if ($class === 'error') {
          $class .= ' has-error';
      }
      return parent::addClass($options, $class, $key);
  }// end addClass()

}// end BootstrapFormHelper