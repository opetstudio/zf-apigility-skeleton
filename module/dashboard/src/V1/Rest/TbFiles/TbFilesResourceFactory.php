<?php
namespace dashboard\V1\Rest\TbFiles;

use Psr\Container\ContainerInterface;

class TbFilesResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbFilesResource(
            $container->get(TbFilesTableGateway::class),
            '_id',
            TbCollection::class
        );
    }
}