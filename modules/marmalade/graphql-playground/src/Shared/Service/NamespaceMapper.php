<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\Shared\Service;

use OxidEsales\GraphQL\Base\Framework\NamespaceMapperInterface;

final class NamespaceMapper implements NamespaceMapperInterface
{
    public function getControllerNamespaceMapping(): array
    {
        return [
            '\\Marmalade\\GraphQL\\GraphQLPlayground\\SeoUrl\\Controller' => __DIR__ . '/../../SeoUrl/Controller/',
        ];
    }

    public function getTypeNamespaceMapping(): array
    {
        return [
            '\\Marmalade\\GraphQL\\GraphQLPlayground\\SeoUrl\\DataType' => __DIR__ . '/../../SeoUrl/DataType/',
        ];
    }
}
