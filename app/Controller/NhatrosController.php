<?php
App::uses('AppController', 'Controller');
/**
 * Nhatros Controller
 *
 * @property Nhatro $Nhatro
 * @property PaginatorComponent $Paginator
 */
class NhatrosController extends AppController {

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
	public function index() {
		$this->Nhatro->recursive = 0;
		$this->set('nhatros', $this->Paginator->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function api_index() {
		$list = $this->Nhatro->find('all');
		$this->set('nhatros', $list );
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Nhatro->exists($id)) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		$options = array('conditions' => array('Nhatro.' . $this->Nhatro->primaryKey => $id));
		$this->set('nhatro', $this->Nhatro->find('first', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function api_view($id = null) {
		if (!$this->Nhatro->exists($id)) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		$options = array('conditions' => array('Nhatro.' . $this->Nhatro->primaryKey => $id));
		$this->set('nhatro', $this->Nhatro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nhatro->create();
			if ($this->Nhatro->save($this->request->data)) {
				$this->Session->setFlash(__('The nhatro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nhatro could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Nhatro->exists($id)) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Nhatro->save($this->request->data)) {
				$this->Session->setFlash(__('The nhatro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nhatro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Nhatro.' . $this->Nhatro->primaryKey => $id));
			$this->request->data = $this->Nhatro->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Nhatro->id = $id;
		if (!$this->Nhatro->exists()) {
			throw new NotFoundException(__('Invalid nhatro'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Nhatro->delete()) {
			$this->Session->setFlash(__('The nhatro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nhatro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
