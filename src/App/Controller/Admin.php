<?php
namespace MVC\Controller;
session_start();

use MVC\Core\Twig;
use MVC\Model\Comment\CommentRepository;
use MVC\Model\Product\ProductRepository;
use MVC\Model\User\UserRepository;

class Admin
{
    public function index()
    {
        if (!$_SESSION['logged_user'] || $_SESSION['logged_user'] == null) {
            header('Location: /admin/login');
        }
        $comments = (new CommentRepository())->findAll();

        Twig::render('admin/index.html.twig', [
            'comments' => $comments,
        ]);
    }

    public function login()
    {
        if ($_POST['login']) {
            $userRepository = new UserRepository();
            $user = $userRepository->findByEmail($_POST['email']);

            if ($user) {
                if ($user['password'] == $_POST['password']) {
                    $_SESSION['logged_user'] = $_POST['email'];

                    header('Location: /admin/index');
                } else {
                    Twig::render('admin/login.html.twig', [
                        'message' => 'Wrong credentials !'
                    ]);
                }
            } else {
                Twig::render('admin/login.html.twig', [
                    'message' => 'Wrong credentials !'
                ]);
            }
        } else {
            Twig::render('admin/login.html.twig');
        }
    }
}