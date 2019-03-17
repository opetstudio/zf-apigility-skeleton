<?php
namespace dashboard\V1\Rest\TbEvent;

use Psr\Container\ContainerInterface;

class TbEventResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbEventResource(
            $container->get(TbEventTableGateway::class),
            '_id',
            TbEventCollection::class
        );
    }
}