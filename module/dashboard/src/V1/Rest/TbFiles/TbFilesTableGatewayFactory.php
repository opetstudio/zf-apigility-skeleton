<?php
namespace dashboard\V1\Rest\TbFiles;

use Psr\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Hydrator\ArraySerializable;

class TbFilesTableGatewayFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbFilesTableGateway(
            'tb_files',
            $container->get('mysqlpdo'),
            null,
            $this->getResultSetPrototype($container)
        );
    }

    private function getResultSetPrototype(ContainerInterface $container)
    {
        $hydrators = $container->get('HydratorManager');
        $hydrator = $hydrators->get(ArraySerializable::class);
        return new HydratingResultSet($hydrator, new TbFilesEntity());
    }
}