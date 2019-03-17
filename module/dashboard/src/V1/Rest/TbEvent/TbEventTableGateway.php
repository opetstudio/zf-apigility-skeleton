<?php
namespace dashboard\V1\Rest\TbEvent;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use DomainException;


class TbEventTableGateway extends TableGateway
{
    protected $id = '_id';
    public function fetchOneRecord($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        return $this->selectWith($select);
    }
    public function createNew($data) {
        $gotch = $this->insert(json_decode(json_encode($data), true));
        $lastInsertId = $this->getLastInsertValue();
        $adapter = $this->getAdapter();
        $newDataResultSet = $this->fetchOneRecord($lastInsertId);
        if ($newDataResultSet->count() === 0) {
            throw new DomainException('New Record not found', 404);
        }
        $newDataRecord = $newDataResultSet->current();
        return $newDataRecord;
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->getAdapter();
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
    public function updateData($id, $data) {
        $dataObj = json_decode(json_encode($data), true);
        $candidateNewData = $dataObj;
        $adapter = $this->getAdapter();
        $where = array($this->id => $id);
        $this->update(json_decode(json_encode($candidateNewData), true), $where);
    }
    public function getEvents()
    {
        // $myScope = $myScope - 1;
        // echo "myScope".$myScope;
        // $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->order('event_date ASC');
        // $select->where->greaterThanOrEqualTo('scope', $myScope);
        // $select->where->greaterThan('scope', (int) $myScope - 1);
        // $select->where()->equalTo('scope', $myScope);
        // $select->where(array(
        //     new \Zend\Db\Sql\Predicate\greaterThanOrEqualTo('scope', $myScope),
            // new \Zend\Db\Sql\Predicate\Like('FirstName',  "Peter%"),
            // new \Zend\Db\Sql\Predicate\Like('LastName', "Smith%"),
            // new \Zend\Db\Sql\Predicate\Like('LastName',  "Jackson%")
        // ));
        // $select->where('scope >= '.$myScope);
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city']);

        return new DbSelect($select, $this->getAdapter(), $this->getResultSetPrototype());
    }
}