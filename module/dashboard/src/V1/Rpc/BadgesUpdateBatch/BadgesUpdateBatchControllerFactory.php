<?php
namespace dashboard\V1\Rpc\BadgesUpdateBatch;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class BadgesUpdateBatchControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new BadgesUpdateBatchController($DB);
    }
}
