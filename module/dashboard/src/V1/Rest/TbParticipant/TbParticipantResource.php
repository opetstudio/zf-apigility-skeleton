<?php
namespace dashboard\V1\Rest\TbParticipant;

use DomainException;
use ZF\Apigility\DbConnectedResource;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\Crypt\Password\Bcrypt;

class TbParticipantResource extends DbConnectedResource
{
    public function create($data) {
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) throw new DomainException('Unauthorized', 401);
        $client_id = $identityArray['client_id'];
        $username = $identityArray['user_id'];

        $userResultSet = $this->table->fetchOneUserByUsername($username);
        if ($userResultSet->count() === 0) {
            throw new DomainException('Unauthorized', 401);
        }
        $userDetail = $userResultSet->current(); 
        
        $data->createdby = $userDetail['_id'];
        $data->modifiedby = $userDetail['_id'];

        $newDataRecord = $this->table->createNew($data);

        return $newDataRecord;
    }
    public function patch($id, $data) {
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) throw new DomainException('Unauthorized', 401);
        $client_id = $identityArray['client_id'];
        $username = $identityArray['user_id'];

        $userResultSet = $this->table->fetchOneUserByUsername($username);
        if ($userResultSet->count() === 0) {
            throw new DomainException('Unauthorized', 401);
        }
        $userDetail = $userResultSet->current();
        // print_r($userDetail);
        $data->modifiedby = $userDetail['_id'];
        $this->table->updateData($id, $data);
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found', 404);
        }
        return $resultSet->current();
    }
}