<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class StatesController extends AppController
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
		$title = 'States';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$GetStates = TableRegistry::get('States');
		$AllState = $GetStates->find();
		$this->set('AllState',$this->paginate($AllState));
	}
	
	public function add() {
		/*** Page layout is neccessary for each page ***/
		$title = 'Add State';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		$state = $this->States->newEntity();
		if ($this->request->is('post')) {
			$statesData = $this->States->patchEntity($state, $this->request->data);
            if ($this->States->save($statesData)) { 
				$lastInsertID =  $statesData->id;
				
				$data = $this->request->data['icon'];
				$file_name = $data['name'];
				$file_tmp_name = $data['tmp_name']; 
				$dir = WWW_ROOT.'img'.DS.'stateicon';
				$allowed = array('jpg','png','jpeg');
				if(!empty($file_name)){
					if( !in_array( substr(strrchr($file_name, '.'), 1),  $allowed) ){
						$this->Flash->success(__('Please select only png, jpg, jpeg format'));
						return $this->redirect(['action' => 'index']);
					}
					else if(is_uploaded_file($file_tmp_name)){
						$stateTable = TableRegistry::get('States');
						$state = $stateTable->get($lastInsertID);
						$state->icon = $lastInsertID.'-'.$file_name;
						$stateTable->save($state);
						move_uploaded_file($file_tmp_name, $dir.DS.$lastInsertID.'-'.$file_name);
					}
				}
				
				
				$this->Flash->success(__('The state has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
		}
		$this->set('page', $state);
		
	}
	
		public function edit($id = null)
	{
	
		/*** Page layout is neccessary for each page ***/
		$title = 'Edit state';
		$this->set('admintitle_for_page',$title);
		/*******************************************************/
		
		$GetStates = TableRegistry::get('States');
		$setState = $GetStates->find()->where(['id' => $id]);
		$this->set('setStateRow',$setState);
	
		$getState = $this->States->get($id);
		if ($this->request->is(['post','put'])) {
			$state = $this->States->patchEntity($getState, $this->request->data);

			$data = $this->request->data['stateicon'];
			$file_name = $data['name'];
			$file_tmp_name = $data['tmp_name']; 
			$dir = WWW_ROOT.'img'.DS.'stateicon';
			$allowed = array('jpg','png','jpeg');
			if(!empty($file_name)){
				unlink(WWW_ROOT.'img'.DS.'stateicon'.DS.$state['icon']);
				$state->icon = $id.'-'.$file_name;
				if( !in_array( substr(strrchr($file_name, '.'), 1),  $allowed) ){
					$this->Flash->success(__('Please select only png, jpg, jpeg format'));
					return $this->redirect(['action' => 'edit', $id]);
				}
				else if(is_uploaded_file($file_tmp_name)){
					move_uploaded_file($file_tmp_name, $dir.DS.$id.'-'.$file_name);
				}
			}
			else{
				$state->icon = $this->request->data['oldIcon'];
			}
			
			$state->updated = date("Y-m-d H:i:s");
			if ($this->States->save($state)) {
				$this->Flash->success(__('State has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
		}
		$this->set('state', $getState);
	}

	
	public function delete($id)
	{
		$page = $this->States->get($id);
		if(file_exists(WWW_ROOT.'img'.DS.'stateicon'.DS.$page['icon'])){
				unlink(WWW_ROOT.'img'.DS.'stateicon'.DS.$page['icon']);
		}
		if ($this->States->delete($page)) {
			$this->Flash->success(__('The state has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}
	

}
