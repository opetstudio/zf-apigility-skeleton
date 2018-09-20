<?php
namespace dashboard\V1\Rpc\ClassEvaluatedParticipant;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ClassEvaluatedParticipantControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $DB = $container->get('mysqlpdo');
        return new ClassEvaluatedParticipantController($DB);
    }
}
