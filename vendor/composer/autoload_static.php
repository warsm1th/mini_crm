<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c9c13abf34ec8b0116c3d843a075ffd
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Models\\Roles\\' => 17,
            'App\\Models\\' => 11,
            'App\\Controllers\\Users\\' => 22,
            'App\\Controllers\\Roles\\' => 22,
            'App\\Controllers\\' => 16,
            'App\\Config\\' => 11,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Models\\Roles\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models/roles',
        ),
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'App\\Controllers\\Users\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers/users',
        ),
        'App\\Controllers\\Roles\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers/roles',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/controllers',
        ),
        'App\\Config\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/config',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c9c13abf34ec8b0116c3d843a075ffd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c9c13abf34ec8b0116c3d843a075ffd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c9c13abf34ec8b0116c3d843a075ffd::$classMap;

        }, null, ClassLoader::class);
    }
}
