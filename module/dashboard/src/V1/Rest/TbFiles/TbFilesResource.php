<?php
namespace dashboard\V1\Rest\TbFiles;

use DomainException;
use ZF\Apigility\DbConnectedResource;
use ZF\MvcAuth\Identity\AuthenticatedIdentity;
use Zend\Crypt\Password\Bcrypt;

class TbFilesResource extends DbConnectedResource
{
    protected $whitelistType = array("txt" => "text/plain", "csv" => "text/csv");
    protected function uploadFile($fileContent, $nowUnixTime) {
        $result = [];
        $tmp_name = $fileContent['tmp_name'];
        $ori_name = $fileContent['name'];
        $type = $fileContent['type'];
        $newType = array_search($type, $this->whitelistType);
        $size = $fileContent['size'];
        $new_name = $nowUnixTime;
        $file = $tmp_name;
        $fileCurrentContent = file_get_contents($file);
        $fileNewName = $new_name.'.'.$newType;
        if($newType == NULL || $newType == "") throw new DomainException('Unsupported Media Type', 415); // 415 Unsupported Media Type
        if($newType != NULL) file_put_contents('upload/'.$fileNewName, $fileCurrentContent);
        $result["fileNewName"] = $fileNewName;
        $result["ori_name"] = $ori_name;
        $result["tmp_name"] = $tmp_name;
        $result["type"] = $type;
        $result["newType"] = $newType;
        $result["size"] = $size;
        return $result;
    }
    public function create($data) {
        $bcrypt = new Bcrypt();
        $nowUnixTime = round(microtime(true) * 1000);
        $new_name = $nowUnixTime;
        // if(!$this->getIdentity() instanceof AuthenticatedIdentity) {
        //     return [];
        // }
        // $inputFilter = $this->getInputFilter();
        // $data2 = $inputFilter->getValues();
        // print_r($data2);
        // $image = $data2['image'];

         // this array returyour query here using $userIdns the authentication info
        // in this case we need the 'user_id' 
         // check oauth
         $identityArray= $this->getIdentity()->getAuthenticationIdentity();
         if(!$identityArray) throw new DomainException('Unauthorized', 401);

        $client_id = $identityArray['client_id'];
        $username = $identityArray['user_id'];
        $currentUserSet = $this->table->fetchOneUserByUsername($username);
        if ($currentUserSet->count() === 0) throw new DomainException('Unauthorized', 401);
        $currentUser = $currentUserSet->current();

        // echo "tosss";
        // $request = $this->getRequest();
        $fileContent = $data->filecontent;
        if($fileContent) {
            $uploadFile = $this->uploadFile($fileContent, $nowUnixTime);
            $data->file_name_origin = $uploadFile["ori_name"];
            $data->file_name = $uploadFile["fileNewName"];
            $data->file_ext = $uploadFile["newType"];
            $data->file_size = $uploadFile["size"];
        }
        // file_put_contents('tesss.jpg', $tmp_name);
        // print_r($request);
        // print_r($imageContent);
        // print_r($data);

        //  $oauthClientSet = $this->table->getOauthClient($client_id, $username);
        //  if ($oauthClientSet->count() === 0) {
        //      throw new DomainException('User not found', 404);
        //  }
        //  $oauthClient = $oauthClientSet->current();
        //  $scope = $oauthClient['scope'];
        //  $scope = (int) $currentUser['scope'];
         // end check oauth        // $currentUserSet = $this->table->fetchOneByUsername($username);
        // if ($currentUserSet->count() === 0) {
        //     throw new DomainException('User not found', 404);
        // }
        // $currentUser = $currentUserSet->current();
        

        // if($scope > 10) throw new DomainException('Forbidden', 4043);
        // $result = json_decode($identityArray, true);
        // print_r($result);
        // note, by default user_id is the email (username column in oauth_users table)
        // $userId = $identityArray['user_id']; 
        // $data->createdby = $currentUser['_id'];
        // $data->modifiedby = $currentUser['_id'];
        // $data->status = 'publish';
        // $data->password = $bcrypt->create($data->password);
        // print_r($data);
        // $data['createdby'] = $identityArray['user_id'];

        $data->status = "publish";
        $data->createdon = $nowUnixTime;
        $data->modifiedon = $nowUnixTime;
        $data->createdby =$currentUser['_id'];
        $data->modifiedby =$currentUser['_id'];
        unset($data->filecontent);
        return $this->table->createNew($data);
    }
    public function patch($id, $data) {
        $nowUnixTime = round(microtime(true) * 1000);
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

        // upload file if not empty
        $fileContent = $data->filecontent;
        if($fileContent) {
            $uploadFile = $this->uploadFile($fileContent, $nowUnixTime);
            $data->file_name_origin = $uploadFile["ori_name"];
            $data->file_name = $uploadFile["fileNewName"];
            $data->file_ext = $uploadFile["newType"];
            $data->file_size = $uploadFile["size"];
        }

        // if($recDetail['fasilitator'] != $userDetail['_id']) throw new DomainException('forbidden fasilitator('.$recDetail['fasilitator'].') for username '.$username, 404);

        // $data->fasilitator = $identityArray['user_id'];
        // $data->createdby = $identityArray['user_id'];
        
        $data->status = ($data->status) ? $data->status : "publish";

        $data->modifiedon = $nowUnixTime;
        $data->modifiedby =$userDetail['_id'];
        unset($data->filecontent);

        $this->table->updateData($id, $data);
        $resultSet = $this->table->fetchOneRecord($id);
        if ($resultSet->count() === 0) {
            throw new DomainException('record not found', 404);
        }
        return $resultSet->current();
    }
}