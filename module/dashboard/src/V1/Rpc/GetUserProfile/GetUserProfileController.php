<?php
namespace dashboard\V1\Rpc\GetUserProfile;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;
use Zend\Db\Adapter\Adapter;

class GetUserProfileController extends AbstractActionController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getUserProfileAction()
    {
        $access_token_or_username = $this->params()->fromRoute('access_token_or_username');
        // $access_token_or_username;
        $resultSet = $this->db->query('SELECT * FROM `oauth_access_tokens` where `access_token` = "'.$access_token_or_username.'"', Adapter::QUERY_MODE_EXECUTE);
        if ($resultSet->count() === 0) {
            throw new DomainException('User not found', 404);
        }
        $oauth_access_tokens = $resultSet->current();

        $resultSet = $this->db->query('SELECT * FROM `tb_users` where `username` = "'.$oauth_access_tokens['user_id'].'"', Adapter::QUERY_MODE_EXECUTE);
        if ($resultSet->count() === 0) {
            throw new DomainException('User not found', 404);
        }

        // echo "user_id:".$oauth_access_tokens['user_id'];
        return new ViewModel($resultSet->current());
    }
}
