<?php
namespace dashboard\V1\Rpc\ConferenceUpdateBatch;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ConferenceUpdateBatchControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new ConferenceUpdateBatchController($DB);
    }
}
