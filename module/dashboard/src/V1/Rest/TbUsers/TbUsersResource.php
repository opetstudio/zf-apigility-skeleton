<?php
namespace dashboard\V1\Rest\TbUsers;

use DomainException;
use ZF\Apigility\DbConnectedResource;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\Crypt\Password\Bcrypt;

class TbUsersResource extends DbConnectedResource
{
    public function fetch($id)
    {
        $resultSet = $this->table->getUserWithCity($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('User not found', 404);
        }
        return $resultSet->current();
    }

    public function fetchAll($data = [])
    {
        return new TbUsersCollection($this->table->getUsersWithCities());
    }

    public function create($data) {
        $bcrypt = new Bcrypt();
        // if(!$this->getIdentity() instanceof AuthenticatedIdentity) {
        //     return [];
        // }

        // this array returyour query here using $userIdns the authentication info
        // in this case we need the 'user_id' 
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        // $result = json_decode($identityArray, true);
        // print_r($result);
        // note, by default user_id is the email (username column in oauth_users table)
        // $userId = $identityArray['user_id']; 
        $data->createdby = $identityArray['user_id'];
        $data->modifiedby = $identityArray['user_id'];
        $data->status = 'publish';
        $data->password = $bcrypt->create($data->password);
        // print_r($data);
        // $data['createdby'] = $identityArray['user_id'];

        $this->table->createNewUser($data);
    }
}