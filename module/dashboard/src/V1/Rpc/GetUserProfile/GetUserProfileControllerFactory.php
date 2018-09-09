<?php
namespace dashboard\V1\Rpc\GetUserProfile;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GetUserProfileControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new GetUserProfileController($DB);
    }
}
