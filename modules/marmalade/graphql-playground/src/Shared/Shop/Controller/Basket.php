<?php

namespace Marmalade\GraphQL\GraphQLPlayground\Shared\Shop\Controller;

use Lcobucci\JWT\Parser;
use Marmalade\GraphQL\GraphQLPlayground\Shared\Shop\Service\Basket as BasketService;
use OxidEsales\Eshop\Application\Controller\BasketController as EshopBasketController;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\GraphQL\Storefront\Basket\Exception\BasketAccessForbidden;

/**
 * Class Basket
 *
 * @package Marmalade\GraphQL\GraphQLPlayground\Shared\Shop\Controller
 * @mixin EshopBasketController
 */
class Basket extends Basket_parent
{
    /**
     * Convert a GraphQL basket into a session basket.
     *
     * @return string
     * @throws BasketAccessForbidden
     */
    public function applyBasket(): string
    {
        $container = ContainerFactory::getInstance()->getContainer();
        if (null === $container) {
            return 'start';
        }

        $request = Registry::getRequest();

        $token = (new Parser())->parse($request->getRequestParameter('token'));

        $basketService = $container->get(BasketService::class);
        $basketService->createFromId((string) $request->getRequestParameter('basketId'), $token);

        return 'basket';
    }
}
