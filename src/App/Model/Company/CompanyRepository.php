<?php
namespace MVC\Model\Company;

use MVC\Core\Database\Database;

class CompanyRepository
{
    private $db;
    private $insertCompany = "INSERT INTO company (email, name, text, status) VALUES (?, ?, ?, 0)";
    private $deleteCompany = "DELETE  FROM company WHERE id = ?";
    private $getCompanyById = "SELECT * FROM company WHERE id = ?";
    private $getAllCompanys = "SELECT * FROM company ORDER BY id ASC";

    public function __construct()
    {
        $this->db = Database::createInstance();
    }


    /**
     * @return mixed
     */
    public function findAll()
    {
        $statement = $this->db->prepare($this->getAllCompanys);
        $statement->execute();

        return $statement->fetchAll();
    }

    /**
     * @param $email
     * @param $name
     * @param $text
     */
    public function createNewCompany($email, $name, $text)
    {
        $statement = $this->db->prepare($this->insertCompany);
        $statement->bindValue(1, $email);
        $statement->bindValue(2, $name);
        $statement->bindValue(3, $text);

        $statement->execute();
    }

    /**
     * @param $id
     */
    public function deleteCompany($id)
    {
        $statement = $this->db->prepare($this->deleteCompany);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $statement = $this->db->prepare($this->getCompanyById);
        $statement->bindValue(1, $id);
        $statement->execute();

        return $statement->fetch();
    }
}