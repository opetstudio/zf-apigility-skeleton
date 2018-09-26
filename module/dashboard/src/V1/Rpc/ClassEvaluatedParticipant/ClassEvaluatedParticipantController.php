<?php
namespace dashboard\V1\Rpc\ClassEvaluatedParticipant;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use DomainException;

use Zend\Validator\Db\RecordExists;

class ClassEvaluatedParticipantController extends AbstractActionController
{
    private $db;
    private $table = 'tb_classes';
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function classEvaluatedParticipantAction()
    {
        $body = $this->getRequest()->getContent();
        if (empty($body)) return new ViewModel(['status' => false, 'responseMessage' => 'body is empty']);
        $body = json_decode($body, true);

        $classId = $body['classId'];
        $participantId = $body['participantId'];

        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) return new ViewModel(['status' => false, 'responseMessage' => 'session timeout']);

        $session_client_id = $identityArray['client_id'];
        $session_username = $identityArray['user_id'];
        $userResultSet = $this->fetchOneUserByUsername($session_username);
        if ($userResultSet->count() === 0) throw new DomainException('Unauthorized', 401);
        $userDetail = $userResultSet->current(); 

        // class detail
        $classResultset = $this->db->query('SELECT * FROM `tb_classes` where _id = '.$classId, Adapter::QUERY_MODE_EXECUTE);
        if ($classResultset->count() === 0) throw new DomainException('class not found', 400);
        $classDetail = $classResultset->current();


        $adapter = $this->db;
        $validator = new RecordExists(
            array(
                'table'   => 'tb_class_participants',
                'field'   => 'class_id', 
                'adapter' => $adapter
            )
        );
        // $validator->getSelect()->reset('where');
        // $validator->getSelect()->where('class_id = '.$id);
        // $validator->getSelect()->where(array('participant_id' => $participantId));
        $validator->getSelect()->where('participant_id = '.$participantId.' and createdby = "'.$userDetail['_id'].'"');
        
        $tb_class_participants = new TableGateway('tb_class_participants', $adapter);
        $tb_inspect = new TableGateway('tb_inspect', $adapter);

        if ($validator->isValid($classId)) {
            // delete
            $sql = 'UPDATE tb_class_participants'
                . ' SET is_evaluated = 1'
                . ' WHERE class_id = '.$classId.' and participant_id = '.$participantId.'';
            $statement = $this->db->query($sql);
            $statement->execute();
            
            $sql2 = 'UPDATE tb_inspect SET is_evaluated = 1, user_id='.$userDetail['_id'].' WHERE class_id = '.$classId.' and participant_id = '.$participantId.'';
            $statement2 = $this->db->query($sql2);
            $statement2->execute();

            $result = $this->db->query('SELECT * FROM `tb_class_participants` where class_id = '.$classId.' and participant_id = '.$participantId.'', Adapter::QUERY_MODE_EXECUTE);
            // $resultSet = $this->table->fetchOneRecord($id);
            if ($result->count() === 0) {
                // throw new DomainException('record not found for id '.$id, 404);
            } else {
                $recDetail = $result->current();
                return new ViewModel(['status' => true, 'class_id'=>$class_id, 'participant_id'=>$participant_id, 'createdby'=>$userDetail['_id'], 'responseMessage'=>'success', 'data'=>$recDetail]); 
            }
            // $byId = [];
            // $allIds = [];
            // foreach ($result as $value) {
            //     $byId[$value['_id']] = $value;
            //     array_push($allIds,$value['_id']);
            // }
            // return new ViewModel(['status' => true, 'class_id' => $classId, 'participant_id' => $participantId, 'byId' => $byId, 'allIds' => $allIds]);
        } else {
           // participant_id is invalid; print the reason
            // $messages = $validator->getMessages();
            // foreach ($messages as $message) {
            //     echo "$message\n";
            // }
            // create new
            $tb_class_participants->insert([
                'class_id'=>$classId,
                'participant_id'=>$participantId,
                'status'=>'publish',
                'createdby'=>$userDetail['_id'],
                'modifiedby'=>$userDetail['_id'],
                'is_evaluated'=>1
                ]);
            $tb_inspect->insert([
                'class_id'=>$classId,
                'participant_id'=>$participantId,
                'badge_id'=>$session_username,
                'user_id'=>$userDetail['_id'],
                'is_evaluated'=>1
                ]);
        //         $gotch = $this->insert(json_decode(json_encode($data), true));
            // $lastInsertId = $tb_class_participants->getLastInsertValue();
            $result = $this->db->query('SELECT * FROM `tb_class_participants` where class_id = '.$classId.' and participant_id = '.$participantId.'', Adapter::QUERY_MODE_EXECUTE);
            if ($result->count() === 0) {
                // throw new DomainException('record not found for id '.$id, 404);
            } else {
                $recDetail = $result->current();
                return new ViewModel(['status' => true, 'class_id'=>$classId, 'participant_id'=>$participantId, 'createdby'=>$session_client_id, 'responseMessage'=>'success', 'data'=>$recDetail]);  
            }
        }
        return new ViewModel(['status' => false, 'class_id' => $classId, 'participant_id' => $participantId, 'createdby' => $session_username, 'responseMessage' => 'evaluated failed']);
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->db;
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
}
