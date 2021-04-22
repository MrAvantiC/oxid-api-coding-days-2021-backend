<?php

/**
 * Copyright © __Vender__. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Marmalade\GraphQL\GraphQLPlayground\SeoUrl\DataType;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Application\Model\Category;
use OxidEsales\Eshop\Application\Model\Manufacturer;
use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;
use OxidEsales\GraphQL\Storefront\Product\DataType\Product as ProductDataType;
use OxidEsales\GraphQL\Storefront\Category\DataType\Category as CategoryDataType;
use OxidEsales\GraphQL\Storefront\Manufacturer\DataType\Manufacturer as ManufacturerDataType;

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

    /**
     * @Field
     */
    public function category(): ?CategoryDataType
    {
        if ($this->type() == 'oxcategory') {
            $oArticle = oxNew(Category::class);
            if ($oArticle->load($this->objectId())) {
                return new CategoryDataType($oArticle);
            }
        }
        return null;
    }

    /**
     * @Field
     */
    public function product(): ?ProductDataType
    {
        if ($this->type() == 'oxarticle') {
            $oArticle = oxNew(Article::class);
            if ($oArticle->load($this->objectId())) {
                return new ProductDataType($oArticle);
            }
        }
        return null;
    }

    /**
     * @Field
     */
    public function manufacturer(): ?ManufacturerDataType
    {
        if ($this->type() == 'oxmanufacturer') {
            $oManufacturer = oxNew(Manufacturer::class);
            if ($oManufacturer->load($this->objectId())) {
                return new ManufacturerDataType($oManufacturer);
            }
        }
        return null;
    }
}
