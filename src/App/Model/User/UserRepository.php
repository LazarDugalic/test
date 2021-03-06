<?php
namespace MVC\Model\User;

use MVC\Core\Database\Database;

class UserRepository
{
    private $db;
    private $insertUser = "INSERT INTO user (email, name, text, status) VALUES (?, ?, ?, 0)";
    private $deleteUser = "DELETE  FROM user WHERE id = ?";
    private $getUserById = "SELECT * FROM user WHERE id = ?";
    private $getUserByEmail = "SELECT * FROM user WHERE email = ?";
    private $getAllUsers = "SELECT * FROM user ORDER BY id ASC";

    public function __construct()
    {
        $this->db = Database::createInstance();
    }


    /**
     * @return mixed
     */
    public function findAll()
    {
        $statement = $this->db->prepare($this->getAllUsers);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $email
     * @param $name
     * @param $text
     */
    public function createNewUser($email, $name, $text)
    {
        $statement = $this->db->prepare($this->insertUser);
        $statement->bindValue(1, $email);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $text);

        $statement->execute();
    }

    /**
     * @param $id
     */
    public function deleteUser($id)
    {
        $statement = $this->db->prepare($this->deleteUser);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->db->prepare($this->getUserById);
        $statement->bindValue(1, $id);
        $statement->execute();

        return $statement->fetch();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        $statement = $this->db->prepare($this->getUserByEmail);
        $statement->bindValue(1, $email);
        $statement->execute();

        return $statement->fetch();
    }
}