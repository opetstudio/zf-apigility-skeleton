<?php
namespace dashboard\V1\Rpc\ParticipantUpdateBatch;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class ParticipantUpdateBatchController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function participantUpdateBatchAction()
    {
        $body = $this->getRequest()->getContent();
        if (!empty($body)) {
            $body = json_decode($body, true);
            if (!empty($body)) {
                $list_id = implode(",", $body['ids']);
                $sql = 'UPDATE tb_participant'
                . ' SET status = "delete"'
                . ' WHERE _id in (' . $list_id . ')';
                $statement = $this->db->query($sql);
                $statement->execute();
                
               $result = $this->db->query('SELECT * FROM `tb_participant` where _id in ('.$list_id.')', Adapter::QUERY_MODE_EXECUTE);
                $byId = [];
                $allIds = [];
                foreach ($result as $value) {
                    $byId[$value['_id']] = $value;
                    array_push($allIds,$value['_id']);
                }
                return new ViewModel(['byId' => $byId, 'allIds' => $allIds]);
            }
        }
        return false;
    }
}
