<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\Codeception\Admin;

use OxidEsales\Codeception\Admin\Product\ProductList;
use OxidEsales\Codeception\Page\Page;

class Products extends Page
{
    use ProductList;
}
