<?php


namespace MVC\Controller;


use MVC\Core\Twig;
use MVC\Model\Comment\CommentRepository;
use MVC\Model\Product\ProductRepository;
use MVC\Model\User\UserRepository;

class Admin
{
    public function index()
    {
        $comments = (new CommentRepository())->findAll();

        Twig::render('admin/index.html.twig', [
            'comments' => $comments,
        ]);
    }
}