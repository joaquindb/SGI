<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit52fcef69d80a9d44875e292ee214aa54
{
    public static $files = array (
        '800196073909aa5a35e71b8a8265de59' => __DIR__ . '/..' . '/jaxon-php/jaxon-core/src/start.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
        ),
        'M' => 
        array (
            'MatthiasMullie\\PathConverter\\' => 29,
            'MatthiasMullie\\Minify\\' => 22,
        ),
        'L' => 
        array (
            'Lemon\\Event\\' => 12,
        ),
        'J' => 
        array (
            'Jaxon\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'MatthiasMullie\\PathConverter\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/path-converter/src',
        ),
        'MatthiasMullie\\Minify\\' => 
        array (
            0 => __DIR__ . '/..' . '/matthiasmullie/minify/src',
        ),
        'Lemon\\Event\\' => 
        array (
            0 => __DIR__ . '/..' . '/lemonphp/event/src',
        ),
        'Jaxon\\' => 
        array (
            0 => __DIR__ . '/..' . '/jaxon-php/jaxon-core/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Pimple' => 
            array (
                0 => __DIR__ . '/..' . '/pimple/pimple/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit52fcef69d80a9d44875e292ee214aa54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit52fcef69d80a9d44875e292ee214aa54::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit52fcef69d80a9d44875e292ee214aa54::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
