<?php
class LoginController extends AppController {
    public function beforeFilter() {
        $this->Auth->allow('index', 'logout');
    }	

	public function index() {
	    $this->layout = 'logged_out';
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirectUrl());
	        } else {
	            $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
	        }
	    }
	}

	public function logout() {
	    $this->Session->setFlash(__('Logged out successfully'), 'default', array(), 'auth');
	    $this->redirect($this->Auth->logout());
	}
}
?>