<?php
/**
 * @Author: renyun.huang@gmail.com
 * @Date: 15-12-19
 * @Time: 下午1:57
 */

namespace Front\Models;

use Nodephp\Traits\DoctrineOrm;
use Nodephp\Traits\DoctrineOdm;

class AppModel
{
    use DoctrineOrm;
    use DoctrineOdm;

    public function __construct()
    {
        try {
            $this->initOrmTrait();
            $this->initOdmTrait();
        } catch (\Exception $e) {

        }
    }
}