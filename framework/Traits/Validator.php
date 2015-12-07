<?php
namespace Nodephp\Traits;


trait Validator
{
    public static function throwMsg($msg, $val)
    {
        throw new \InvalidArgumentException(sprintf($msg."%s", $val));
    }
}