<?php
namespace Nodephp\Core;

use API\Events\UserEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class NodeCore extends HttpKernel
{
    protected $matcher;
    protected $context;

    public function __construct($routes, EventDispatcher $dispatcher, ControllerResolver $resolver)
    {
        $this->context = new RequestContext();
        $this->matcher = new UrlMatcher($routes, $this->context);
        parent::__construct($dispatcher, $resolver);
    }

    public function handle(
        Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST,
        $catch = false
    ) {
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));

            $controller = $this->resolver->getController($request);
            $arguments = $this->resolver->getArguments($request, $controller);

            $response = call_user_func_array($controller, $arguments);
            $this->dispatcher->dispatch('response', new UserEvent($response, $request));
            $response->prepare($request)->send();
        } catch (ResourceNotFoundException $e) {
            return new Response($e->getMessage(), 404);
        } catch (\Exception $e) {
            return new Response($e->getMessage(), 500);
        }
    }
}