<?php

/**
 * User model.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       User.Model
 */

class User extends AppModel {
	

	/**
	 * Model name
	 * @var string
	 */
	public $name = 'User';
	
	
	/**
	 * Validation rules.
	 *
	 * @var array
	 */
	public $validate = array(
											'first_name'	=>	array(
												'notempty'	=> array(
													'rule'		=>	array('notempty'),
													'message'	=>	'Please enter first name',
												),
											),
											'last_name'	=>	array(
												'notempty'	=> array(
													'rule'		=>	array('notempty'),
													'message'	=>	'Please enter last name',
												),
											),
										);

  /**
   * hasMany associations.
   *
   * @var array
   */
	public $hasMany = array('Post',);


}// end User