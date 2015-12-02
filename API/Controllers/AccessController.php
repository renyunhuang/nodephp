<?php
namespace API\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessController
{
    public function indexAction(Request $request)
    {
      return new Response('hello world');
    }
}