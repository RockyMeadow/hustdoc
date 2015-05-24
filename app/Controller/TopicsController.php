<?php
App::uses('AppController', 'Controller');
/**
 * Topics Controller
 *
 * @property Topic $Topic
 * @property PaginatorComponent $Paginator
 */
class TopicsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index'); 
    }

	public function index() {
		// $this->loadModel('User');
		// $this->Topic->recursive = 0;
		// $topics = $this->Paginator->paginate();
		// foreach ($topics as $topics) {
		// 	$user = $this->User->find('first',array('conditions'=>array('User.id'=>$topics[])));
		// }
		// $this->set('topics', $this->Paginator->paginate());
		$this->Topic->recursive = 0;
		$this->set('topics', $this->Paginator->paginate());
	}


	public function admin_index() {
		$this->Topic->recursive = 0;
		$this->set('topics', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

	public function admin_view($id = null) {
		if (!$this->Topic->exists($id)) {
			throw new NotFoundException(__('Invalid topic'));
		}
		$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
		$this->set('topic', $this->Topic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if($this->isAuthorized()){
		if ($this->request->is('post')) {
			$this->Topic->create();
			$this->request->data['Topic']['user_id'] = Authcomponent::user('id');
			if ($this->Topic->save($this->request->data)) {
				$this->Session->setFlash(__('The topic has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
			}
		}
		} else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('controller'=>'users','action' => 'admin_dashboard'));
			}
		$users = $this->Topic->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if($this->isAuthorized()){
			if (!$this->Topic->exists($id)) {
				throw new NotFoundException(__('Invalid topic'));
				}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Topic->save($this->request->data)) {
					$this->Session->setFlash(__('The topic has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The topic could not be saved. Please, try again.'));
						}
			} else {
				$options = array('conditions' => array('Topic.' . $this->Topic->primaryKey => $id));
				$this->request->data = $this->Topic->find('first', $options);}
		} else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('controller'=>'users','action' => 'admin_dashboard'));
			}
		
		$users = $this->Topic->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if($this->isAuthorized()){
			$this->Topic->id = $id;
			if (!$this->Topic->exists()) {
				throw new NotFoundException(__('Invalid topic'));
			}
	
			if ($this->Topic->delete()) {
				$this->Session->setFlash(__('The topic has been deleted.'));
			} else {
				$this->Session->setFlash(__('The topic could not be deleted. Please, try again.'));
					}
			return $this->redirect(array('action' => 'index'));
		}else{
			$this->Session->setFlash(__('You do not have permission to do this'));
			return $this->redirect(array('controller'=>'users','action' => 'admin_dashboard'));
			}
		}

}
