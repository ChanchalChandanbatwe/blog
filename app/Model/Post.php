<?php 

/**
 * Post model.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       Post.Model
 */

class Post extends AppModel {

  /**
   * Model name
   * @var string
   */
  public $name = 'Post';
  

  
/**
 * Validation rules.
 * @var array
 */
  public $validate = array(
      'title' => array(
        'notempty' => array(
          'rule'    => array('notempty'),
          'message' => 'Please enter title',
        ),
      ),
      'body' => array(
        'notempty' => array(
          'rule'    => array('notempty'),
          'message' => 'Please enter body',
        ),
      )
  );
 

/**
 * hasMany Association
 * @var array
 */
 public $hasMany = array('Comment' => array(
                                          'order'         => 'Comment.created DESC',
                                          'limit'         => '5',
                                          'dependent'     => true,
                                          ));


 /**
  * belongsTo Association
  * @var array
  */
  public $belongsTo = array('User' => array(
                                        'dependent' => true,
                                      ));


}// end Post