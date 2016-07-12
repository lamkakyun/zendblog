<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/12/2016
 * Time: 6:25 PM
 */

require_once "../vendor/autoload.php";

$figlet = new \Zend\Text\Figlet\Figlet();
echo $figlet->render('Zend');
exit;