<?php
namespace dashboard\V1\Rest\TbEvent;

use Psr\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TbEventTableGatewayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbEventTableGateway(
            'tb_event',
            $container->get('mysqlpdo'),
            null,
            $this->getResultSetPrototype($container)
        );
    }

    private function getResultSetPrototype(ContainerInterface $container)
    {
        $hydrators = $container->get('HydratorManager');
        $hydrator = $hydrators->get(ArraySerializable::class);
        return new HydratingResultSet($hydrator, new TbEventEntity());
    }
}