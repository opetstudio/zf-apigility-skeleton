<?php
namespace dashboard\V1\Rpc\GetLoginStatus;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class GetLoginStatusController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function getLoginStatusAction()
    {
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) return new ViewModel(['status' => false, 'responseMessage' => 'session timeout']);
        return new ViewModel([
            'status' => true,
            'responseMessage' => 'success'
            ]);
    }
}
