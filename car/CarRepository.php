<?php

class CarRepository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function fetchCars(): bool|PDOStatement
    {
        return $this->db->query('SELECT * FROM autoshop.car');
    }

    public function idByName(string $name)
    {
        $stmt = $this->db->prepare('
        SELECT id FROM autoshop.car WHERE carname = ? LIMIT 1;
        ');
        $stmt->execute([$name]);
        $cars = $stmt->fetchAll();
        return $this->nullIfEmpty($cars)['id'];
    }

    private function nullIfEmpty(bool|array $cars): mixed
    {
        if (!count($cars))
        {
            return null;
        }
        return $cars[0];
    }
}