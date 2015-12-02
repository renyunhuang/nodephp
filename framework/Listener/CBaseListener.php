<?php
namespace Nodephp\Listener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CBaseListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return array('response' => 'onResponse');
    }
}