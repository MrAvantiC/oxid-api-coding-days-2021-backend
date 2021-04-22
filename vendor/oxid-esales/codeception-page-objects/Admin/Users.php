<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\Codeception\Admin;

use OxidEsales\Codeception\Page\Page;
use OxidEsales\Codeception\Admin\User\UserList;

/**
 * Class Users
 *
 * @package OxidEsales\Codeception\Admin
 */
class Users extends Page
{
    use UserList;
}
