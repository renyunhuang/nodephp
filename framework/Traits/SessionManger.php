<?php
namespace Nodephp\Traits;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;

trait SessionManger
{

    public function _initNativeSession(Request $request)
    {

        if (!$request->hasSession()) {
            $sesOption = array(
                'cache_limiter' => 'nocache',
                'cookie_domain' => 'localhost.com',
                'cookie_httponly' => '1',
                'cookie_lifetime' => '1800',
                'cookie_path' => '/',
                'cookie_secure' => '0',
                'entropy_file' => '/dev/urandom',
                'entropy_length' => '1024',
                'gc_divisor' => '100',
                'gc_maxlifetime' => '1800',
                'gc_probability' => '100',
                'hash_bits_per_character' => '4',
                'hash_function' => '1',
                'name' => 'NODEPHP',
                'referer_check' => '',
                'serialize_handler' => 'php',
                'use_cookies' => '1',
                'use_only_cookies' => '1',
                'use_trans_sid' => '0',
                'upload_progress.enabled' => '1',
                'upload_progress.cleanup' => '1',
                'upload_progress.prefix' => 'upload_progress_',
                'upload_progress.name' => 'PHP_SESSION_UPLOAD_PROGRESS',
                'upload_progress.freq' => '1%',
                'upload_progress.min-freq' => '1',
                'url_rewriter.tags' => 'a=href,area=href,frame=src,form=,fieldset='
            );

            $session = new Session(new NativeSessionStorage($sesOption,
                new NativeFileSessionHandler('/tmp;/tmp'),
                new MetadataBag('nodephp_meta')),
                new AttributeBag('nodephp_attributes'),
                new FlashBag('nodephp_flashes'));
            $request->setSession($session);
        }
    }
}