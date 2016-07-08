<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;

class AlbumController extends AbstractActionController
{

    protected $albumTable;

    public function indexAction()
    {
        // return $this->getResponse()->setContent('album list');

        // 为什么用ViewModel就失败呢？
//        return new ViewModel(array(
//            'albums' => $this->getAlbumTable()->fetchAll()
//        ));
        return array('albums' => $this->getAlbumTable()->fetchAll(),);
    }

    public function addAction()
    {}

    public function editAction()
    {}

    public function deleteAction()
    {}

    public function getAlbumTable()
    {
        if (! $this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}