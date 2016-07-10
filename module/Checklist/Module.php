<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 下午7:28
 */

namespace Checklist;

use Checklist\Model\TaskMapper;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // Autoload all classes from namespace 'Blog' from '/module/Blog/src/Blog'
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                )
            )
        );
    }

    public function getServiceConfig() {
        return array(
            'factories' => array(
                'TaskMapper' => function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $mapper = new TaskMapper($dbAdapter);

                    return $mapper;
                }
            )
        );
    }
}