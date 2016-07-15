<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/12/2016
 * Time: 1:54 PM
 */

namespace Album\Factory;

use Album\Controller\AlbumController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AlbumControllerFactory implements FactoryInterface {
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $realSL = $serviceLocator->getServiceLocator();
        $albumTable = $realSL->get('Album\Model\Album');
        return new AlbumController($albumTable);
    }
}