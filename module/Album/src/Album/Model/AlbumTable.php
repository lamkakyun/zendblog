<?php

namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * 通过table gateway 来操作数据库
 * @author jet
 *
 */
class AlbumTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
//        echo '<pre>';
//        var_dump($tableGateway->select()->toArray());exit;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getAlbum($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) throw new \Exception('Cound not find row ' . $id);
        return $row;
    }

    public function saveAlbum(Album $album) {
        $data = array(
                'artist' => $album->artist,
                'title'  => $album->title,
        );
        $id = (int) $album->id;

        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getAlbum($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Album id does not exist');
            }
        }
    }


    public function deleteAlbum($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}