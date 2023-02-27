<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3fb4fedc2a8abeaee758eecc74a59afe
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit3fb4fedc2a8abeaee758eecc74a59afe', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3fb4fedc2a8abeaee758eecc74a59afe', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3fb4fedc2a8abeaee758eecc74a59afe::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
