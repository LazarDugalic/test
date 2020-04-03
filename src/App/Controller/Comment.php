<?php


namespace MVC\Controller;


use http\Env\Request;
use MVC\Core\Twig;
use MVC\Model\Comment\CommentRepository;

class Comment
{
    public function create()
    {
        $email = $_POST['email'] ? : null;
        $name = $_POST['name'] ? : null;
        $text = $_POST['text'] ? : null;
        $message = '';

        if ($_POST['publish']) {
            if (!empty($email) && !empty($name) && !empty($text)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    (new CommentRepository())->createNewComment($email, $name, $text);
                } else {
                    $message = 'Invalid email format !';
                }
            } else {
                $message = 'All fields must be filled in !';
            }
        }

        header('Location: /main/index');
    }
}