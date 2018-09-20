<?php
namespace dashboard\V1\Rpc\ClassesDeleteParticipant;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ClassesDeleteParticipantControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new ClassesDeleteParticipantController($DB);
    }
}
