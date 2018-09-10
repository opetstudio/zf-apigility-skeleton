<?php
namespace dashboard\V1\Rest\TbClasses;

use Psr\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TbClassesTableGatewayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbClassesTableGateway(
            'tb_classes',
            $container->get('mysqlpdo'),
            null,
            $this->getResultSetPrototype($container)
        );
    }

    private function getResultSetPrototype(ContainerInterface $container)
    {
        $hydrators = $container->get('HydratorManager');
        $hydrator = $hydrators->get(ArraySerializable::class);
        return new HydratingResultSet($hydrator, new TbClassesEntity());
    }
}