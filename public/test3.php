<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-12
 * Time: 下午11:02
 */

require_once "../vendor/autoload.php";

$table = new Zend\Text\Table\Table(array('columnWidths' => array(10, 20)));

$table->appendRow(array('Zend', 'Framework'));

$row = new \Zend\Text\Table\Row();

$row->appendColumn(new \Zend\Text\Table\Column('Hello'));
$row->appendColumn(new \Zend\Text\Table\Column('World'));

$table->appendRow($row);

echo $table;