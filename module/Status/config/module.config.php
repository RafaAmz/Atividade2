<?php
return [
    'service_manager' => [
        'factories' => [],
    ],
    'router' => [
        'routes' => [
            'status.rest.category' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/category[/:category_id]',
                    'defaults' => [
                        'controller' => 'Status\\V1\\Rest\\Category\\Controller',
                    ],
                ],
            ],
            'status.rest.product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/product[/:product_id]',
                    'defaults' => [
                        'controller' => 'Status\\V1\\Rest\\Product\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'api-tools-versioning' => [
        'uri' => [
            1 => 'status.rest.category',
            2 => 'status.rest.product',
        ],
    ],
    'api-tools-rest' => [
        'Status\\V1\\Rest\\Category\\Controller' => [
            'listener' => 'Status\\V1\\Rest\\Category\\CategoryResource',
            'route_name' => 'status.rest.category',
            'route_identifier_name' => 'category_id',
            'collection_name' => 'category',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Status\V1\Rest\Category\CategoryEntity::class,
            'collection_class' => \Status\V1\Rest\Category\CategoryCollection::class,
            'service_name' => 'category',
        ],
        'Status\\V1\\Rest\\Product\\Controller' => [
            'listener' => 'Status\\V1\\Rest\\Product\\ProductResource',
            'route_name' => 'status.rest.product',
            'route_identifier_name' => 'product_id',
            'collection_name' => 'product',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Status\V1\Rest\Product\ProductEntity::class,
            'collection_class' => \Status\V1\Rest\Product\ProductCollection::class,
            'service_name' => 'product',
        ],
    ],
    'api-tools-content-negotiation' => [
        'controllers' => [
            'Status\\V1\\Rest\\Category\\Controller' => 'HalJson',
            'Status\\V1\\Rest\\Product\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Status\\V1\\Rest\\Category\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Status\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Status\\V1\\Rest\\Category\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ],
            'Status\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.status.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'api-tools-hal' => [
        'metadata_map' => [
            'Status\\V1\\Rest\\Status\\StatusEntity' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            'Status\\V1\\Rest\\Status\\StatusCollection' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.status',
                'route_identifier_name' => 'status_id',
                'is_collection' => true,
            ],
            \Status\V1\Rest\Category\CategoryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.category',
                'route_identifier_name' => 'category_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Status\V1\Rest\Category\CategoryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.category',
                'route_identifier_name' => 'category_id',
                'is_collection' => true,
            ],
            \Status\V1\Rest\Product\ProductEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.product',
                'route_identifier_name' => 'product_id',
                'hydrator' => \Laminas\Hydrator\ArraySerializableHydrator::class,
            ],
            \Status\V1\Rest\Product\ProductCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'status.rest.product',
                'route_identifier_name' => 'product_id',
                'is_collection' => true,
            ],
        ],
    ],
    'api-tools-content-validation' => [
        'Status\\V1\\Rest\\Category\\Controller' => [
            'input_filter' => 'Status\\V1\\Rest\\Category\\Validator',
        ],
        'Status\\V1\\Rest\\Product\\Controller' => [
            'input_filter' => 'Status\\V1\\Rest\\Product\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Status\\V1\\Rest\\Status\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\StringLength::class,
                        'options' => [
                            'max' => '140',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'message',
                'description' => 'a status message',
                'error_message' => 'no more than 140 characters',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Regex::class,
                        'options' => [
                            'pattern' => '/^(mwop|andi|zeev)$/',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'user',
                'error_message' => 'You must provide a valid user.',
                'description' => 'The user submitting the status message.',
            ],
            2 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Laminas\Validator\Digits::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'timestamp',
                'description' => 'The timestamp when the status message was last modified.',
                'continue_if_empty' => true,
                'error_message' => 'You must provide a timestamp.',
            ],
        ],
        'Status\\V1\\Rest\\Category\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [],
                'validators' => [],
                'error_message' => 'Name is required',
                'description' => 'Category name',
            ],
        ],
        'Status\\V1\\Rest\\Product\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [],
                'validators' => [],
                'error_message' => 'Name is required',
                'description' => 'Product name',
            ],
            1 => [
                'name' => 'category_id',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Laminas\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Laminas\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'error_message' => 'Category is required',
                'description' => 'Category ID',
            ],
        ],
    ],
    'api-tools-mvc-auth' => [
        'authorization' => [],
    ],
    'api-tools' => [
        'db-connected' => [
            'Status\\V1\\Rest\\Category\\CategoryResource' => [
                'adapter_name' => 'Postgres',
                'table_name' => 'category',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Status\\V1\\Rest\\Category\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Status\\V1\\Rest\\Category\\CategoryResource\\Table',
            ],
            'Status\\V1\\Rest\\Product\\ProductResource' => [
                'adapter_name' => 'Postgres',
                'table_name' => 'product',
                'hydrator_name' => \Laminas\Hydrator\ArraySerializableHydrator::class,
                'controller_service_name' => 'Status\\V1\\Rest\\Product\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Status\\V1\\Rest\\Product\\ProductResource\\Table',
            ],
        ],
    ],
];
