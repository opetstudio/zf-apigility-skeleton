<?php
namespace dashboard\V1\Rpc\GetLoginStatus;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GetLoginStatusControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new GetLoginStatusController($DB);
    }
}
