<?php
namespace dashboard\V1\Rpc\ClassesUpdateBatch;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ClassesUpdateBatchControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new ClassesUpdateBatchController($DB);
    }
}
