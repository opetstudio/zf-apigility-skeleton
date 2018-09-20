<?php
namespace dashboard\V1\Rest\TbClassParticipants;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use DomainException;

class TbClassParticipantsTableGateway extends TableGateway
{
    protected $id = '_id';
    public function fetchOneRecord($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        return $this->selectWith($select);
    }
    public function fetchAllByClassId($class_id)
    {
        $select = $this->getSql()->select();
        $select->where(['class_id' => $class_id]);
        return new DbSelect($select, $this->getAdapter(), $this->getResultSetPrototype());
    }
}