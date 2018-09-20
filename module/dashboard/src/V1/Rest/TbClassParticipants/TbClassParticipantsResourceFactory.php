<?php
namespace dashboard\V1\Rest\TbClassParticipants;

use Psr\Container\ContainerInterface;

class TbClassParticipantsResourceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new TbClassParticipantsResource(
            $container->get(TbClassParticipantsTableGateway::class),
            '_id',
            TbClassParticipantsCollection::class
        );
    }
}