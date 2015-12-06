<?php
namespace Nodephp\Traits;


trait Validator
{
    public function checkValidUrl($url)
    {
        if (empty($url)) {
           self::throwMsg('Invalid Url by: ', $url);
        }

        return true;
    }

    public function checkValidStatus($type, $statusCode)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'direct':
                if (!in_array($statusCode, array(201, 301, 302, 303, 307, 308))) {
                    self::throwMsg('Invalid StatusCode by: ', $statusCode);
                }
        }

        return true;
    }

    public static function throwMsg($msg, $val)
    {
        throw new \InvalidArgumentException(sprintf($msg."%s", $val));
    }
}