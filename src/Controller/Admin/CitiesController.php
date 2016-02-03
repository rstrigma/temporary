<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Network\Exception\InternalErrorException;
use Cake\I18n\Time;

class CitiesController extends AppController
{	
	
	
	##################### Controller Settings for component and Variables ####################
	public $paginate = [ 'limit' => 10,'order' => ['Pages.id' => 'asc'] ];
	
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
	################################ End Controller settings  ########################################
	
	
	
	public function index() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Cities';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$GetCities = TableRegistry::get('Cities');
		$AllCities = $GetCities->find('all')->contain(['States'])->offset(0)->limit(30) ;
		$this->set('AllCities',$this->paginate($AllCities));
	}
	
	public function add() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Add State';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		$state = TableRegistry::get('States');
        $stateList = $state->find('list', ['fields' => ['id', 'name']]);
		$this->set('stateList',$stateList);
		
		$getCity = $this->Cities->newEntity();
		if ($this->request->is('post')) {
			$CitiesData = $this->Cities->patchEntity($getCity, $this->request->data);
            if ($this->Cities->save($CitiesData)) { 
				$this->Flash->success(__('The state has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
		}
		$this->set('getCity', $getCity);
		
	}
	
	public function edit($id = null)
	{
	
		/*** Page layout is neccessary for each page ***/
		$title = 'Edit cities';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		$state = TableRegistry::get('States');
        $stateList = $state->find('list', ['fields' => ['id', 'name']]);
		$this->set('stateList',$stateList);
		
		$getCity = $this->Cities->get($id);
		if ($this->request->is(['post','put'])) {
			$city = $this->Cities->patchEntity($getCity, $this->request->data);
			$city->updated = date("Y-m-d H:i:s");
			if ($this->Cities->save($city)) {
				$this->Flash->success(__('City has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		$this->set('getCity', $getCity);
	}

	
	public function delete($id)
	{
		$page = $this->Cities->get($id);
		if ($this->Cities->delete($page)) {
			$this->Flash->success(__('The state has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
	
	

}
