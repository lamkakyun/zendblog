<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-10
 * Time: 下午7:36
 */

namespace Checklist\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\ClassMethods;

class TaskMapper
{

    protected $dbAdapter;
    protected $tableName = 'task_item';
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }


    public function fetchAll()
    {
//        $select = new Select($this->tableName);
        $select = $this->sql->select();
        $select->order(array('completed ASC', 'created DESC'));

        $stmt = $this->sql->prepareStatementForSqlObject($select);
        $results = $stmt->execute();

        $entityPrototype = new TaskEntity();
        $hydrator = new ClassMethods();
        $resultSet = new HydratingResultSet($hydrator, $entityPrototype);
        $resultSet->initialize($results);

        return $resultSet;
    }


    public function saveTask(TaskEntity $task)
    {
        $hydrator = new ClassMethods();
        // Extract values from an object with class methods , @return array
        $data = $hydrator->extract($task);

        if ($task->getId()) {
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $task->getId()));
        } else {
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }

        $stmt = $this->sql->prepareStatementForSqlObject($action);
        $result = $stmt->execute();

        if (!$task->getId()) {
            $task->setId($result->getGeneratedValue());
        }

        return $task;
    }

    public function getTask($id) {
        $select = $this->sql->select();
        $select->where(array('id' => $id));

        $stmt = $this->sql->prepareStatementForSqlObject($select);
        $result = $stmt->execute()->current();

        if (!$result) return null;

        $hydrator = new ClassMethods();
        $task = new TaskEntity();
        $hydrator->hydrate($result, $task);

        return $task;
    }


    public function deleteTask($id) {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));

        $stmt = $this->sql->prepareStatementForSqlObject($delete);
        $result = $stmt->execute();

        return $result->getAffectedRows() ? true : false;
    }
}