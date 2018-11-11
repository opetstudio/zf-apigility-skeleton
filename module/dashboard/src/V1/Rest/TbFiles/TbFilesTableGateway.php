<?php
namespace dashboard\V1\Rest\TbFiles;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use DomainException;


class TbFilesTableGateway extends TableGateway
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
}