<?php
namespace dashboard\V1\Rpc\BadgesBatchRemove;

use Interop\Container\ContainerInterface;
// use Psr\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class BadgesBatchRemoveControllerFactory implements FactoryInterface
{
    // public function __invoke($controllers)
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new BadgesBatchRemoveController($DB);
    }
}
