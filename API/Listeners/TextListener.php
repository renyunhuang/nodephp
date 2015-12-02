<?php
namespace API\Listeners;

use Nodephp\Listener\CBaseListener;
use API\Events\UserEvent;
use Nodephp\Event\CBaseResponseEvent;

class TextListener extends CBaseListener
{
    public function onResponse(UserEvent $event)
    {
        $this->onText($event);
    }

    private function onText(CBaseResponseEvent $event) {

    }
}
