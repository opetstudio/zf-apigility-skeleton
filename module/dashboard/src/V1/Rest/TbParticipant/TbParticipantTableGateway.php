<?php
namespace dashboard\V1\Rest\TbParticipant;

use Zend\Db\TableGateway\TableGateway;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\Db\RecordExists;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\Sql\Select;
use DomainException;

class TbParticipantTableGateway extends TableGateway
{
    protected $id = '_id';
    protected $tb_participant = 'tb_participant';
    public function fetchOneRecord($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        return $this->selectWith($select);
    }
    public function createNew($data) {
        $dataObj = json_decode(json_encode($data), true);
        $candidateNewData = $dataObj;
        $gotch = $this->insert($candidateNewData, true);
        $lastInsertId = $this->getLastInsertValue();
        $adapter = $this->getAdapter();
        $newDataResultSet = $this->fetchOneRecord($lastInsertId);
        if ($newDataResultSet->count() === 0) {
            throw new DomainException('New Record not found', 404);
        }
        $newDataRecord = $newDataResultSet->current();
        return $newDataRecord;
    }
    public function updateData($id, $data) {
        $dataObj = json_decode(json_encode($data), true);
        $candidateNewData = $dataObj;
        $adapter = $this->getAdapter();
        $where = array($this->id => $id);
        $this->update(json_decode(json_encode($candidateNewData), true), $where);
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->getAdapter();
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
}