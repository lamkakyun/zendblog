<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 上午12:00
 */

namespace Blog\Form;

use Blog\Model\Post;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class PostFieldset extends Fieldset {

    public function __construct($name = null, $options = array()) {

        // 一定要有，否则初始化失败，报错
        // Fatal error: Call to a member function insert() on null
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Post());

        $this->add(array('type' => 'hidden', 'name' => 'id'));
        $this->add(array('type' => 'text', 'name' => 'title', 'options' => array('label' => 'Blog Title')));
        $this->add(array('type' => 'text', 'name' => 'text', 'options' => array('label' => 'The Text')));
    }
}