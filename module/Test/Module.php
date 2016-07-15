<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/13/2016
 * Time: 11:44 AM
 */

namespace Test;

use Zend\Console\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ConsoleUsageProviderInterface, ConsoleBannerProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // Autoload all classes from namespace 'Blog' from '/module/Blog/src/Blog'
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    // 输入zf 命令，最顶端的提示就是这个
    public function getConsoleUsage(AdapterInterface $console)
    {
        // TODO: Implement getConsoleUsage() method.
        return array(
            // Describe available commands
            'user resetpassword [--verbose|-v] EMAIL' => 'Reset password for a user',

            // Describe expected parameters
            array('EMAIL', 'Email of the user for a password reset'),
            array('--verbose|-v', '(optional) turn on verbose mode'),
        );
    }

    // 输入zf 命令，最顶端的提示就是这个
    public function getConsoleBanner(AdapterInterface $console)
    {
        // TODO: Implement getConsoleBanner() method.
        return
            "==------------------------------------------------------==\n" .
            "        Welcome to my ZF2 Console-enabled app             \n" .
            "==------------------------------------------------------==\n" .
            "Version 0.0.1\n"
            ;
    }


}