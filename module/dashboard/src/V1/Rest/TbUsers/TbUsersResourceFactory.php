<?php
namespace dashboard\V1\Rest\TbUsers;

use Psr\Container\ContainerInterface;

class TbUsersResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbUsersResource(
            $container->get(TbUsersTableGateway::class),
            'id',
            TbUsersCollection::class
        );
    }
}