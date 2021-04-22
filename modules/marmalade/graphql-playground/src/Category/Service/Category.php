<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\Category\Service;

use Marmalade\GraphQL\GraphQLPlayground\Category\DataType\Category as CategoryDataType;
use Marmalade\GraphQL\GraphQLPlayground\Category\Exception\CategoryNotFound;
use Marmalade\GraphQL\GraphQLPlayground\Category\Infrastructure\CategoryRepository;
use OxidEsales\GraphQL\Base\Exception\InvalidLogin;
use OxidEsales\GraphQL\Base\Exception\NotFound;

final class Category
{
    /** @var CategoryRepository */
    private $categoryRepository;

    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @throws CategoryNotFound
     */
    public function category(string $id): CategoryDataType
    {
        try {
            $category = $this->categoryRepository->category($id);
        } catch (NotFound $e) {
            throw CategoryNotFound::byId($id);
        }

        if (!$category->active()) {
            throw new InvalidLogin('Unauthorized');
        }

        return $category;
    }
}
