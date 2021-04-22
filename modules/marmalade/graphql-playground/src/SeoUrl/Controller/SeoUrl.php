<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\SeoUrl\Controller;

use Marmalade\GraphQL\GraphQLPlayground\SeoUrl\DataType\SeoUrl as SeoUrlDataType;
use Marmalade\GraphQL\GraphQLPlayground\SeoUrl\Service\SeoUrl as SeoUrlService;
use TheCodingMachine\GraphQLite\Annotations\Query;

final class SeoUrl
{
    /** @var SeoUrlService */
    private $seoUrlService;

    public function __construct(
        SeoUrlService $seoUrlService
    ) {
        $this->seoUrlService = $seoUrlService;
    }

    /**
     * @Query()
     */
    public function seoUrl(string $seoUrl): SeoUrlDataType
    {
        return $this->seoUrlService->seoUrl($seoUrl);
    }
}
