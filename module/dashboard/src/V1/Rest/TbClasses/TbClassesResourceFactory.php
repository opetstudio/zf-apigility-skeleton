<?php
namespace dashboard\V1\Rest\TbClasses;

use Psr\Container\ContainerInterface;

class TbClassesResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbClassesResource(
            $container->get(TbClassesTableGateway::class),
            '_id',
            TbClassesCollection::class
        );
    }
}