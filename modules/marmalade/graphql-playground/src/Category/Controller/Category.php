<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\Category\Controller;

use Marmalade\GraphQL\GraphQLPlayground\Category\DataType\Category as CategoryDataType;
use Marmalade\GraphQL\GraphQLPlayground\Category\Service\Category as CategoryService;
use TheCodingMachine\GraphQLite\Annotations\Query;

final class Category
{
    /** @var CategoryService */
    private $categoryService;

    public function __construct(
        CategoryService $categoryService
    ) {
        $this->categoryService = $categoryService;
    }

    /**
     * @Query()
     */
    public function category(string $id): CategoryDataType
    {
        return $this->categoryService->category($id);
    }
}
