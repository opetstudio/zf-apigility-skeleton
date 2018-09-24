<?php
namespace dashboard\V1\Rest\TbParticipant;

use Psr\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TbParticipantTableGatewayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbParticipantTableGateway(
            'tb_participant',
            $container->get('mysqlpdo'),
            null,
            $this->getResultSetPrototype($container)
        );
    }

    private function getResultSetPrototype(ContainerInterface $container)
    {
        $hydrators = $container->get('HydratorManager');
        $hydrator = $hydrators->get(ArraySerializable::class);
        return new HydratingResultSet($hydrator, new TbParticipantEntity());
    }
}