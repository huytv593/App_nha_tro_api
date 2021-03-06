<?php
App::uses('AppController', 'Controller');

/**
 * Nhatros Controller
 *
 * @property Nhatro $Nhatro
 * @property PaginatorComponent $Paginator
 */
class NhatrosController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $uses = array('Nhatro');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
        $this->Nhatro->recursive = 0;
        $this->set('nhatros', $this->Paginator->paginate());
    }

    public function api_find()
    {
        $this->autoRender = $this->autoLayout = false;
        if ($this->request->is('post')) {
//            print_r($this->request->data);
            $conditions = array();
            $response = array();
            $responseA = array();

            $city = $this->request->data['city'];
            $district = $this->request->data['district'];
            $precinct = $this->request->data['precinct'];
            $street = $this->request->data['street'];
            $areaf = $this->request->data['minSquare'];
            $areat = $this->request->data['maxSquare'];
            $pricef = $this->request->data['minPrice'];
            $pricet = $this->request->data['maxPrice'];

            if ($city) $conditions['Nhatro.city'] = $city;
            if ($district) $conditions['Nhatro.district'] = $district;
            if ($precinct) $conditions['Nhatro.precinct'] = $precinct;
            if ($street) $conditions['Nhatro.street'] = $street;
            if ($areaf) $conditions['Nhatro.area >='] = $areaf;
            if ($areat) $conditions['Nhatro.area <='] = $areat;
            if ($pricef) $conditions['Nhatro.price >='] = $pricef;
            if ($pricet) $conditions['Nhatro.price <='] = $pricet;

            $result = $this->Nhatro->find('all', array(
                'conditions' => array(
                    'AND' => $conditions
                )
            ));
//            debug($result);
            foreach ($result as $key => $value) {
                foreach ($value as $subKey => $subValue) {
                    $response[$key] = $subValue;
                }
            }
            $responseA['Nhatro'] = $response;
//           debug($responseA);
            echo json_encode($responseA, JSON_UNESCAPED_UNICODE);
        }
    }


    public function api_map($pricef = null, $pricet = null, $distance = null){
        if($this->request->is('post')){
            $pricef = $this->request->data['pricef'];
            $pricet= $this->request->data['pricet'];
            $distance = $this->request->data['distance'];

            $conditions = array();
            $conditions['Nhatro.price >='] = $pricef;
            $conditions['Nhatro.price <='] = $pricet;
            $result = $this->Nhatro->find('all', array(
                'conditions' => array(
                    'AND' => $conditions
                )
            ));
            foreach ($result as $key => $value) {
                foreach ($value as $subKey => $subValue) {
                    $response[$key] = $subValue;
                }
            }
            $responseA['Nhatro'] = $response;
//           debug($responseA);
            echo json_encode($responseA, JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
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
    public function add()
    {
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $datatmp = $this->data;
                $datatmp['Nhatro']['imga'] = '';

                //Check if image has been uploaded
                if (!empty($this->request->data['Nhatro']['imguploada']['name'])) {
                    $file = $this->request->data['Nhatro']['imguploada']; //put the data into a var for easy use
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                    //only process if the extension is valid
                    if (in_array($ext, $arr_ext)) {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/nhatros/' . $file['name']);
                        //prepare the filename for database entry
//                        debug($file['name']);
                        $datatmp['Nhatro']['imga'] = $file['name'];
                    }
                }
//            debug($this->request->data);
//            debug($datatmp);// die;

                //now do the save
//                $this->loadModel('Nhatro');
                $this->Nhatro->create();
                $this->User->save($datatmp);
//                if ($this->User->save($datatmp)) {
//                    $this->Session->setFlash(__('The nhatro has been saved.'));
//                    return $this->redirect(array('action' => 'index'));
//                } else {
//                    $this->Session->setFlash(__('The nhatro could not be saved. Please, try again.'));
//                }
            };
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
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
