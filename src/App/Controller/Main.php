<?php

namespace MVC\Controller;

use MVC\Model\Comment\Comment;
use MVC\Model\Comment\CommentRepository;

class Main
{
    public function index()
    {
        $comments = (new CommentRepository())->findAll();

        var_dump($comments);die();
    }
}