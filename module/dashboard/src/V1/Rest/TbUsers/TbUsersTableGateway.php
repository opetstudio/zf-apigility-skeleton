<?php
namespace dashboard\V1\Rest\TbUsers;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;


class TbUsersTableGateway extends TableGateway
{
    public function getUserWithCity($id)
    {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city'])
        //     ->where(['users.id' => $id]);
        return $this->selectWith($select);
    }

    /**
     * @return DbSelect
     */
    public function getUsersWithCities()
    {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city']);

        return new DbSelect($select, $this->getAdapter(), $this->getResultSetPrototype());
    }

    public function createNewUser($data) {
        $this->insert(json_decode(json_encode($data), true));
        // $table = $this->getTable();
        // $table->insert($data);
    }
}