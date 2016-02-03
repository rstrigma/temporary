<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController
{	

	
	public function index() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Dashboard';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
	}

}
