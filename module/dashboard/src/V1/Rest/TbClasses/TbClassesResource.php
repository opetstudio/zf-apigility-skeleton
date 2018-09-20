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
        // $resultSet = $this->table->fetchOneUserByUsername($username);
        
        $data->fasilitator = $identityArray['user_id'];
        $data->createdby = $identityArray['user_id'];
        $data->modifiedby = $identityArray['user_id'];

        $newDataRecord = $this->table->createNew($data);

        // create

        return $newDataRecord;
    }
    public function patch($id, $data) {
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) throw new DomainException('Unauthorized', 401);
        $client_id = $identityArray['client_id'];
        $username = $identityArray['user_id'];

        // rec detail
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found for id '.$id, 404);
        }

        $recDetail = $resultSet->current();
        if($recDetail['fasilitator'] != $username) throw new DomainException('forbidden fasilitator('.$recDetail['fasilitator'].') for username '.$username, 404);

        // $data->fasilitator = $identityArray['user_id'];
        // $data->createdby = $identityArray['user_id'];
        $data->modifiedby = $identityArray['user_id'];
        $this->table->updateData($id, $data);
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found', 404);
        }
        return $resultSet->current();
    }
}