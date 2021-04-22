<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\SeoUrl\Infrastructure;

use Marmalade\GraphQL\GraphQLPlayground\SeoUrl\DataType\SeoUrl as SeoUrlDataType;
use OxidEsales\Eshop\Core\Database\Adapter\DatabaseInterface;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\GraphQL\Base\Exception\NotFound;

final class SeoUrlRepository
{
    /**
     * @throws NotFound
     */
    public function seoUrl(string $sSeoUrl): SeoUrlDataType
    {
        $sQuery = "SELECT * FROM oxseo WHERE oxseourl = ?";
        $aRow = DatabaseProvider::getDb(DatabaseInterface::FETCH_MODE_ASSOC)->getRow($sQuery, [$sSeoUrl]);

        if (empty($aRow)) {
            throw new NotFound();
        }

        return new SeoUrlDataType(
            $aRow
        );
    }
}
