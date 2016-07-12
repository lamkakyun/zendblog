<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/12/2016
 * Time: 11:56 AM
 */

namespace BlogTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ListControllerTest extends AbstractHttpControllerTestCase {

    public function setUp()
    {
        $this->setApplicationConfig(
            include getcwd() .'/config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/blog');
//        var_export($this->getResponse()->getContent());exit;
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('Blog');
        $this->assertControllerName('Blog\Controller\List');
        $this->assertControllerClass('ListController');
        $this->assertMatchedRouteName('blog');
    }
}