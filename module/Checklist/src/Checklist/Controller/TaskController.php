<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 下午7:33
 */

namespace Checklist\Controller;

use Checklist\Form\TaskForm;
use Checklist\Model\TaskEntity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TaskController extends AbstractActionController
{

    public function indexAction()
    {
        $mapper = $this->getTaskMapper();
        return new ViewModel(array('tasks' => $mapper->fetchAll()));
    }


    public function addAction()
    {
        $form = new TaskForm();
        $task = new TaskEntity();
        $form->bind($task);

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getTaskMapper()->saveTask($task);

                return $this->redirect()->toRoute('task');
            }
        }

        return array('form' => $form);
    }


    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) return $this->redirect()->toRoute('add');

        $task = $this->getTaskMapper()->getTask($id);

        $form = new TaskForm();
        $form->bind($task);

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getTaskMapper()->saveTask($task);
                return $this->redirect()->toRoute('task');
            }
        }

        return array('id' => $id, 'form' => $form);
    }


    public function deleteAction()
    {
        $id = (int)$this->params('id');

        if (!$id) return $this->redirect()->toRoute('task');
        $task = $this->getTaskMapper()->getTask($id);
        if (!$task) return $this->redirect()->toRoute('task');

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($request->getPost('del') == 'Yes') {
                $this->getTaskMapper()->deleteTask($id);
                return $this->redirect()->toRoute('task');
            }
        }

        return array(
            'id'   => $id,
            'task' => $task,
        );
    }


    public function getTaskMapper()
    {
        $sm = $this->getServiceLocator();
        return $sm->get('TaskMapper');
    }
}