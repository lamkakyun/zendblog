<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午5:13
 */

namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class TestController extends AbstractActionController {

    public function indexAction() {
        echo 'this is a test!';exit;
    }
}