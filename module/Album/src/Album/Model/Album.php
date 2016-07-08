<?php

namespace Album\Model;

/**
 * just a entity
 * @author jet
 *
 */
class Album {
    public $id;
    public $artist;
    public $title;

    /**
     * In order to work with Zend\Db’s TableGateway class,
     * we need to implement the exchangeArray() method.
     *  This method simply copies the data from the passed in array to our entity’s properties.
     * @param unknown $data
     */
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
    }
}