<?php
namespace dashboard\V1\Rest\TbClasses;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;

class TbClassesTableGateway extends TableGateway
{
    protected $id = '_id';
    public function fetchOne($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        return $this->selectWith($select);
    }
    public function createNew($data) {
        $gotch = $this->insert(json_decode(json_encode($data), true));
        $lastInsertId = $this->getLastInsertValue();
        $adapter = $this->getAdapter();
        $resultSet = $this->fetchOne($lastInsertId);
    }
    public function updateData($id, $data) {
        $adapter = $this->getAdapter();
        $where = array($this->id => $id);
        // $where = array($this->identifierName => $id);
        // $where = ['._id' => $id];
        $this->update(json_decode(json_encode($data), true), $where);

        // $gotch = $this->insert(json_decode(json_encode($data), true));
        // $lastInsertId = $this->getLastInsertValue();
        // $adapter = $this->getAdapter();
        // return $this->fetchOne($id);
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->getAdapter();
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
}