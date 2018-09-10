<?php
namespace dashboard\V1\Rpc\Logout;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class LogoutController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function logoutAction()
    {
        // $body = $this->getRequest()->getContent();
        // $access_token = $this->params()->fromRoute('access_token');
        $identityArray= $this->getIdentity()->getAuthenticationIdentity();
        if(!$identityArray) return new ViewModel(['status' => false, 'responseMessage' => 'session timeout']);
        // $client_id = $identityArray['client_id'];
        // $username = $identityArray['user_id'];
        $this->db->query('DELETE FROM `oauth_access_tokens` where access_token = "'.$identityArray['access_token'].'"', Adapter::QUERY_MODE_EXECUTE);

        return new ViewModel([
            'status' => true,
            'current_access_token' => $identityArray['access_token'],
            'responseMessage' => 'success'
            ]);
    }
}
