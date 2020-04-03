<?php
namespace MVC\Model\Product;

use MVC\Core\Database\Database;

class ProductRepository
{
    private $db;
    private $insertProduct = "INSERT INTO product (email, name, text, status) VALUES (?, ?, ?, 0)";
    private $deleteProduct = "DELETE  FROM product WHERE id = ?";
    private $getProductById = "SELECT * FROM product WHERE id = ?";
    private $getAllProducts = "SELECT * FROM product ORDER BY id ASC";

    public function __construct()
    {
        $this->db = Database::createInstance();
    }


    /**
     * @return mixed
     */
    public function findAll()
    {
        $statement = $this->db->prepare($this->getAllProducts);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $email
     * @param $name
     * @param $text
     */
    public function createNewProduct($email, $name, $text)
    {
        $statement = $this->db->prepare($this->insertProduct);
        $statement->bindValue(1, $email);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $text);

        $statement->execute();
    }

    /**
     * @param $id
     */
    public function deleteProduct($id)
    {
        $statement = $this->db->prepare($this->deleteProduct);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->db->prepare($this->getProductById);
        $statement->bindValue(1, $id);
        $statement->execute();

        return $statement->fetch();
    }
}