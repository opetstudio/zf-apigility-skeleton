<?php
namespace dashboard\V1\Rest\TbClasses;

use DomainException;
use ZF\Apigility\DbConnectedResource;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\Crypt\Password\Bcrypt;

class TbClassesResource extends DbConnectedResource
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
        // $resultSet = $this->table->fetchOneUserByUsername($username);
        
        $data->fasilitator = $userDetail['_id'];
        $data->createdby = $userDetail['_id'];
        $data->modifiedby = $userDetail['_id'];

        $newDataRecord = $this->table->createNew($data);

        // create

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

        // rec detail
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found for id '.$id, 404);
        }

        $recDetail = $resultSet->current();
        if($recDetail['fasilitator'] != $userDetail['_id']) throw new DomainException('forbidden fasilitator('.$recDetail['fasilitator'].') for username '.$username, 404);

        // $data->fasilitator = $identityArray['user_id'];
        // $data->createdby = $identityArray['user_id'];
        $data->modifiedby = $userDetail['_id'];
        $this->table->updateData($id, $data);
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found', 404);
        }
        return $resultSet->current();
    }
}