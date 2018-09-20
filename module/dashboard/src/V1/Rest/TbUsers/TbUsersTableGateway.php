<?php
namespace dashboard\V1\Rest\TbUsers;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use DomainException;


class TbUsersTableGateway extends TableGateway
{
    protected $id = '_id';
    public function getUserWithCity($id)
    {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        // $select = $this->getSql()->select(array('_id' => $id));
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city'])
            // ->where(['_id' => $id]);
        return $this->selectWith($select);
    }
    public function getUserByAccesstoken($id)
    {
        $table = $this->getTable();
        $adapter = $this->getAdapter();
        $oauth_access_tokens = new TableGateway('oauth_access_tokens', $adapter);
        $select = $oauth_access_tokens->getSql()->select();
        $select->where(['access_token' => $id]);
        $resultSet = $this->selectWith($select);
        if ($resultSet->count() === 0) {
            throw new DomainException('User not foundssss', 404);
        }
        $at = $resultSet->current();
        echo 'id==>'.$at['user_id'];
        $resultSet1 = $this->fetchOneByUsername($at['user_id']);
        // if ($resultSet->count() === 0) {
        //     throw new DomainException('User not found', 404);
        // }
        // $select = $this->getSql()->select(array('_id' => $id));
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city'])
            // ->where(['_id' => $id]);
        return $resultSet1;
    }
    public function getOauthClient($id, $user_id)
    {
        $adapter = $this->getAdapter();
        $oauth_clients = new TableGateway('oauth_clients', $adapter);
        $table = $oauth_clients->getTable();
        $select = $oauth_clients->getSql()->select();
        $select
            // ->join(['l' => 'oauth_scopes', ''], $table . '.client_id = l.client_id')
            ->where(['client_id' => $id, 'user_id' => $user_id]);
        // $select = $this->getSql()->select(array('_id' => $id));
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city'])
            // ->where(['_id' => $id]);
        return $this->selectWith($select);
    }
    public function fetchOneByUsername($username)
    {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where(['username' => $username]);
        // $select = $this->getSql()->select(array('_id' => $id));
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city'])
            // ->where(['_id' => $id]);
        return $this->selectWith($select);
    }
    public function fetchOne($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select(array($this->id => $id));
        return $this->selectWith($select); 
    }
    public function fetchOneById($id) {
        $select = $this->getSql()->select(array($this->id => $id));
        return $this->selectWith($select); 
    }

    /**
     * @return DbSelect
     */
    public function getUsersWithCities()
    {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        // $select
        //     ->columns(['id', 'name'])
        //     ->join(['l' => 'locations'], $table . '.location_id = l.id', ['city']);

        return new DbSelect($select, $this->getAdapter(), $this->getResultSetPrototype());
    }
    public function getUsers($myScope)
    {
        $myScope = $myScope - 1;
        // echo "myScope".$myScope;
        // $table = $this->getTable();
        $select = $this->getSql()->select();
        // $select->where->greaterThanOrEqualTo('scope', $myScope);
        $select->where->greaterThan('scope', (int) $myScope - 1);
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

    public function createNewUser($data) {
        

        $gotch = $this->insert(json_decode(json_encode($data), true));
        $lastInsertId = $this->getLastInsertValue();
        $adapter = $this->getAdapter();
        $oauth_users = new TableGateway('oauth_users', $adapter);
        // $oauth_scopes = new TableGateway('oauth_scopes', $adapter);
        $oauth_clients = new TableGateway('oauth_clients', $adapter);
        
        $resultSet = $this->getUserWithCity($lastInsertId);
        if ($resultSet->count() === 0) {
            throw new DomainException('New Record not found', 404);
        }
        $newData = $resultSet->current();

        $oauth_users->insert([
            'username'=>$newData['username'],
            'password'=>$newData['password'],
            'first_name'=>$newData['first_name'],
            'last_name'=>$newData['last_name'],
            ]);
        // $oauth_scopes->insert([
        //     'scope'=>$newData['scope'],
        //     'client_id'=>$newData['client_id']
        // ]);
        $oauth_clients->insert([
            'client_id'=>$newData['client_id'],
            'client_secret'=>'',
            // 'client_secret'=>$newData['password'],
            'redirect_uri'=>'/oauth/receivecode',
            'grant_types'=>'password',
            'scope'=>$newData['scope'],
        ]);
        // echo "lastInsertId==>".$lastInsertId;
        // echo "gotch==>".$gotch;
        // $table = $this->getTable();
        // $table->insert($data);
        return $newData;
    }
    public function patchUser($id, $data, $destinationUsername = NULL, $sessionUsername = NULL) {
        // $rowset      = $artistTable->select(['id' => 2]);
        // $select = $this->getSql()->select(['id' => 2]);;
        // $artistRow   = $select->current();
        // $artistRow->name = 'New Name';
        // $artistRow->save();
        
        // $this->insert(json_decode(json_encode($data), true));
        // $table = $this->getTable();
        $adapter = $this->getAdapter();
        $where = array($this->id => $id);
        // $where = array($this->identifierName => $id);
        // $where = ['._id' => $id];
        $this->update(json_decode(json_encode($data), true), $where);
        if($data->scope) {
            // $oauth_scopes = new TableGateway('oauth_scopes', $adapter);
            // $oauth_scopes->update(["scope"=>$data->scope], array("client_id"=>$data->client_id));
            $oauth_clients = new TableGateway('oauth_clients', $adapter);
            $oauth_clients->update(["scope"=>$data->scope], array("client_id"=>$data->client_id, "user_id"=>$data->username));
        }
        if($data->password || ($data->username && $data->username != $destinationUsername)) {
            $oauth_user_data = [];
            $oauth_client_data = [];
            $oauth_users = new TableGateway('oauth_users', $adapter);
            $oauth_clients = new TableGateway('oauth_clients', $adapter);
            if($data->password) {
                $oauth_user_data['password'] = $data->password;
            }
            if($data->username && $data->username != $destinationUsername) {
                $oauth_user_data['username'] = $data->username;
                $oauth_client_data['client_id'] = $data->client_id;
                $oauth_client_data['user_id'] = $data->username;
                $oauth_clients->update($oauth_client_data, array("user_id"=>$destinationUsername)); 
            }
            $oauth_users->update($oauth_user_data, array("username"=>$destinationUsername));

            // if($sessionUsername == $destinationUsername) {
                // log out
                $oauth_access_tokens = new TableGateway('oauth_access_tokens', $adapter);
                // $this->db->query('DELETE FROM `oauth_access_tokens` where access_token = "'.$identityArray['access_token'].'"', Adapter::QUERY_MODE_EXECUTE);
                $oauth_access_tokens->delete(array("user_id"=>$destinationUsername));
            // }
        }

        // Here is the catch  
        // $update = $this->tableGateway->getSql()->update();
        // $update->set($set);
        // $update->where($where);

        // // Execute the query
        // return $this->tableGateway->updateWith($update);
        // return $this->fetchOne($id);
    }
}