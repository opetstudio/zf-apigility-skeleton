<?php
namespace dashboard\V1\Rpc\BadgesBatchRemove;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class BadgesBatchRemoveController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function badgesBatchRemoveAction()
    {
        // $body = $this->getRequest()->getRawBody();
        $data = $this->getRequest()->getContent();
        if (!empty($data)) {
            $json = json_decode($data, true);
            if (!empty($json)) {
                // return $json;
                // return new ViewModel($json);
            }
        }
        $list_id = implode(",", ['1', '2']);
        $sql = 'UPDATE tb_badges'
        . ' SET status = "delete"'
        . ' WHERE _id in (' . $list_id . ')';
        $statement = $this->db->query($sql);
        $statement->execute();

        // $data = Zend_Json::decode($data);
        // $my_post_var = $this->params()->fromPost('my_post_var', 'default_value');
        // $postVar = $this->params()->fromPost('var_name', 'default_val');
        // echo "data=".$data;
        // $result = $this->db->query('SELECT * FROM `tb_badges`', Adapter::QUERY_MODE_EXECUTE);
        // echo $result->count();// output total result
        // return new ViewModel([
        //     'ack' => time()
        // ]);
        // return new ViewModel($result);
        // return new ViewModel($json);
        return $json;
    }
}
