<?php

namespace MVC\Controller;

use MVC\Core\Twig;
use MVC\Model\Comment\CommentRepository;
use MVC\Model\Product\ProductRepository;

class Main
{
    public function index()
    {
        $comments = (new CommentRepository())->findAllAllowed();
        $products = (new ProductRepository())->findAll();

        Twig::render('default/index.html.twig', [
            'products' => $products,
            'comments' => $comments
        ]);
    }
}