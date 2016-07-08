<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */
return array(
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=test;host=127.0.0.1',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),

        // You should put your database credentials in config/autoload/local.php
        // so that they are not in the git repository (as local.php is ignored):
        'username' => 'jet',
        'password' => '123',
    ),
    /**
     * configure the ServiceManager so that it knows how to get a Zend\Db\Adapter\Adapter.
     * This is done using a factory called Zend\Db\Adapter\AdapterServiceFactory which we
     * can configure within the merged config system
     */
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory'
        )
    )
);
