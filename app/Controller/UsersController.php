<?php

/**
 * Users Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       user.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-user-controller
 */
class UsersController extends AppController {
	
	/**
	 * Method to login user
	 * @return void 
	 */
	public function login() {
		
		if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	        	return $this->redirect($this->Auth->redirect());
	        } else {
						$this->setFlash(__('Username or password is incorrect'), 'alert alert-danger');
	        }
    	}

	}// end login()


	public function edit() {
		

		$this->User->read(null, $this->Auth->user('id'));
    
        if ($this->request->is('get')) {
           $this->request->data = $this->User->read();
        } else {
            if ($this->User->save($this->request->data)) {
                $this->setFlash(__('Your profile has been updated.'), 'alert alert-success');
            } else {
                $this->setFlash(__('Unable to update your profile.'), 'alert alert-danger');
            }
        }
	}// end edit()

	
	/**
	 * Method to logout user
	 * @return void
	 */
	public function logout() {
	  $this->redirect($this->Auth->logout());
	}

}// end UsersController