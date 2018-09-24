<?php
namespace dashboard\V1\Rest\TbParticipant;

use Psr\Container\ContainerInterface;

class TbParticipantResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbParticipantResource(
            $container->get(TbParticipantTableGateway::class),
            '_id',
            TbParticipantCollection::class
        );
    }
}