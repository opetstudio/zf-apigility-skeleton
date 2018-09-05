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
        $result = $this->db->query('SELECT * FROM `tb_badges`', Adapter::QUERY_MODE_EXECUTE);
        // echo $result->count();// output total result
        // return new ViewModel([
        //     'ack' => time()
        // ]);
        return new ViewModel($result);
    }
}
