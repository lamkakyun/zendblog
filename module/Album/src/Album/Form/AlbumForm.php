<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 上午10:43
 */


namespace Album\Form;

use Zend\Form\Element\Text;
use Zend\Form\Form;

class AlbumForm extends Form {

    public function __construct($name = null)
    {
        parent::__construct();

//        $this->setAttribute('method', 'get');
        $this->add(array('name' => 'id', 'type' => 'hidden'));
        $this->add(array('name' => 'title', 'type' => 'text', 'options' => array('label' => 'Title')));
        $this->add(array('name' => 'artist', 'type' => 'text', 'options' => array('label' => 'Artist')));
        $this->add(array('name' => 'submit', 'type' => 'submit', 'attributes' => array('value' => 'Go', 'id' => 'submitbutton')));

//        $testText = new Text('test');
    }
}
