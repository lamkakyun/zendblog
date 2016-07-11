<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/11/2016
 * Time: 5:25 PM
 */

namespace AlbumTest\Controller;

use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

//class AlbumControllerTest extends AbstractHttpControllerTestCase
//{
//    // To get a bit more information when something goes wrong in a test case, we set the protected $traceError member to true
//    protected $traceError = false;
//
//    public function setUp()
//    {
//        $configOverrides = [];
//
//        $this->setApplicationConfig(ArrayUtils::merge(
//        // Grabbing the full application configuration:
//            include getcwd() .'/config/application.config.php',
//            $configOverrides
//        ));
//        parent::setUp();
//    }
//
//    public function testIndexActionCanBeAccessed()
//    {
//        $this->dispatch('/album');
//        $this->assertResponseStatusCode(200);
//        $this->assertModuleName('Album');
//        $this->assertControllerName(AlbumController::class);
//        $this->assertControllerClass('AlbumController');
//        $this->assertMatchedRouteName('album');
//    }
//}