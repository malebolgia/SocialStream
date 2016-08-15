<?php

return [
/*
* Provider .
*/
'provider'  => 'malacode',

/*
* Package .
*/
'package'   => 'social_stream',

/*
* Modules .
*/
'modules'   => ['social_wall', 
'social_wall_category'],

'social_wall' => [
                    'Name'          => 'SocialWall',
                    'name'          => 'social_wall',
                    'table'         => 'social_walls',
                    'model'         => 'Malacode\SocialStream\Models\SocialWall',
                    'image'         => [
                        'xs'        => ['width' => '60',         'height' => '45'],
                        'sm'        => ['width' => '100',        'height' => '75'],
                        'md'        => ['width' => '460',        'height' => '345'],
                        'lg'        => ['width' => '800',        'height' => '600'],
                        'xl'        => ['width' => '1000',       'height' => '750'],
                        ],

                    'fillable'          => ['user_id', 'nameid',  'options',  'category_id'],
                    'listfields'        => ['id', 'nameid',  'options',  'category_id'],
                    'translatable'      => ['nameid',  'options',  'category_id'],

                    'upload-folder'     => '/uploads/social_stream/social_wall',
                    'uploadable'        => [
                                                'single'    => [],
                                                'multiple'  => [],
                                            ],
                ],
'social_wall_category' => [
                    'Name'          => 'SocialWallCategory',
                    'name'          => 'social_wall_category',
                    'table'         => 'social_wall_categories',
                    'model'         => 'Malacode\SocialStream\Models\SocialWallCategory',
                    'image'         => [
                        'xs'        => ['width' => '60',         'height' => '45'],
                        'sm'        => ['width' => '100',        'height' => '75'],
                        'md'        => ['width' => '460',        'height' => '345'],
                        'lg'        => ['width' => '800',        'height' => '600'],
                        'xl'        => ['width' => '1000',       'height' => '750'],
                        ],

                    'fillable'          => ['user_id', 'title',  'description'],
                    'listfields'        => ['id', 'title',  'description'],
                    'translatable'      => ['title',  'description'],

                    'upload-folder'     => '/uploads/social_stream/social_wall_category',
                    'uploadable'        => [
                                                'single'    => [],
                                                'multiple'  => [],
                                            ],
                ],
];
