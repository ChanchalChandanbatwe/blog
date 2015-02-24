<?php
App::uses('Sanitize', 'Utility');
class CommentsController extends AppController {
    


/**
 * Method to add comments for blog using ajax request
 */
  public function add() {
      // make auto render false
      $this->autoRender = false;
      
      //echo json_encode($array); exit;
  	//debug($this->request->data); exit;
      if ($this->request->is('post')) {
          $this->data = Sanitize::clean($this->request->data);

          if ($this->Comment->save($this->data)) {
              
              $array = array(
                  'success' => true,
                  'first_name' => $this->Auth->user("first_name"),
                  'last_name' => $this->Auth->user("last_name"),
                  'comment'   => $this->data['Comment']['comment'],
              );
              echo json_encode($array);
          } else {
              $array = array('success' => false,);
              echo json_encode($array);
              
          }
      }
  }// end add()

}// end CommentsController