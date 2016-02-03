<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	
	public function initialize()
    {
		$this->loadComponent('Paginator');
	    $this->loadComponent('Flash');
		
		$this->loadComponent('Auth', 
		[
			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'username', 'password' => 'password']
				]
			],		
			'authorize' => ['Controller'],
            'loginRedirect' => [
                'controller' => 'admin/dashboard',
                'action' => 'index',
				'prefix' => false	 
            ],
            'logoutRedirect' => [
                'controller' => 'admin/users',
                'action' => 'login',
				'prefix' => false
            ]
        ]); 
		
		
	}	

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */

	
	 public function beforeFilter(Event $event)
    {
		
	if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
           $this->viewBuilder()->layout('admin');
        } 
		else {
			 $this->viewBuilder()->layout('frontend');
		} 
    }  
	
	public function isAuthorized($user)
	{
				if (isset($user['type']) && $user['type'] === 1) {
					return true;
				}
				return false;
	} 
	
}
