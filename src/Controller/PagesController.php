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
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
	 
	 
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
		$this->Auth->allow(['home','viewpages','citiylistingpage','submitcontactform','registration']);
    }
	 
	public function home() { 
		$page_id = 1;
		$getPage = TableRegistry::get('Pages');
		$setPage = $getPage->find()->where(['id' => $page_id])->first();
		$this->set('setPage',$setPage);
		/** Set the page title here **/
		$this->set('pagesTitle', $setPage->title);
	}
	
	public function registration() { 
		if ($this->request->is('post')) {
			$first_name = $this->request->data['first_name'];
			$last_name = $this->request->data['last_name'];
			$bussiness_name = $this->request->data['bussiness_name'];
			$email = $this->request->data['email'];
			$mobile = $this->request->data['mobile'];
			$msg = '<h3>Registration Successfull. Following is the user detail.</h3><br><br><br>';
			$msg .= 	'<strong>First Name : </strong>' .$first_name. '<br>';
			$msg .=	'<strong>Last Name : </strong>' .$last_name. '<br>'; 
			$msg .=	'<strong>Bussiness Name : </strong>' .$bussiness_name. '<br>'; 
			$msg .=	'<strong>Email : </strong>' .$email. '<br>'; 
			$msg .=	'<strong>Mobile : </strong>' .$mobile. '<br>';
			
			$email = new Email('default');
			$res = $email->emailFormat('html')
				->from(['partners@terra-app.com' => 'Terraapp User'])
				->to('partners@terra-app.com')
				->subject('Registration')
				->send($msg);

			if(!empty($res)){
				$data = '<div class="showSuccess">Registration Successfull.</div>';
				echo json_encode(array('response'=>1, 'data'=>$data));
			} 
			else{
				$data = '<div class="showSuccess">Error in registration.</div>';
				echo json_encode(array('response'=>0, 'data'=>$data));
			}
			exit;
		}
		
	}
	
	public function viewpages($slug) { 
		$getPage = TableRegistry::get('Pages');
		$setPage = $getPage->find()->where(['slug' => $slug])->first();
		$this->set('setPage',$setPage);
		/** Set the page title here **/
		if(!empty($setPage)){
			$this->set('pagesTitle', $setPage->title);
		} else {
			$this->set('pagesTitle', '404 page');
		}
		$this->set('slug', $slug);
	}
	
	public function citiylistingpage(){
		$page_id = 17;
		$getPage = TableRegistry::get('Pages');
		$setPage = $getPage->find()->where(['id' => $page_id])->first();
		$this->set('setPage',$setPage);
		
		
		$getCitiy = TableRegistry::get('Cities');
		$California = $getCitiy->find()->where(['state_id' => 1])->all();
		$Colorado = $getCitiy->find()->where(['state_id' => 2])->all();
		$Florida = $getCitiy->find()->where(['state_id' => 3])->all();
		$Illinois = $getCitiy->find()->where(['state_id' => 4])->all();
		$NorthCarolina = $getCitiy->find()->where(['state_id' => 5])->all();
		$Texas = $getCitiy->find()->where(['state_id' =>6])->all();
		$Georgia = $getCitiy->find()->where(['state_id' =>7])->all();
		$Washington = $getCitiy->find()->where(['state_id' =>10])->all();
		
		

		$this->set('California',$California);
		$this->set('Colorado',$Colorado);
		$this->set('Florida',$Florida);
		$this->set('Illinois',$Illinois);
		$this->set('NorthCarolina',$NorthCarolina);
		$this->set('Texas',$Texas);
		$this->set('Georgia',$Georgia);
		$this->set('Washington',$Washington);
		
		/** Set the page title here **/
		$this->set('pagesTitle', $setPage->title);
	}

	
	public function submitcontactform() {
		$this->loadModel('Contacts');
		if ($this->request->is('post')) {
			$email = $this->request->data['email'];
			$contactData = [];
			$contactTable = TableRegistry::get('Contacts');  
			
			$contactData = $contactTable->find()->where(['email' => $email])->first();
			if(empty($contactData)){
				$contactTable = TableRegistry::get('Contacts');   
				$saveData =  $contactTable->newEntity($this->request->data);  
				if ($contactTable->save($saveData)) {
					$email = new Email('default');
					$data = 'Name: '.$this->request->data['name'].', Email: '.$this->request->data['email'].', City:'.$this->request->data['city'];
					$email->subject('Do not see your city?')
						->to('contact@terra-app.com')
						->from($this->request->data['email'])
						->send($data);	
					$data = '<div class="showSuccess">Thanks for submitting the form. We will contact you soon.</div>';
					echo json_encode(array('response'=>1, 'data'=>$data));
				}
			}
			else{
				$data = '<div class="showError">Email is already exist. Please use another email.</div>';
				echo json_encode(array('response'=>0, 'data'=>$data));
			}
		}
		exit;
	}
	

	

	
	/** Default cakephp display function for pages **/
	public function display()
    {
        $path = func_get_args();
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }
	
}
