<?php

namespace Marmalade\GraphQL\GraphQLPlayground\Shared\Shop\Service;

use Lcobucci\JWT\Token;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Validator;
use OxidEsales\Eshop\Core\Session;
use OxidEsales\GraphQL\Base\Service\Authentication;
use OxidEsales\GraphQL\Storefront\Basket\Exception\BasketAccessForbidden;
use OxidEsales\GraphQL\Storefront\Basket\Exception\BasketNotFound;
use OxidEsales\GraphQL\Storefront\Basket\Infrastructure\Repository as BasketRepository;
use OxidEsales\GraphQL\Storefront\Shared\Infrastructure\Basket as BasketSharedInfrastructure;
use ProxyManager\Signature\Exception\InvalidSignatureException;

class Basket
{
    /**
     * @var Session
     */
    private Session $session;

    /**
     * @var BasketSharedInfrastructure
     */
    private BasketSharedInfrastructure $sharedInfrastructure;

    /**
     * @var BasketRepository
     */
    private BasketRepository $repository;

    /**
     * @var Validator
     */
    private Validator $tokenValidator;

    /**
     * @var SignedWith
     */
    private SignedWith $signedWithConstraint;

    /**
     * Basket constructor.
     *
     * @param Session                    $session
     * @param BasketSharedInfrastructure $sharedInfrastructure
     * @param BasketRepository           $repository
     * @param Validator                  $tokenValidator
     * @param SignedWith                 $signedWithConstraint
     */
    public function __construct(
        Session $session,
        BasketSharedInfrastructure $sharedInfrastructure,
        BasketRepository $repository,
        Validator $tokenValidator,
        SignedWith $signedWithConstraint
    ) {
        $this->session              = $session;
        $this->sharedInfrastructure = $sharedInfrastructure;
        $this->repository           = $repository;
        $this->tokenValidator       = $tokenValidator;
        $this->signedWithConstraint = $signedWithConstraint;
    }

    /**
     * Creates a new session basket from a user basket.
     *
     * @param string $basketId
     * @param Token  $token
     *
     * @throws BasketAccessForbidden
     * @throws BasketNotFound
     */
    public function createFromId(string $basketId, Token $token): void
    {
        if (!$this->tokenValidator->validate($token, $this->signedWithConstraint)) {
            throw new InvalidSignatureException("The JWT has an invalid signature.");
        }
        $this->tokenValidator->validate($token, $this->signedWithConstraint);
        $basketDataType = $this->repository->getBasketById($basketId);

        $userId = $token->claims()->get(Authentication::CLAIM_USERID);
        if (!$basketDataType->belongsToUser($userId)) {
            throw new BasketAccessForbidden("You're not allowed to access this basket.");
        }

        $basket = $this->sharedInfrastructure->getBasket($basketDataType);
        $this->session->setBasket($basket);
    }
}
