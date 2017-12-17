<?php

namespace FrontendBundle\Listener;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LoggedInListener
{
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var AuthorizationCheckerInterface
     */
    private $authorizationChecker;
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    public function __construct(RouterInterface $router, AuthorizationCheckerInterface $authorizationChecker, TokenStorageInterface $tokenStorage)
    {
        $this->router = $router;
        $this->authorizationChecker = $authorizationChecker;
        $this->tokenStorage = $tokenStorage;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$this->tokenStorage->getToken() instanceof AnonymousToken &&
            in_array($event->getRequest()->getPathInfo(), $this->getRoutes()))
        {
            $response = new RedirectResponse($this->router->generate('pages_home'));
            $event->setResponse($response);
        }
    }

    private function getRoutes()
    {
        return [
            $this->router->generate('fos_user_registration_register'),
            $this->router->generate('fos_user_security_login')
        ];
    }

}
