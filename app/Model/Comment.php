<?php

/**
 * Post model.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       Post.Model
 */

class Comment extends AppModel {

/**
 * Model name
 * @var string
 */
  public $name = 'Comment';
  

  /**
   * Validation rules
   * @var array
   */
  public $validate = array(
                      'comment' => array(
                        'rule' => 'notEmpty',
                        'required' => true,
                      )
  );

/**
 * belongsTo Association
 * @var array
 */
  public $belongsTo = array('Post', 'User');
  
  /**
   * Behaviour
   * @var array
   */
  public $actsAs = array('Containable');

	
}// end Comment