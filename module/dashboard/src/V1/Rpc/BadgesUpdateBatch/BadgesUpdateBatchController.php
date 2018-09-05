<?php
namespace dashboard\V1\Rpc\BadgesUpdateBatch;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class BadgesUpdateBatchController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function badgesUpdateBatchAction()
    {
        $body = $this->getRequest()->getContent();
        if (!empty($body)) {
            $body = json_decode($body, true);
            if (!empty($body)) {
                // return $json;
                // return new ViewModel($json);
                $list_id = implode(",", $body['ids']);
                $sql = 'UPDATE tb_badges'
                . ' SET status = "delete"'
                . ' WHERE _id in (' . $list_id . ')';
                $statement = $this->db->query($sql);
                $statement->execute();

                // $allUpdated = $this->db->query('select * from tb_badges where _id in ('.$list_id.')');
                // $results = $allUpdated->execute();
                // $row = $results->current();
                // echo $row;
                
                $result = $this->db->query('SELECT * FROM `tb_badges` where _id in ('.$list_id.')', Adapter::QUERY_MODE_EXECUTE);
                // $byId = {};
                $byId = [];
                $allIds = [];
                foreach ($result as $value) {
                    // echo $value['_id'];
                    $byId[$value['_id']] = $value;
                    array_push($allIds,$value['_id']);
                }
                return new ViewModel(['byId' => $byId, 'allIds' => $allIds]);
                // echo $result->count();// output total result
                // return new ViewModel([
                //     'ack' => time()
                // ]);
                // return new ViewModel($result);
                // $byId = {};
                // $allIds = [];
                // json_encode(array('byId' => $post_data);

                // $statement = $adapter->query('SELECT * FROM '
                // . $qi('artist')
                // . ' WHERE id = ' . $fp('id'));

                // /* @var $results Zend\Db\ResultSet\ResultSet */
                // $results = $statement->execute(array('id' => 1));

                // $row = $results->current();
                // $name = $row['name'];
                // return $row;
            }
        }

        // return $body;
    }
}
