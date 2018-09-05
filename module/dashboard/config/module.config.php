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
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'dashboard.rest.movies',
            1 => 'dashboard.rest.tb-badges',
            2 => 'dashboard.rpc.badges-batch-remove',
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
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'dashboard\\V1\\Rest\\Movies\\Controller' => 'HalJson',
            'dashboard\\V1\\Rest\\TbBadges\\Controller' => 'HalJson',
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => 'Json',
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
    ],
    // 'service_manager' => [
    //     'abstract_factories' => [
    //         \Zend\Db\Adapter\AdapterAbstractServiceFactory::class,
    //     ],
    // ],
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
        ],
    ],
    'controllers' => [
        'factories' => [
            'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => \dashboard\V1\Rpc\BadgesBatchRemove\BadgesBatchRemoveControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'dashboard\\V1\\Rpc\\BadgesBatchRemove\\Controller' => [
            'service_name' => 'badgesBatchRemove',
            'http_methods' => [
                0 => 'GET',
            ],
            'route_name' => 'dashboard.rpc.badges-batch-remove',
        ],
    ],
];
