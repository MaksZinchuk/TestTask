<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit523d5b9edebc7dec8ea02ffa87aa54a7
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit523d5b9edebc7dec8ea02ffa87aa54a7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit523d5b9edebc7dec8ea02ffa87aa54a7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
