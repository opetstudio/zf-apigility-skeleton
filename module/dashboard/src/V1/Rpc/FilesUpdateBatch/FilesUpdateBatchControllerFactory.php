<?php
namespace dashboard\V1\Rpc\FilesUpdateBatch;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class FilesUpdateBatchControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new FilesUpdateBatchController($DB);
    }
}
