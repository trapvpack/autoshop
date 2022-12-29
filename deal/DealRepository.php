<?php

class DealRepository
{

    private PDO $db;

    function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function fetchDeals(): bool|PDOStatement
    {
        return $this->db->query('
        SELECT * FROM deal
        INNER JOIN car ON car.car_id=deal.id_car
        ');
    }

    public function filteredDeals(): bool|array
    {
        $stmt = $this->db->prepare('
        SELECT * FROM deal INNER JOIN car
        ON car.id=deal.id_car WHERE
        deal.username LIKE ?
        AND deal.cost LIKE ?;
        ');
        $stmt->execute(['%' . $_GET['username'] . '%', $_GET['cost']]);
        return $stmt->fetchAll();
    }

    public function byId(int $id): mixed
    {
        $stmt = $this->db->prepare('
        SELECT * FROM autoshop.deal
        INNER JOIN car c ON deal.id_car = c.car_id
        WHERE deal.id = ? LIMIT 1
        ');
        $stmt->execute([$id]);
        $deals = $stmt->fetchAll();
        return $this->nullIfEmpty($deals);
    }

    public function create(array $post): bool {
        $stmt =  $this->db->prepare('
      INSERT INTO autoshop.deal (photo, username, review, cost, id_car) 
      VALUES (?, ?, ?, ?, ?)
    ');
        return $stmt->execute([
            null,
            $post['username'],
            $post['review'],
            $post['cost'],
            $post['id_car']
        ]);
    }

    public function edit(array $post): bool {
        $stmt = $this->db->prepare('
        UPDATE autoshop.deal
        SET username = ?, review = ?, cost = ?,  id_car = ?
        WHERE id = ?
    ');
        return $stmt->execute([
            $post['username'],
            $post['review'],
            $post['cost'],
            $post['id_car'],
            $post['id']
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('
        DELETE FROM autoshop.deal WHERE id =?
        ');
        return $stmt->execute([$id]);
    }

    public function changePicture(string $path, int $id): bool
    {
        $stmt = $this->db->prepare('
        UPDATE autoshop.deal
        SET photo = ? WHERE id = ?
        ');
        return $stmt->execute([$path, $id]);
    }

    private function nullIfEmpty(bool|array $deals): mixed {
        if (!count($deals)) {
            return null;
        }
        return $deals[0];
    }
}