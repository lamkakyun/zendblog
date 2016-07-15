<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午3:25
 */

// namespace Blog\Service;

// use Blog\Model\Post;

/**
 * Class PostService
 * @package Blog\Service
 * @deprecated 不再用这个类，重构了这个类
 */
// class PostServiceDeprecated implements PostServiceInterface {

//     protected $data = array(
//         array(
//             'id'    => 1,
//             'title' => 'Hello World #1',
//             'text'  => 'This is our first blog post!'
//         ),
//         array(
//             'id'     => 2,
//             'title' => 'Hello World #2',
//             'text'  => 'This is our second blog post!'
//         ),
//         array(
//             'id'     => 3,
//             'title' => 'Hello World #3',
//             'text'  => 'This is our third blog post!'
//         ),
//         array(
//             'id'     => 4,
//             'title' => 'Hello World #4',
//             'text'  => 'This is our fourth blog post!'
//         ),
//         array(
//             'id'     => 5,
//             'title' => 'Hello World #5',
//             'text'  => 'This is our fifth blog post!'
//         )
//     );

//     public function findAllPosts()
//     {
//         $allPosts = [];

//         foreach($this->data as $key => $post) {
//             $allPosts[] = $this->findPost($key);
//         }

//         return $allPosts;
//     }

//     public function findPost($key)
//     {
//         $postData = $this->data[$key];

//         $model = new Post();
//         $model->setId($postData['id']);
//         $model->setTitle($postData['title']);
//         $model->setText($postData['text']);

//         return $model;
//     }

// }