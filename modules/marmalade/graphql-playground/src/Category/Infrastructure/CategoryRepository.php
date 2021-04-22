<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\Category\Infrastructure;

use Marmalade\GraphQL\GraphQLPlayground\Category\DataType\Category as CategoryDataType;
use OxidEsales\Eshop\Application\Model\Category as CategoryEshopModel;
use OxidEsales\GraphQL\Base\Exception\NotFound;

final class CategoryRepository
{
    /**
     * @throws NotFound
     */
    public function category(string $id): CategoryDataType
    {
        /** @var CategoryEshopModel */
        $category = oxNew(CategoryEshopModel::class);

        if (!$category->load($id)) {
            throw new NotFound();
        }

        return new CategoryDataType(
            $category
        );
    }
}
