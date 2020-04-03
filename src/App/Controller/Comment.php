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

        if ($_POST['publish']) {
            if (!empty($email) && !empty($name) && !empty($text)) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    (new CommentRepository())->createNewComment($email, $name, $text);
                }
            }
        }

        header('Location: /main/index');
    }

    public function approval()
    {
        if ($_POST['comment-id']) {
            (new CommentRepository())->changeCommentStatus((int) $_POST['comment-id']);
        }

        header('Location: /admin/index');
    }
}