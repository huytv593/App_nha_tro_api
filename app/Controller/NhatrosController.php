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

	public function api_find() {
		$this->autoRender = $this->autoLayout = false;
        if ($this->request->is('post')){
//            print_r($this->request->data);
            $conditions =array();
            $response = array();
            $responseA = array();

            $city = $this->request->data['city'];
            $district = $this->request->data['district'];
            $precinct = $this->request->data['precinct'];
            $street = $this->request->data['street'];
            $areaf = $this->request->data['areaf'];
            $areat = $this->request->data['areat'];
            $pricef = $this->request->data['pricef'];
            $pricet = $this->request->data['pricet'];

            if($city) $conditions['Nhatro.city'] = $city;
            if($district) $conditions['Nhatro.district'] = $district;
            if($precinct) $conditions['Nhatro.precinct'] = $precinct;
            if($street) $conditions['Nhatro.street'] = $street;
            if($areaf) $conditions['Nhatro.area >='] = $areaf;
            if($areat) $conditions['Nhatro.area <='] = $areat;
            if($pricef) $conditions['Nhatro.price >='] = $pricef;
            if($pricet) $conditions['Nhatro.price <='] = $pricet;


            $result = $this->Nhatro->find('all', array(
                'conditions' => array(
                    'AND' => $conditions
                )
            ));
//            debug($result);
            foreach($result as $key => $value){
                foreach($value as $subKey => $subValue) {
                    $response[$key] = $subValue;
                }
            }
            $responseA['Nhatro'] = $response;
//           debug($responseA);
		echo json_encode($responseA,  JSON_UNESCAPED_UNICODE);
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
