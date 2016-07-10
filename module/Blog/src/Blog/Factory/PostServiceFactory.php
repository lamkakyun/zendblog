<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午4:05
 */

namespace Blog\Factory;

use Blog\Service\PostService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostServiceFactory implements FactoryInterface {

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return PostService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PostService($serviceLocator->get('Blog\Mapper\PostMapperInterface'));
    }

}