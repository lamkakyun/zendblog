<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午4:00
 */

namespace Blog\Mapper;

use Blog\Model\PostInterface;

interface PostMapperInterface {

    public function find($id);

    public function findAll();

    public function save(PostInterface $postObject);

    public function delete(PostInterface $blog);
}