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

	public function find() {
		$this->autoRender = $this->autoLayout = false;
		if ($this->request->is('post')){
			//debug($this->request->data);die();
			$city = $this->request->data['city'];
			$district = $this->request->data['district'];
			$precinct = $this->request->data['precinct'];
			$street = $this->request->data['street'];
			$areaf = $this->request->data['minSquare'];
			$areat = $this->request->data['maxSquare'];
			$pricef = $this->request->data['minPrice'];
			$pricet = $this->request->data['maxPrice'];
			$response = array();
			$conditions = array();
			if($city != null) $conditions['city'] = $city;
			if($district != null) $conditions['district'] = $district;
			if($precinct != null) $conditions['precinct'] = $precinct;
			if($street != null) $conditions['street'] = $street;
			if($areaf != null) $conditions['area >='] = $areaf;
			if($areat != null) $conditions['area <='] = $areat;
			if($pricef != null) $conditions['price >='] = $pricef;
			if($pricet != null) $conditions['price <='] = $pricet;
			$param['conditions'] = $conditions; 
			//debug($param);die();
			$response = $this->Nhatro->find('all', $param);
		echo json_encode($response,  JSON_UNESCAPED_UNICODE);
		}
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
