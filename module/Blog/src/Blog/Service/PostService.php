<?php
/**
 * Created by PhpStorm.
 * User: jet
 * Date: 16-7-9
 * Time: 下午3:58
 */

namespace Blog\Service;

use Blog\Mapper\PostMapperInterface;
use Blog\Model\PostInterface;

class PostService implements PostServiceInterface {

    protected $postMapper;

    /**
     * $postMapper 由工厂创建
     * @param PostMapperInterface $postMapper
     */
    function __construct(PostMapperInterface $postMapper)
    {
        $this->postMapper = $postMapper;
    }


    public function findAllPosts()
    {
        return $this->postMapper->findAll();
    }

    public function findPost($id)
    {
        return $this->postMapper->find($id);
    }

    public function savePost(PostInterface $post)
    {
        return $this->postMapper->save($post);
    }

    public function deletePost(PostInterface $post) {
        return $this->postMapper->delete($post);
    }

}