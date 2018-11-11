<?php
namespace dashboard\V1\Rpc\FilesUpdateBatch;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class FilesUpdateBatchController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function filesUpdateBatchAction()
    {
        $body = $this->getRequest()->getContent();
        if (!empty($body)) {
            $body = json_decode($body, true);
            if (!empty($body)) {
                $list_id = implode(",", $body['ids']);
                $sql = 'UPDATE tb_files'
                . ' SET status = "delete"'
                . ' WHERE _id in (' . $list_id . ')';
                $statement = $this->db->query($sql);
                $statement->execute();
                
               $result = $this->db->query('SELECT * FROM `tb_files` where _id in ('.$list_id.')', Adapter::QUERY_MODE_EXECUTE);
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
