<?php
namespace App\EventListener;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;



class RedirectUserListener
{
    private $security;
    private $router;

    public function __construct(Security $security , RouterInterface $router)
    {
        $this->security = $security;
        $this->router = $router;
    }

    public function onKernelRequest(RequestEvent $event)
    {
         $request = $event->getRequest();
        $route = $request->attributes->get('_route');

        if ($this->security->isGranted('ROLE_ADMIN') && $route === 'admin_route') {
            $response = new RedirectResponse($this->router->generate('admin'));
            $event->setResponse($response);
        }

        if ($this->security->isGranted('ROLE_USER') && $route === 'user_route') {
            $response = new RedirectResponse($this->router->generate('app_users'));
            $event->setResponse($response);
        }
    }
}
