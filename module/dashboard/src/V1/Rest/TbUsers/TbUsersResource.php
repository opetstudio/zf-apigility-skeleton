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
         // check oauth
         $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        //  if(!$identityArray) throw new DomainException('Unauthorized', 401);
         $client_id = $identityArray['client_id'];
         $username = $identityArray['user_id'];
         $oauthClientSet = $this->table->getOauthClient($client_id, $username);
         if ($oauthClientSet->count() === 0) {
             throw new DomainException('User not found', 404);
         }
         $oauthClient = $oauthClientSet->current();
         $scope = $oauthClient['scope'];
         if($scope > 10) throw new DomainException('session timeout', 403);
         // end check oauth

        $resultSet = $this->table->getUserWithCity($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('User not found', 404);
        }
        
        return $resultSet->current();
    }

    public function fetchAll($data = [])
    {
        // check oauth
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        // if(!$identityArray) throw new DomainException('Unauthorized', 401);
        // $client_id = $identityArray['client_id'];
        $username = $identityArray['user_id'];
        // $oauthClientSet = $this->table->getOauthClient($client_id, $username);
        // if ($oauthClientSet->count() === 0) {
        //     throw new DomainException('User not found', 404);
        // }
        // $oauthClient = $oauthClientSet->current();
        $currentUserSet = $this->table->fetchOneByUsername($username);
        if ($currentUserSet->count() === 0) {
            throw new DomainException('User not found', 404);
        }
        $currentUser = $currentUserSet->current();

        $scope = (int) $currentUser['scope'];
        if($scope > 10) {
            // allow
            throw new DomainException('Unauthorize', 403);
        }
        // if(!($scope == 'root' || $scope == 'admin')) throw new DomainException('session timeout', 403);
        // end check oauth

        return new TbUsersCollection($this->table->getUsers($scope));
    }

    public function create($data) {
        $bcrypt = new Bcrypt();
        // if(!$this->getIdentity() instanceof AuthenticatedIdentity) {
        //     return [];
        // }

        // this array returyour query here using $userIdns the authentication info
        // in this case we need the 'user_id' 
         // check oauth
         $identityArray= $this->getIdentity()->getAuthenticationIdentity();
         if(!$identityArray) throw new DomainException('Unauthorized', 401);
         $client_id = $identityArray['client_id'];
         $username = $identityArray['user_id'];
         $oauthClientSet = $this->table->getOauthClient($client_id, $username);
         if ($oauthClientSet->count() === 0) {
             throw new DomainException('User not found', 404);
         }
         $oauthClient = $oauthClientSet->current();
         $scope = $oauthClient['scope'];
         // end check oauth        // $currentUserSet = $this->table->fetchOneByUsername($username);
        // if ($currentUserSet->count() === 0) {
        //     throw new DomainException('User not found', 404);
        // }
        // $currentUser = $currentUserSet->current();
        

        if($scope > 10) throw new DomainException('Unauthorized', 404);
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

        return $this->table->createNewUser($data);
    }
    public function patch($id, $data) {
        
        
        // $username = $identityArray['user_id'];
        // $currentUserSet = $this->table->fetchOneByUsername($username);
        // if ($currentUserSet->count() === 0) {
        //     throw new DomainException('User not found', 404);
        // }
        // $currentUser = $currentUserSet->current();
        // $scope = $currentUser['scope'];

        // check oauth
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) throw new DomainException('Unauthorized', 401);
        $sessionClient_id = $identityArray['client_id'];
        $sessionUsername = $identityArray['user_id'];
        
        $resultSet = $this->table->fetchOneByUsername($sessionUsername);
        if ($resultSet->count() === 0) {
            throw new DomainException('Unauthorized', 401);
        }
        $sessionUser = $resultSet->current(); 
        $destinationUser = $this->fetch($id);
        $newUsername = $destinationUser['username'];
       
        if($sessionUser['scope'] < 10) {
            // allow
        } else {
            if($sessionUser['username'] != $destinationUser['username']) throw new DomainException('Unauthorize', 403);
        }
        
        $data->modifiedby = $sessionUser['username'];
      
        if($data->username && $data->username != $destinationUser['username']) {
            $data->client_id = $data->username;
            $newUsername = $data->username;
        }

        if($data->password) {
            $bcrypt = new Bcrypt();
            $data->password = $bcrypt->create($data->password);
        }

        $this->table->patchUser($id, $data, $destinationUser['username'], $sessionUsername);
        $resultSet = $this->table->fetchOneByUsername($newUsername);
        if ($resultSet->count() === 0) {
            throw new DomainException('Unauthorized', 401);
        }
        return $resultSet->current();
    }
}