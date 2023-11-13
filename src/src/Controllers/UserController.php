<?php

namespace Application\Controllers;
class UserController extends AbstractBase
{
    public function indexAction()
    {
        echo 'Index world';
    }

    public function showAction()
    {
        echo 'Show world';
    }

    public function newAction()
    {
        echo 'New world';
    }

    public function editAction()
    {
        echo 'Edit world';
    }

    public function deleteAction()
    {
        echo 'Delete world';
    }
}
