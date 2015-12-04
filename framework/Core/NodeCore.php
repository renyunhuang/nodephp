<?php
namespace Nodephp\Core;

use API\Events\UserEvent;
use Nodephp\Core\NodeResponse;
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
    protected $response;

    public function __construct($routes, Request $request, EventDispatcher $dispatcher, ControllerResolver $resolver)
    {
        $this->response = new NodeResponse();
        $this->context = new RequestContext($request->getBaseUrl(),
            $request->getMethod(),
            $request->getHost(),
            $request->getScheme(),
            $request->getPort(),
            $request->getPort());
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

            $callback = call_user_func_array($controller, $arguments);
            if (is_object($callback) && $callback instanceof Response) {
                $this->response = clone $callback;
                if ($this->response instanceof NodeResponse) {
                    $this->dispatcher->dispatch('response', new UserEvent($this->response, $request));
                }
            }

            $this->response->prepare($request)->send();
        } catch (ResourceNotFoundException $e) {
            $this->response->Render(404);
            $this->response->prepare($request)->send();
        } catch (\Exception $e) {
            $this->response->Render(505);
            $this->response->prepare($request)->send();
        }
    }
}