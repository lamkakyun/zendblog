<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/12/2016
 * Time: 2:04 PM
 */

namespace Album\Factory;

use Album\Model\AlbumTable;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumTableFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $projectTable = new TableGateway('album', $dbAdapter);
        return new AlbumTable($projectTable);
    }

}