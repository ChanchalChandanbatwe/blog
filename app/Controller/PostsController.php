<?php

/**
 * Posts Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       post.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-user-controller
 */

App::uses('Sanitize', 'Utility');

class PostsController extends AppController {
  

  public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('index','view');
  }
  public $paginate = array(
      'limit' => 2,
      'order' => array(
          'Post.title' => 'asc'
      ),

  );    
  


/**
 * List blogs
 * @return array list of blogs
 */
  public function index() {

      $posts = $this->paginate();
      $this->set('posts', $posts);
  }// end index()

  
/**
 * View blog
 * @param  int $id Blog id
 * @return array Blog array
 */
  public function view($id = null) {
    $this->Post->id = $id;
    
    $contain = array('Comment' => array('fields' => array('comment'), 'User' => array('fields' => array('first_name', 'last_name'))));
    $this->Post->contain($contain);
    $this->set('post', $this->Post->read());
    if($this->request->is('post')) {
          $post_id = $this->request->data['Comment']['post_id']; 
          $this->redirect(array('action' => 'view',$post_id));
      }
  }// end view()


/**
 * Method to add blog
 * 
 */
  public function add() {
    
      if ($this->request->is('post')) {
          $this->data = Sanitize::clean($this->request->data);

          if ($this->Post->save($this->data)) {
              $this->setFlash(__('Your post has been saved.'), 'alert alert-success');
              $this->redirect(array('action' => 'index'));
          } else {
              $this->setFlash(__('Unable to add your post.'), 'alert alert-danger');
          } 
      }
  }// end add()


/**
  * Method to use edit blog  
  * @param  int $id Blogs id
  * @return void
  */
  public function edit($id = null) {
      // set blog id to edit
      $this->Post->id = $id;

      if (!$this->Post->exists()) {
        throw new NotFoundException(__('Invalid post'));
      }

      $postUserId = $this->Post->read(null, $id);
      $userId = $postUserId['Post']['user_id'];
      $this->permissionAccess($userId);
          if ($this->request->is('get')) {
             $this->request->data = $this->Post->read();
          } else {
              if ($this->Post->save($this->request->data)) {
                  $this->setFlash(__('Your post has been updated.'), 'alert alert-success');
                  $this->redirect(array('action' => 'index'));
              } else {
                  $this->setFlash(__('Unable to update your post.'), 'alert alert-danger');
              }
          }
  }// end edit()


/**
 * Method to remove post
 * @param  int $id Post id to remove
 * @return void
 */
  public function delete($id) {
      if ($this->request->is('get')) {
          throw new MethodNotAllowedException();
      } else {
          $this->Post->id = $id;
          $postUserId = $this->Post->findById($this->Post->id);
          $userId = $postUserId['Post']['user_id'];
          $this->permissionAccess($userId);
          if ($this->Post->delete($id)) {
              $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.', 'flash', array('type' => 'success'));
              $this->redirect(array('action' => 'index'));
          }
      }
  }// end delete


}// end PostsController