<?php

namespace Application\Controllers;

use Application\Entities\Blog;
use Application\Mappers\BlogMapper;
use Application\View\View;

class IndexController extends AbstractBase
{
    public function indexAction()
    {
        $blogMapper = new BlogMapper();
        $view = new View('layout.tpl.php', [
            'template' => 'IndexController/indexAction.tpl.php',
            'blogs' => $blogMapper->findAll()
        ]);

        $this->response($view->render());
    }

    public function showAction()
    {
        $id = $_GET['id'];
        $blogMapper = new BlogMapper();
        $view = new View('layout.tpl.php', [
            'template' => 'IndexController/showAction.tpl.php',
            'blog' => $blogMapper->find($id)
        ]);

        $this->response($view->render());
    }

    public function newAction()
    {
        $blogMapper = new BlogMapper();

        $view = new View('layout.tpl.php', [
            'template' => 'IndexController/newAction.tpl.php'
        ]);

        if (isset($_POST['save'])) {
            $blog = new Blog();
            $blog->setTitle($_POST['title']);
            $blog->setContent($_POST['content']);
            $blog->setUserId(1);
            $blog->setCreated((new \DateTime())->format('Y-m-d H:i'));
            $blogMapper->insert($blog);
            $this->redirect('/');
        }

        $this->response($view->render());
    }

    public function editAction()
    {
        $blogMapper = new BlogMapper();
        $id = $_GET['id'];
        $blog = $blogMapper->find($id);

        if (isset($_POST['save'])) {
            $blog->setTitle($_POST['title']);
            $blog->setContent($_POST['content']);
            $blog->setUserId(1);
            $blogMapper->update($blog);
            $this->redirect('/');
        }

        $view = new View('layout.tpl.php', [
            'template' => 'IndexController/editAction.tpl.php',
            'blog' => $blog
        ]);

        $this->response($view->render());
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        $blogMapper = new BlogMapper();
        $blogMapper->delete($id);

        $this->redirect('/');
    }
}
