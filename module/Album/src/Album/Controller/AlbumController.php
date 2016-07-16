<?php
namespace Album\Controller;

use Album\Form\AlbumForm;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;

class AlbumController extends AbstractActionController
{
    protected $albumTable;

    public function __construct(AlbumTable $albumTable)
    {
        $this->albumTable = $albumTable;
    }

    public function indexAction()
    {
        // return $this->getResponse()->setContent('album list');

//        echo getcwd();exit;

        return array('albums' => $this->getAlbumTable()->fetchAll(),);
    }

    public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($album);

                return $this->redirect()->toRoute('album');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album', array('action' => 'add'));
        }

        try {
            $album = $this->getAlbumTable()->getAlbum($id);
        } catch(\Exception $e) {
            return $this->redirect()->toRoute('album', ['action' => 'index']);
        }

        $form = new AlbumForm();
        // The form’s bind() method attaches the model to the form
        // After successful validation in isValid(), the data from the form is put back into the model.
        $form->bind($album);

        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getAlbumTable()->saveAlbum($album);

                return $this->redirect()->toRoute('album');
            }
        }

        return ['id' => $id, 'form' => $form];
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int)$request->getPost('id');
                $this->getAlbumTable()->deleteAlbum($id);
            }

            return $this->redirect()->toRoute('album');
        }

        return array(
            'id'    => $id,
            'album' => $this->getAlbumTable()->getAlbum($id),
        );
    }

    public function getAlbumTable()
    {
//        if (!$this->albumTable) {
//            $sm = $this->getServiceLocator();
//            $this->albumTable = $sm->get('Album\Model\AlbumTable');
//        }

        return $this->albumTable;
    }
}