<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\SeoUrl\Service;

use Marmalade\GraphQL\GraphQLPlayground\SeoUrl\DataType\SeoUrl as SeoUrlDataType;
use Marmalade\GraphQL\GraphQLPlayground\SeoUrl\Infrastructure\SeoUrlRepository;
use OxidEsales\GraphQL\Base\Exception\InvalidLogin;
use OxidEsales\GraphQL\Base\Exception\NotFound;

final class SeoUrl
{
    /** @var SeoUrlRepository */
    private $seoUrlRepository;

    public function __construct(
        SeoUrlRepository $seoUrlRepository
    ) {
        $this->seoUrlRepository = $seoUrlRepository;
    }

    /**
     * @throws NotFound
     */
    public function seoUrl(string $seoUrl): SeoUrlDataType
    {
        $seoUrl = $this->seoUrlRepository->seoUrl($seoUrl);

        return $seoUrl;
    }
}
