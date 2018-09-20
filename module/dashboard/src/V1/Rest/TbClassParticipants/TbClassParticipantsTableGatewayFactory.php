<?php
namespace dashboard\V1\Rest\TbClassParticipants;

use Psr\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TbClassParticipantsTableGatewayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbClassParticipantsTableGateway(
            'tb_class_participants',
            $container->get('mysqlpdo'),
            null,
            $this->getResultSetPrototype($container)
        );
    }

    private function getResultSetPrototype(ContainerInterface $container)
    {
        $hydrators = $container->get('HydratorManager');
        $hydrator = $hydrators->get(ArraySerializable::class);
        return new HydratingResultSet($hydrator, new TbClassParticipantsEntity());
    }
}