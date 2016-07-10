<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 上午12:03
 */

namespace Blog\Form;

use Zend\Form\Form;

class PostForm extends Form {

    public function __construct($name = null, $options = array()) {

        // Fatal error: Call to a member function insert() on a non-object in
        // {libraryPath}/Zend/Form/Fieldset.php on line {lineNumber}
        // Without this, forms and fieldsets will not be able to get initiated correctly.
        parent::__construct($name, $options);

        $this->add(array('name' => 'post-fieldset', 'type' => 'Blog\Form\PostFieldset', 'options' => array(
            'use_as_base_fieldset' => true
        )));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Insert new Post'
            )
        ));
    }
}