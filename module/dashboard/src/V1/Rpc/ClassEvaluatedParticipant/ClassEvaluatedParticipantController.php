<?php
namespace dashboard\V1\Rpc\ClassEvaluatedParticipant;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;

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
        $validator->getSelect()->where('participant_id = '.$participantId.' and createdby = "'.$session_username.'"');

        if ($validator->isValid($classId)) {
            // delete
            $tb_class_participants = new TableGateway('tb_class_participants', $adapter);

            $sql = 'UPDATE tb_class_participants'
                . ' SET is_evaluated = 1'
                . ' WHERE class_id = '.$classId.' and participant_id = '.$participantId.'';
            $statement = $this->db->query($sql);
            $statement->execute();

            $result = $this->db->query('SELECT * FROM `tb_class_participants` where class_id = '.$classId.' and participant_id = '.$participantId.'', Adapter::QUERY_MODE_EXECUTE);
            // $resultSet = $this->table->fetchOneRecord($id);
            if ($result->count() === 0) {
                // throw new DomainException('record not found for id '.$id, 404);
            } else {
                $recDetail = $result->current();
                return new ViewModel($recDetail); 
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
        }
        return new ViewModel(['status' => false, 'class_id' => $classId, 'participant_id' => $participantId, 'createdby' => $session_username, 'responseMessage' => 'evaluated failed']);
    }
}
