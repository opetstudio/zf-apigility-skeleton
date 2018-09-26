<?php
namespace dashboard\V1\Rpc\ClassesDeleteParticipant;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use DomainException;

use Zend\Validator\Db\RecordExists;

class ClassesDeleteParticipantController extends AbstractActionController
{
    private $db;
    private $table = 'tb_classes';
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function classesDeleteParticipantAction()
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

        if ($validator->isValid($classId)) {
            // delete
            $tb_class_participants = new TableGateway('tb_class_participants', $adapter);
            $tb_class_participants->delete(array("class_id"=>$classId, "participant_id"=>$participantId));
            $tb_inspect = new TableGateway('tb_inspect', $adapter);
            $tb_inspect->delete(array("class_id"=>$classId, "participant_id"=>$participantId));
            
            return new ViewModel(['status' => true, 'class_id' => $classId, 'participant_id' => $participantId]);
        } else {
           // participant_id is invalid; print the reason
            // $messages = $validator->getMessages();
            // foreach ($messages as $message) {
            //     echo "$message\n";
            // }
            return new ViewModel(['status' => true, 'class_id' => $classId, 'participant_id' => $participantId]);
        }
        return new ViewModel(['status' => false, 'class_id' => $classId, 'participant_id' => $participantId, 'createdby' => $userDetail['_id'], 'responseMessage' => 'remove failed']);
    }
    public function fetchOneUserByUsername($username) {
        $adapter = $this->db;
        $tb_users = new TableGateway('tb_users', $adapter);
        $select = $tb_users->getSql()->select();
        $select->where(['username' => $username]);
        return $tb_users->selectWith($select); 
    }
}
