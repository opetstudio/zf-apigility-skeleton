<?php
namespace dashboard\V1\Rest\TbClassParticipants;

use DomainException;
use ZF\Apigility\DbConnectedResource;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\Crypt\Password\Bcrypt;

class TbClassParticipantsResource extends DbConnectedResource
{
    public function fetchAll($params = [])
    {
        $class_id = $params['class_id'];
        return new TbClassParticipantsCollection($this->table->fetchAllByClassId($class_id));
    }
}