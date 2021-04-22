<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\Tests\Unit\Shared\Service;

use Marmalade\GraphQL\GraphQLPlayground\Shared\Service\NamespaceMapper;
use PHPUnit\Framework\TestCase;

/**
 * @covers Marmalade\GraphQL\GraphQLPlayground\Shared\Service\NamespaceMapper
 */
final class NamespaceMapperTest extends TestCase
{
    public function testFooBar(): void
    {
        $namespaceMapper = new NamespaceMapper();
        $this->assertCount(
            1,
            $namespaceMapper->getControllerNamespaceMapping()
        );
        $this->assertCount(
            1,
            $namespaceMapper->getTypeNamespaceMapping()
        );
    }
}
