<?php
namespace MVC\Model\Comment;

use MVC\Core\Database\Database;

class CommentRepository
{
    private $db;
    private $insertComment = "INSERT INTO comment (email, name, text, status) VALUES (?, ?, ?, 0)";
    private $deleteComment = "DELETE  FROM comment WHERE id = ?";
    private $getCommentById = "SELECT * FROM comment WHERE id = ?";
    private $getAllowedComment = "SELECT * FROM comment WHERE status = 1";
    private $getAllComments = "SELECT * FROM comment ORDER BY id ASC";
    private $changeStatus = "UPDATE comment SET status = ? WHERE id = ?;";

    public function __construct()
    {
        $this->db = Database::createInstance();
    }


    /**
     * @return mixed
     */
    public function findAll()
    {
        $statement = $this->db->prepare($this->getAllComments);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $email
     * @param $name
     * @param $text
     */
    public function createNewComment($email, $name, $text)
    {
        $statement = $this->db->prepare($this->insertComment);
        $statement->bindValue(1, $email);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $text);

        $statement->execute();
    }

    /**
     * @param $id
     */
    public function deleteComment($id)
    {
        $statement = $this->db->prepare($this->deleteComment);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findAllAllowed()
    {
        $statement = $this->db->prepare($this->getAllowedComment);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function find($id)
    {
        $statement = $this->db->prepare($this->getCommentById);
        $statement->bindValue(1, $id);
        $statement->execute();

        return $statement->fetch();
    }

    public function changeCommentStatus($id)
    {
        $comment = $this->find($id);
        $status = $comment['status'] ? 0 : 1;
        $statement = $this->db->prepare($this->changeStatus);
        $statement->bindValue(1, $status);
        $statement->bindValue(2, $comment['id']);

        $statement->execute();
    }
}