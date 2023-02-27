<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3fb4fedc2a8abeaee758eecc74a59afe
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Contact\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Contact\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3fb4fedc2a8abeaee758eecc74a59afe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3fb4fedc2a8abeaee758eecc74a59afe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3fb4fedc2a8abeaee758eecc74a59afe::$classMap;

        }, null, ClassLoader::class);
    }
}
