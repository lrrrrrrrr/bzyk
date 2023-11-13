<?php

namespace Application\Mappers;

use Application\Entities\Blog;
use Application\Persistence\Collection;

class BlogMapper extends Mapper
{
    public function findAll() {
        $sql = 'SELECT id,title, content, user_id FROM blog';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $blogs = new Collection();
        foreach ($result as $row) {
            $blog = new Blog();
            $blog->setId($row['id']);
            $blog->setTitle($row['title']);
            $blog->setContent($row['content']);
            $blog->setUserId($row['user_id']);
            $blogs->add($blog);
        }

        return $blogs;
    }

    public function find($id) {
        $sql = 'SELECT id,title, content, user_id FROM blog WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();

        $blog = new Blog();
        $blog->setId($result['id']);
        $blog->setTitle($result['title']);
        $blog->setContent($result['content']);
        $blog->setUserId($result['user_id']);

        return $blog;
    }

    public function insert(Blog $blog) {
        $sql = 'INSERT INTO blog (title, content, user_id, created) VALUES (:title, :content, :user_id, :created)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'title' => $blog->getTitle(),
            'content' => $blog->getContent(),
            'user_id' => $blog->getUserId(),
            'created' => $blog->getCreated()
        ]);
    }

    public function update(Blog $blog) {
        $sql = 'UPDATE blog SET title = :title, content = :content, user_id = :user_id WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'title' => $blog->getTitle(),
            'content' => $blog->getContent(),
            'user_id' => $blog->getUserId(),
            'id' => $blog->getId()
        ]);
    }

    public function delete($id) {
        $sql = 'DELETE FROM blog WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}