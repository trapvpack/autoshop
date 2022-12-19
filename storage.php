<?php

class Storage
{
    private $db;
    public function __construct()
    {
        $user = 'root';
        $pass = '';

        $this->db = new PDO('mysql:host=localhost;dbname=autoshop', $user, $pass);
    }

    public function filter()
    {
        $stmt = $this->db->prepare('select * from deal inner join car on car.id = deal.id_car where username like ? and cost like ?');
        $stmt->execute([
            '%'.$_GET['username'].'%',
            $_GET['cost']
        ]);
        return $stmt->fetchAll();
    }

    public function fetchDeals()
    {
       return $this->db->query('select * from deal inner join car on car.id = deal.id_car');

    }

}