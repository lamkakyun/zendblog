<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午3:22
 */

namespace Blog\Service;

/**
 * A Service is an object that executes complex application logic.
 * It’s the part of the application that wires all difficult stuff together and gives you easy to understand results
 */
use Blog\Model\PostInterface;

/**
 * When writing a Service it is a common best-practice to define an Interface first.
 * Interfaces are a good way to ensure that other programmers can easily build extensions for our Services using their own implementations.
 */

interface PostServiceInterface {

    public function findAllPosts();

    public function findPost($id);

    public function savePost(PostInterface $blog);

    public function deletePost(PostInterface $blog);
}