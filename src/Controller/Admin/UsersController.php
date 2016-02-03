<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController
{	

	
	public function login() {
		
		/*** Page layout is neccessary for each page ***/
		$title = 'Admin';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			} 
			else {
				$this->Flash->error(__('Username or password is incorrect'),'default',[],'auth');
			}
		} 
	}
	
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function index() {
	
		/*** Page layout is neccessary for each page ***/
		$title = 'Profile';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		$loguser = $this->request->session()->read('Auth.User');
		$user_id = $loguser['id'];
		
		$GetUsers = TableRegistry::get('Users');
		$logedinUser = $GetUsers->find()->where(['id' => $user_id]);
		$this->set('logedinUser',$logedinUser);
		
		$user = $this->Users->get($user_id);
		if ($this->request->is(['post', 'put'])) {
			$userData = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($userData)) {
				$this->Flash->success(__('Profile has been updated'));
			}
		}
		$this->set('user', $user);
		
	}
	


}
