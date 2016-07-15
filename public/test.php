<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 7/11/2016
 * Time: 3:33 PM
 */

// 该文件是用来测试

// 1. 测试 依赖注入
namespace Jet {
    class A
    {
        protected $username;
        protected $password;

        public function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }
    }

    class B
    {
        protected $a;

        public function __construct(A $a)
        {
            $this->a = $a;
        }
    }

    class C
    {
        protected $b;

        public function __construct(B $b)
        {
            $this->b = $b;
        }
    }

    require_once "../vendor/autoload.php";
    $di = new \Zend\Di\Di;
    $parameters = array(
        'username' => 'MyUsernameValue',
        'password' => 'MyHardToGuessPassword%$#',
    );
    $b = $di->get('Jet\B', $parameters);
    var_export($b);

    $c = $di->get('Jet\C', $parameters);
    var_export($c);
}
