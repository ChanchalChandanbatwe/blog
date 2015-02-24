<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	

	public function permissionAccess($userId) {
		if($userId != $this->Auth->user('id')) {
      throw new ForbiddenException("Method Not Allowed!");
    }
	}


	/**
	 * Property used to store array of helpers.
	 *
	 * @var array Array of helpers
	 *
	 * @access public
	 */
  var $helpers = array(
    'Form',
    'BootstrapForm',
    'Html',
    'Session',
    'Js',
  );


  public $components = array(
    'Auth'           => array(
      'loginAction'  => array(
        'controller' => 'users',
        'action'     => 'login',
      ),
      'loginRedirect' => array(
        'controller' => 'posts',
        'action' => 'index',
      ),
    ),
    'Session'        => array(),
    'RequestHandler' => array(),
  );


  /**
   * Array to hold js variables to be used in view.
   *
   * @var array Data to be used in javascript
   */
  public $jsVars = array();


  /**
   * Actions which are allowed and does not require authentication
   *
   * @var array
   */
  public $allowedActions = array();


  /**
   * Method to set javascript variables
   *
   * This method puts the passed variable in an array. That array is
   * then converted to json object in layout and can be used
   * in js files
   *
   * @param string $name  Name of the variable
   * @param mixed  $value Value of the variable
   *
   * @return void
   */
  protected function setJsVar($name, $value) {
    $this->jsVars[$name] = $value;
  }//end setJsVar()


  /**
   * Method is used to execute actions before querying to the database.
   *
   * @return void
   */
  public function beforeFilter() {
    parent::beforeFilter();
  }//end beforeFilter()


  /**
  * This method is called after controller action logic, but before the view is rendered.
  *
  * @return void
  */
  public function beforeRender() {

    // Set the baseUrl in the jsVars config
    $this->setJsVar('baseUrl', Router::url('/'));

    // Set the jsVars array which holds the variables to be used in js
    $this->set('jsVars', $this->jsVars);

    $inputDefaults = array(
      'class'         => 'form-horizontal',
      'role' => 'form',
      'novalidate'    => 'novalidate',
        'inputDefaults' => array(
          'div'     => 'form-group',
          'label'   => array('class' => 'control-label'),
          'between' => '<div class="controls">',
          'error'   => array(
          'attributes' => array(
            'wrap'  => 'span',
            'class' => 'has-error',
          )
        ),
        'after'   => '</div>',
        'format'  => array(
          'before',
          'label',
          'between',
          'input',
          'error',
          'after',
        ),
      ),
    );
    // Set inputDefaults in view class so that it is available in all the views and elements
    $this->set('inputDefaults', $inputDefaults);

  }//end beforeRender()


  /**
   * Function to set the message in session
   *
   * This function uses Session components setFlash message
   *
   * @param string $message Message to be flashed
   * @param string $class   Message class, default is 'success'
   *
   * @return void
  */
  protected function setFlash($message, $class = 'alert alert-success') {
    $this->Session->setFlash(
        $message,
        'Common/flash-message',
        array(
          'class' => 'alert fade in alert-' . $class
        ));
  }//end setFlash()


}// end AppController