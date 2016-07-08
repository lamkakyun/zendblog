<?php

namespace Album;

use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Album\Model\Album;

/**
 * 这个类用来管理 加载和配置模块的
 * @author jet
 *
 */
class Module {
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
                'Zend\Loader\ClassMapAutoloader' => array(
                        __DIR__ . '/autoload_classmap.php',
                ),
                'Zend\Loader\StandardAutoloader' => array(
                        'namespaces' => array(
                                __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                        ),
                ),
        );
    }


    /**
     * getServiceConfig() which is automatically called by the ModuleManager and applied to the ServiceManager
     *
     * provide a factory that creates an AlbumTable
     *
     * In order to always use the same instance of our AlbumTable
     */
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' =>  function($sm) { // $sm meaning of service manager
                    $tableGateway = $sm->get('AlbumTableGateway');
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },
                'AlbumTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Album());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
}