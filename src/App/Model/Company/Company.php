<?php


namespace App\Entity;

/**
 * Class Company
 * @package App\Entity
 */
class Company
{
    /** @var int $id */
    private $id;

    /** @var string $name */
    private $name;

    /** @var integer $regNumber */
    private $regNumber;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getRegNumber(): int
    {
        return $this->regNumber;
    }

    /**
     * @param int $regNumber
     */
    public function setRegNumber(int $regNumber): void
    {
        $this->regNumber = $regNumber;
    }
}