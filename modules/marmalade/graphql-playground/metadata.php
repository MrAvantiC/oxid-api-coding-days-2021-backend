<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

use Marmalade\GraphQL\GraphQLPlayground\Shared\Shop\Controller as ModuleController;
use OxidEsales\Eshop\Application\Controller as OxidController;

/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

/**
 * Module information
 */
$aModule = [
    'id'          => 'marmalade/graph-q-l-playground',
    'title'       => 'GraphQL GraphQLPlayground',
    'description' =>  '',
    'version'     => '0.2.0',
    'author'      => 'Some cool guys',
    'url'         => '',
    'email'       => '',
    'extend'      => [
        OxidController\BasketController::class => ModuleController\Basket::class,
    ],
    'controllers' => [
    ],
    'templates'   => [
    ],
    'blocks'      => [
    ],
    'settings'    => [
    ],
];
