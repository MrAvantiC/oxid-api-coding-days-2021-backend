<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\Codeception\Admin;

use OxidEsales\Codeception\Admin\Order\OrderList;
use OxidEsales\Codeception\Page\Page;

/**
 * Class Orders
 *
 * @package OxidEsales\Codeception\Admin
 */
class Orders extends Page
{
    use OrderList;
}
