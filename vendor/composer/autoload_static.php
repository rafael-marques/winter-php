<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitddab4c3c95b09e07d14b1c3adf34e76f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
        ),
        'M' => 
        array (
            'Model\\' => 6,
        ),
        'C' => 
        array (
            'Controller\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitddab4c3c95b09e07d14b1c3adf34e76f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitddab4c3c95b09e07d14b1c3adf34e76f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
