<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\SeoUrl\DataType;

use DateTimeImmutable;
use DateTimeInterface;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use TheCodingMachine\GraphQLite\Types\ID;

/**
 * @Type()
 */
final class SeoUrl
{
    /** @var array */
    private $aSeoUrl;

    public function __construct(
        array $aSeoUrl
    ) {
        $this->aSeoUrl = $aSeoUrl;
    }

    /**
     * @Field
     */
    public function type(): string
    {
        return (string) $this->aSeoUrl['OXTYPE'];
    }

    /**
     * @Field
     */
    public function objectId(): string
    {
        return (string) $this->aSeoUrl['OXOBJECTID'];
    }

    /**
     * @Field
     */
    public function stdUrl(): string
    {
        return (string) $this->aSeoUrl['OXSTDURL'];
    }

    /**
     * @Field
     */
    public function lang(): int
    {
        return (int) $this->aSeoUrl['OXLANG'];
    }
}
