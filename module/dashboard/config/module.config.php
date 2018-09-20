<?php
return [
    'router' => [
        'routes' => [
            'dashboard.rest.movies' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/movies[/:movies_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\Movies\\Controller',
                    ],
                ],
            ],
            'dashboard.rest.tb-badges' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/badges[/:tb_badges_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbBadges\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.badges-batch-remove' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/badgesBatchRemove',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller',
                        'action' => 'badgesBatchRemove',
                    ],
                ],
            ],
            'dashboard.rpc.badges-update-batch' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/badges-update-batch',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller',
                        'action' => 'badgesUpdateBatch',
                    ],
                ],
            ],
            'dashboard.rpc.csvtojson' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/csv-to-json',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\Csvtojson\\Controller',
                        'action' => 'csvtojson',
                    ],
                ],
            ],
            'dashboard.rest.tb-conference' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/conferences[/:tb_conference_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbConference\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.conference-update-batch' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/conferences-update-batch',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller',
                        'action' => 'conferenceUpdateBatch',
                    ],
                ],
            ],
            'dashboard.rest.tb-participant' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/participants[/:tb_participant_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbParticipant\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.participant-update-batch' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/participants-update-batch',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller',
                        'action' => 'participantUpdateBatch',
                    ],
                ],
            ],
            'dashboard.rest.tb-users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:tb_users_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbUsers\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.get-user-profile' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/getUserProfile/:access_token_or_username',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\GetUserProfile\\Controller',
                        'action' => 'getUserProfile',
                    ],
                ],
            ],
            'dashboard.rest.tb-classes' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/classes[/:tb_classes_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbClasses\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.logout' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\Logout\\Controller',
                        'action' => 'logout',
                    ],
                ],
            ],
            'dashboard.rpc.get-login-status' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/get-login-status',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller',
                        'action' => 'getLoginStatus',
                    ],
                ],
            ],
            'dashboard.rest.tb-class-participants' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/classparticipants[/:tb_class_participants_id]',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rest\\TbClassParticipants\\Controller',
                    ],
                ],
            ],
            'dashboard.rpc.classes-update-batch' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/classes-update-batch',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller',
                        'action' => 'classesUpdateBatch',
                    ],
                ],
            ],
            'dashboard.rpc.classes-delete-participant' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/classes-delete-participant',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller',
                        'action' => 'classesDeleteParticipant',
                    ],
                ],
            ],
            'dashboard.rpc.class-evaluated-participant' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/class-evaluated-participant',
                    'defaults' => [
                        'controller' => 'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller',
                        'action' => 'classEvaluatedParticipant',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'dashboard.rest.movies',
            1 => 'dashboard.rest.tb-badges',
            2 => 'dashboard.rpc.badges-batch-remove',
            3 => 'dashboard.rpc.badges-update-batch',
            4 => 'dashboard.rpc.csvtojson',
            5 => 'dashboard.rest.tb-conference',
            7 => 'dashboard.rpc.conference-update-batch',
            8 => 'dashboard.rest.tb-participant',
            9 => 'dashboard.rpc.participant-update-batch',
            10 => 'dashboard.rest.tb-users',
            11 => 'dashboard.rpc.get-user-profile',
            12 => 'dashboard.rest.tb-classes',
            13 => 'dashboard.rpc.logout',
            14 => 'dashboard.rpc.get-login-status',
            15 => 'dashboard.rpc.get-login-status',
            16 => 'dashboard.rest.tb-class-participants',
            17 => 'dashboard.rpc.classes-update-batch',
            18 => 'dashboard.rpc.classes-delete-participant',
            19 => 'dashboard.rpc.class-evaluated-participant',
        ],
    ],
    'zf-rest' => [
        'dashboard\\V1\\Rest\\Movies\\Controller' => [
            'listener' => 'dashboard\\V1\\Rest\\Movies\\MoviesResource',
            'route_name' => 'dashboard.rest.movies',
            'route_identifier_name' => 'movies_id',
            'collection_name' => 'movies',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\Movies\MoviesEntity::class,
            'collection_class' => \dashboard\V1\Rest\Movies\MoviesCollection::class,
            'service_name' => 'movies',
        ],
        'dashboard\\V1\\Rest\\TbBadges\\Controller' => [
            'listener' => 'dashboard\\V1\\Rest\\TbBadges\\TbBadgesResource',
            'route_name' => 'dashboard.rest.tb-badges',
            'route_identifier_name' => 'tb_badges_id',
            'collection_name' => 'tb_badges',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbBadges\TbBadgesEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbBadges\TbBadgesCollection::class,
            'service_name' => 'tb_badges',
        ],
        'dashboard\\V1\\Rest\\TbConference\\Controller' => [
            'listener' => 'dashboard\\V1\\Rest\\TbConference\\TbConferenceResource',
            'route_name' => 'dashboard.rest.tb-conference',
            'route_identifier_name' => 'tb_conference_id',
            'collection_name' => 'tb_conference',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbConference\TbConferenceEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbConference\TbConferenceCollection::class,
            'service_name' => 'tb_conference',
        ],
        'dashboard\\V1\\Rest\\TbParticipant\\Controller' => [
            'listener' => 'dashboard\\V1\\Rest\\TbParticipant\\TbParticipantResource',
            'route_name' => 'dashboard.rest.tb-participant',
            'route_identifier_name' => 'tb_participant_id',
            'collection_name' => 'tb_participant',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbParticipant\TbParticipantEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbParticipant\TbParticipantCollection::class,
            'service_name' => 'tb_participant',
        ],
        'dashboard\\V1\\Rest\\TbUsers\\Controller' => [
            'listener' => \dashboard\V1\Rest\TbUsers\TbUsersResource::class,
            'route_name' => 'dashboard.rest.tb-users',
            'route_identifier_name' => 'tb_users_id',
            'collection_name' => 'tb_users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbUsers\TbUsersEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbUsers\TbUsersCollection::class,
            'service_name' => 'tb_users',
        ],
        'dashboard\\V1\\Rest\\TbClasses\\Controller' => [
            'listener' => \dashboard\V1\Rest\TbClasses\TbClassesResource::class,
            'route_name' => 'dashboard.rest.tb-classes',
            'route_identifier_name' => 'tb_classes_id',
            'collection_name' => 'tb_classes',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbClasses\TbClassesEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbClasses\TbClassesCollection::class,
            'service_name' => 'tb_classes',
        ],
        'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => [
            'listener' => \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsResource::class,
            'route_name' => 'dashboard.rest.tb-class-participants',
            'route_identifier_name' => 'tb_class_participants_id',
            'collection_name' => 'tb_class_participants',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [
                0 => 'class_id',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsEntity::class,
            'collection_class' => \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsCollection::class,
            'service_name' => 'tb_class_participants',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'dashboard\\V1\\Rest\\Movies\\Controller' => 'HalJson',
            'dashboard\\V1\\Rest\\TbBadges\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => 'Json',
            'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => 'Json',
            'dashboard\\V1\\Rpc\\Csvtojson\\Controller' => 'Json',
            'dashboard\\V1\\Rest\\TbConference\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => 'Json',
            'dashboard\\V1\\Rest\\TbParticipant\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller' => 'Json',
            'dashboard\\V1\\Rest\\TbUsers\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => 'Json',
            'dashboard\\V1\\Rest\\TbClasses\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\Logout\\Controller' => 'Json',
            'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => 'Json',
            'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => 'Json',
            'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => 'Json',
            'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'dashboard\\V1\\Rest\\Movies\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbBadges\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rpc\\Csvtojson\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rest\\TbConference\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rest\\TbParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rest\\TbUsers\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rest\\TbClasses\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\Logout\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
            'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'dashboard\\V1\\Rest\\Movies\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbBadges\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\Csvtojson\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbConference\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbUsers\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbClasses\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\Logout\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
            'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => [
                0 => 'application/vnd.dashboard.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \dashboard\V1\Rest\Movies\MoviesEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.movies',
                'route_identifier_name' => 'movies_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\Movies\MoviesCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.movies',
                'route_identifier_name' => 'movies_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbBadges\TbBadgesEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-badges',
                'route_identifier_name' => 'tb_badges_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbBadges\TbBadgesCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-badges',
                'route_identifier_name' => 'tb_badges_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbConference\TbConferenceEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-conference',
                'route_identifier_name' => 'tb_conference_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbConference\TbConferenceCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-conference',
                'route_identifier_name' => 'tb_conference_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbParticipant\TbParticipantEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-participant',
                'route_identifier_name' => 'tb_participant_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbParticipant\TbParticipantCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-participant',
                'route_identifier_name' => 'tb_participant_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbUsers\TbUsersEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-users',
                'route_identifier_name' => 'tb_users_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbUsers\TbUsersCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-users',
                'route_identifier_name' => 'tb_users_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbClasses\TbClassesEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-classes',
                'route_identifier_name' => 'tb_classes_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbClasses\TbClassesCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-classes',
                'route_identifier_name' => 'tb_classes_id',
                'is_collection' => true,
            ],
            \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsEntity::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-class-participants',
                'route_identifier_name' => 'tb_class_participants_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsCollection::class => [
                'entity_identifier_name' => '_id',
                'route_name' => 'dashboard.rest.tb-class-participants',
                'route_identifier_name' => 'tb_class_participants_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'dashboard\\V1\\Rest\\Movies\\MoviesResource' => [
                'adapter_name' => 'mysqlpdo',
                'table_name' => 'movies',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'dashboard\\V1\\Rest\\Movies\\Controller',
                'entity_identifier_name' => '_id',
                'table_service' => 'dashboard\\V1\\Rest\\Movies\\MoviesResource\\Table',
            ],
            'dashboard\\V1\\Rest\\TbBadges\\TbBadgesResource' => [
                'adapter_name' => 'mysqlpdo',
                'table_name' => 'tb_badges',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'dashboard\\V1\\Rest\\TbBadges\\Controller',
                'entity_identifier_name' => '_id',
                'table_service' => 'dashboard\\V1\\Rest\\TbBadges\\TbBadgesResource\\Table',
            ],
            'dashboard\\V1\\Rest\\TbConference\\TbConferenceResource' => [
                'adapter_name' => 'mysqlpdo',
                'table_name' => 'tb_conference',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'dashboard\\V1\\Rest\\TbConference\\Controller',
                'entity_identifier_name' => '_id',
                'table_service' => 'dashboard\\V1\\Rest\\TbConference\\TbConferenceResource\\Table',
            ],
            'dashboard\\V1\\Rest\\TbParticipant\\TbParticipantResource' => [
                'adapter_name' => 'mysqlpdo',
                'table_name' => 'tb_participant',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'dashboard\\V1\\Rest\\TbParticipant\\Controller',
                'entity_identifier_name' => '_id',
                'table_service' => 'dashboard\\V1\\Rest\\TbParticipant\\TbParticipantResource\\Table',
            ],
        ],
    ],
    'zf-content-validation' => [
        'dashboard\\V1\\Rest\\Movies\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\Movies\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbBadges\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbBadges\\Validator',
        ],
        'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbConference\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbConference\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbParticipant\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbParticipant\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbUsers\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbUsers\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbClasses\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbClasses\\Validator',
        ],
        'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => [
            'input_filter' => 'dashboard\\V1\\Rest\\TbClassParticipants\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'dashboard\\V1\\Rest\\Movies\\Validator' => [
            0 => [
                'name' => 'avatar',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'cover',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'createdby',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'createdon',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            4 => [
                'name' => 'modifiedon',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            5 => [
                'name' => 'provider',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            7 => [
                'name' => 'subprovider',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            8 => [
                'name' => 'subtitle',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            9 => [
                'name' => 'title',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            10 => [
                'name' => 'url',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
        ],
        'dashboard\\V1\\Rest\\TbBadges\\Validator' => [
            0 => [
                'name' => 'badge_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'mysqlpdo',
                            'table' => 'tb_badges',
                            'field' => 'badge_name',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'badge_number',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'mysqlpdo',
                            'table' => 'tb_badges',
                            'field' => 'badge_number',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '10',
                        ],
                    ],
                ],
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'status',
                'description' => 'record status: draft, publish, delete',
            ],
        ],
        'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ack',
            ],
        ],
        'dashboard\\V1\\Rest\\TbConference\\Validator' => [
            0 => [
                'name' => 'conference_code',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'mysqlpdo',
                            'table' => 'tb_conference',
                            'field' => 'conference_code',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'conference_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'status',
            ],
        ],
        'dashboard\\V1\\Rest\\TbParticipant\\Validator' => [
            0 => [
                'name' => 'address',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'church',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'conference',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '20',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'email',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'first_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'last_name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '50',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'phone_number',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '20',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => 'profile_picture',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '150',
                        ],
                    ],
                ],
            ],
            8 => [
                'name' => 'status',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'dashboard\\V1\\Rest\\TbUsers\\Validator' => [
            0 => [
                'name' => 'username',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'mysqlpdo',
                            'table' => 'tb_users',
                            'field' => 'username',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'email',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbNoRecordExists',
                        'options' => [
                            'adapter' => 'mysqlpdo',
                            'table' => 'tb_users',
                            'field' => 'email',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'password',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '150',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'scope',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'first_name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'last_name',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'phone_number',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '15',
                        ],
                    ],
                ],
            ],
            7 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'status',
            ],
        ],
        'dashboard\\V1\\Rest\\TbClasses\\Validator' => [
            0 => [
                'name' => 'badge',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '15',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'starting_date',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '15',
                            'min' => '1',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '200',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'status',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '15',
                            'min' => '1',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'venue',
            ],
            5 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'class_participants',
            ],
        ],
        'dashboard\\V1\\Rest\\TbClassParticipants\\Validator' => [
            0 => [
                'name' => 'uuid',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'status',
                'required' => true,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'modifiedon',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            3 => [
                'name' => 'createdon',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            4 => [
                'name' => 'createdby',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'modifiedby',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '100',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'dashboard\\V1\\Rest\\Movies\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'dashboard\\V1\\Rest\\TbBadges\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
                'actions' => [
                    'BadgesBatchRemove' => [
                        'GET' => false,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => [
                'actions' => [
                    'ConferenceUpdateBatch' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => [
                'actions' => [
                    'GetUserProfile' => [
                        'GET' => true,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => [
                'actions' => [
                    'GetLoginStatus' => [
                        'GET' => true,
                        'POST' => false,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rest\\TbClassParticipants\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => [
                'actions' => [
                    'BadgesUpdateBatch' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => [
                'actions' => [
                    'ClassesUpdateBatch' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => [
                'actions' => [
                    'ClassesDeleteParticipant' => [
                        'GET' => true,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
            'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => [
                'actions' => [
                    'ClassEvaluatedParticipant' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \dashboard\V1\Rest\TbUsers\TbUsersResource::class => \dashboard\V1\Rest\TbUsers\TbUsersResourceFactory::class,
            \dashboard\V1\Rest\TbUsers\TbUsersTableGateway::class => \dashboard\V1\Rest\TbUsers\TbUsersTableGatewayFactory::class,
            \dashboard\V1\Rest\TbClasses\TbClassesResource::class => \dashboard\V1\Rest\TbClasses\TbClassesResourceFactory::class,
            \dashboard\V1\Rest\TbClasses\TbClassesTableGateway::class => \dashboard\V1\Rest\TbClasses\TbClassesTableGatewayFactory::class,
            \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsResource::class => \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsResourceFactory::class,
            \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsTableGateway::class => \dashboard\V1\Rest\TbClassParticipants\TbClassParticipantsTableGatewayFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => \dashboard\V1\Rpc\BadgesBatchRemove\BadgesBatchRemoveControllerFactory::class,
            'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => \dashboard\V1\Rpc\BadgesUpdateBatch\BadgesUpdateBatchControllerFactory::class,
            'dashboard\\V1\\Rpc\\Csvtojson\\Controller' => \dashboard\V1\Rpc\Csvtojson\CsvtojsonControllerFactory::class,
            'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => \dashboard\V1\Rpc\ConferenceUpdateBatch\ConferenceUpdateBatchControllerFactory::class,
            'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller' => \dashboard\V1\Rpc\ParticipantUpdateBatch\ParticipantUpdateBatchControllerFactory::class,
            'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => \dashboard\V1\Rpc\GetUserProfile\GetUserProfileControllerFactory::class,
            'dashboard\\V1\\Rpc\\Logout\\Controller' => \dashboard\V1\Rpc\Logout\LogoutControllerFactory::class,
            'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => \dashboard\V1\Rpc\GetLoginStatus\GetLoginStatusControllerFactory::class,
            'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => \dashboard\V1\Rpc\ClassesUpdateBatch\ClassesUpdateBatchControllerFactory::class,
            'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => \dashboard\V1\Rpc\ClassesDeleteParticipant\ClassesDeleteParticipantControllerFactory::class,
            'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => \dashboard\V1\Rpc\ClassEvaluatedParticipant\ClassEvaluatedParticipantControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
            'service_name' => 'badgesBatchRemove',
            'http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.badges-batch-remove',
        ],
        'dashboard\\V1\\Rpc\\BadgesUpdateBatch\\Controller' => [
            'service_name' => 'badgesUpdateBatch',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.badges-update-batch',
        ],
        'dashboard\\V1\\Rpc\\Csvtojson\\Controller' => [
            'service_name' => 'csvtojson',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'dashboard.rpc.csvtojson',
        ],
        'dashboard\\V1\\Rpc\\ConferenceUpdateBatch\\Controller' => [
            'service_name' => 'conferenceUpdateBatch',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.conference-update-batch',
        ],
        'dashboard\\V1\\Rpc\\ParticipantUpdateBatch\\Controller' => [
            'service_name' => 'participantUpdateBatch',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.participant-update-batch',
        ],
        'dashboard\\V1\\Rpc\\GetUserProfile\\Controller' => [
            'service_name' => 'getUserProfile',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'dashboard.rpc.get-user-profile',
        ],
        'dashboard\\V1\\Rpc\\Logout\\Controller' => [
            'service_name' => 'logout',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'dashboard.rpc.logout',
        ],
        'dashboard\\V1\\Rpc\\GetLoginStatus\\Controller' => [
            'service_name' => 'getLoginStatus',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'dashboard.rpc.get-login-status',
        ],
        'dashboard\\V1\\Rpc\\ClassesUpdateBatch\\Controller' => [
            'service_name' => 'classesUpdateBatch',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.classes-update-batch',
        ],
        'dashboard\\V1\\Rpc\\ClassesDeleteParticipant\\Controller' => [
            'service_name' => 'classesDeleteParticipant',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.classes-delete-participant',
        ],
        'dashboard\\V1\\Rpc\\ClassEvaluatedParticipant\\Controller' => [
            'service_name' => 'classEvaluatedParticipant',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'dashboard.rpc.class-evaluated-participant',
        ],
    ],
];
