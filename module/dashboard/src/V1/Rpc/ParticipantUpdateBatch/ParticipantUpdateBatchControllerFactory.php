<?php
namespace dashboard\V1\Rpc\ParticipantUpdateBatch;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ParticipantUpdateBatchControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new ParticipantUpdateBatchController($DB);
    }
}
