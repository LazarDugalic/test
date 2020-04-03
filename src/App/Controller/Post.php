<?php

namespace MVC\Controller;

use MVC\Core\Twig;
use MVC\Model\Post\PostRepository;

class Post
{
    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $posts = PostRepository::getPosts();

        Twig::render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    public function add()
    {
        echo "post add action";
    }
}