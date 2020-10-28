<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit09553490759b76396e8ac23518a470e9
{
    public static $files = array (
        '35b1a392c6b62a006fdfbfea0226b603' => __DIR__ . '/../..' . '/source/Support/Helpers.php',
        '62ee622531a9ea90ed12dbe859279cd7' => __DIR__ . '/../..' . '/source/Support/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit09553490759b76396e8ac23518a470e9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit09553490759b76396e8ac23518a470e9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}