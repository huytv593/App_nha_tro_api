<?php

class AppSchema extends CakeSchema
{

    public function before($event = array())
    {
        $db = ConnectionManager::getDataSource($this->connection);
        $db->cacheSources = false;
        return true;
    }

    public function after($event = array())
    {
        if (isset($event['update'])) {
            $this->addData($event['update']);
        }
        if (isset($event['create'])) {
            $this->addData($event['create']);
        }
    }

    private function addData($tableName = null)
    {
        App::uses('ClassRegistry', 'Utility');
        switch ($tableName) {
            case 'users':
                ClassRegistry::flush();
                $user = ClassRegistry::init('users');
                $firstUser = $user->find('first');
                if ($firstUser) {
                    break;
                }
                $user->create();
                $user->saveAll(
                    array('users' =>
                        array(
                        	'unique_id' => '552ea12aaf66a9.40421091',
                            'name' => 'huytv',
                            'email' => 'huytv@zxc.com',
                            'encrypted_password' => '1NqB5eusljh2dgCsdreQXvImgDBkZTI5MzY1ZTUw',
                            'salt' => 'de29365e50',
                            'group' => 1
                        )
                    )
                );
                break;
            default:
                break;
        }
    }

    public $users = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
        'unique_id' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
        'name' => array('type' => 'string', 'null' => false),
        'email' => array('type' => 'string', 'null' => false, 'unique' => true),
        'encrypted_password' => array('type' => 'string', 'null' => false),
        'salt' => array('type' => 'string', 'null' => false),
        'group' => array('type' => 'integer', 'default' => 2, 'comment' => 'group of admin'),
        'created_at' => array('type' => 'date'),
        'updated_at' => array('type' => 'date'),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $groups = array(
        'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'unsigned' => false, 'key' => 'primary', 'autoincrement' => true),
        'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'unsigned' => false),
        'parent_id' => array('type' => 'integer', 'null' => false, 'default' => 0),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => array('id'))
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
    );

    public $nhatros = array(
    	'id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'length' => 20, 'key' => 'primary', 'unsigned' => true, 'autoIncrement' => true),
    	'title' => array('type' => 'string', 'null' => false),
    	'created_by' => array('type' => 'string', 'null' => false, 'length' => 23, 'unique' => true),
    	'created_at' => array('type' => 'date'),
        'end_at' => array('type' => 'date'),
        'price' => array('type' => 'integer', 'default' => '0', 'unique' => true),
        'city' => array('type' => 'string', 'null' => false, 'unique' => true),
        'district' => array('type' => 'string', 'null' => false, 'unique' => true),
        'precinct' => array('type' => 'string', 'null' => false, 'unique' => true),
        'street' => array('type' => 'string', 'null' => false, 'unique' => true),
        'address' => array('type' => 'string', 'null' => false, 'unique' => true),
        'area' => array('type' => 'integer', 'null' => false, 'unique' => true),
        'info' => array('type' => 'string', 'null' => false),
        'imga' => array('type' => 'string', 'null' => false),
        'imgb' => array('type' => 'string'),
        'imgc' => array('type' => 'string'),
        'imgd' => array('type' => 'string'),
        'long' => array('type' => 'string'),
        'lat' => array('type' => 'string'),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci')
	);
}