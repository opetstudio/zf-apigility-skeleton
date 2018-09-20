<?php
namespace dashboard\V1\Rest\TbClasses;

use Zend\Db\TableGateway\TableGateway;
use Zend\Validator\Db\NoRecordExists;
use Zend\Validator\Db\RecordExists;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\Sql\Select;
use DomainException;

class TbClassesTableGateway extends TableGateway
{
    protected $id = '_id';
    protected $tb_class_participants = 'tb_class_participants';
    protected $tb_participant = 'tb_participant';
    public function fetchOneRecord($id) {
        $table = $this->getTable();
        $select = $this->getSql()->select();
        $select->where([$this->id => $id]);
        return $this->selectWith($select);
    }
    public function createNew($data) {
        $dataObj = json_decode(json_encode($data), true);
        $candidateNewData = $dataObj;
        unset($candidateNewData['class_participants']);
        $gotch = $this->insert($candidateNewData, true);
        $lastInsertId = $this->getLastInsertValue();
        $adapter = $this->getAdapter();
        $newDataResultSet = $this->fetchOneRecord($lastInsertId);
        if ($newDataResultSet->count() === 0) {
            throw new DomainException('New Record not found', 404);
        }
        $newDataRecord = $newDataResultSet->current();

        $tb_participant = new TableGateway($this->tb_participant, $adapter);
        $tb_class_participants = new TableGateway($this->tb_class_participants, $adapter);

        foreach ($dataObj['class_participants'] as $participant_id) {
            $participant_select = $tb_participant->getSql()->select();
            $participant_select->where(['_id' => $participant_id]);
            $tb_participant_resultset = $tb_participant->selectWith($participant_select);
            if ($tb_participant_resultset->count() > 0) {
                $participant_detail = $tb_participant_resultset->current();
                // echo $participant_detail->uuid;
                // print_r($tb_class_participants_resultset);
                // print_r($participant_detail);
                $tb_class_participants->insert([
                    'class_id'=>$newDataRecord['_id'],
                    'status'=>'publish',
                    'participant_id'=>$participant_detail->_id,
                    'createdby'=>$newDataRecord['createdby'],
                    'modifiedby'=>$newDataRecord['createdby']
                ]);
            }
        }

        return $newDataRecord;
    }
    public function updateData($id, $data) {
        $dataObj = json_decode(json_encode($data), true);
        $candidateNewData = $dataObj;
        unset($candidateNewData['class_participants']); 
        $adapter = $this->getAdapter();
        $where = array($this->id => $id);
        // $where = array($this->identifierName => $id);
        // $where = ['._id' => $id];

        // $tb_class_participants = new TableGateway($this->tb_class_participants, $adapter);

        $this->update(json_decode(json_encode($candidateNewData), true), $where);

        // foreach ($dataObj['class_participants'] as $participant_id) {
        //     $participant_detail = $tb_participant_resultset->current(); 
        // }

        $query = 'INSERT INTO ' . $this->tb_class_participants . ' (`class_id`, `status`, `participant_id`, `createdby`, `modifiedby`) VALUES ';
        $queryVals = array();

         foreach ($dataObj['class_participants'] as $participant_id) {
              if($participant_id){
                // echo $participant_id;
                // $select = new Select();
                // $select->from($this->tb_class_participants)
                //        ->where->equalTo('class_id', $id);
                    //    ->where->equalTo('participant_id', $participant_id);
                // $validator = new NoRecordExists(
                //     array(
                //         'table'   =>  $this->tb_class_participants,
                //         'field'   => 'participant_id',
                //         'exclude' => array(
                //             'field' => 'class_id',
                //             'value' => $class_id
                //         ),
                //         'adapter' => $adapter
                //     )
                // );

                $validator = new NoRecordExists(
                    array(
                        'table'   => $this->tb_class_participants,
                        'field'   => 'class_id', 
                        'adapter' => $adapter
                    )
                );
                // $validator->getSelect()->reset('where');
                // $validator->getSelect()->where('class_id = '.$id);
                $validator->getSelect()->where('participant_id = '.$participant_id);
                
                    
                
                // $validator = new NoRecordExists($select);
                // We still need to set our database adapter
                // $validator->setAdapter($adapter);
                
                // Validation is then performed as usual
                if ($validator->isValid($id)) {
                // if ($validator->isValid()) {
                    // participant_id appears to be valid
                    $queryVals[] = "('".$id."', 'publish', '".$participant_id."', '".$candidateNewData["modifiedby"]."', '".$candidateNewData["modifiedby"]."')";  
                }
                else {
                    // participant_id is invalid; print the reason
                    // $messages = $validator->getMessages();
                    // foreach ($messages as $message) {
                    //     echo "$message\n";
                    // }
                }

                // $validator = new NoRecordExists(
                //     array(
                //         'table'   => 'class_participants',
                //         'field'   => 'username',
                //         'adapter' => $dbAdapter
                //     )
                // );
                // if ($validator->isValid($username)) {
                //     // username appears to be valid
                // } else {
                //     // username is invalid; print the reason
                //     $messages = $validator-`>getMessages();
                //     foreach ($messages as $message) {
                //         echo "$message\n";
                //     }`
                // }
                
              }
         }
        if (!empty($queryVals)) {
            // print_r($queryVals);
            $adapter->query($query . implode(',', $queryVals))->execute();
        }

        // $gotch = $this->insert(json_decode(json_encode($data), true));
        // $lastInsertId = $this->getLastInsertValue();
        // $adapter = $this->getAdapter();
        // return $this->fetchOneRecord($id);
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->getAdapter();
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
}