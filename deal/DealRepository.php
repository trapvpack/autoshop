<?php

class DealRepository
{

    private PDO $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function fetchDeals(): bool PDOStatement
    {
        return $this->db->query('
        SELETCT * FROM menu_item
        INNER JOIN
        ');
    }
}