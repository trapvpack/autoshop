<?php

class UserRepository
{
    private PDO $db;
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function byEmail(string $email): mixed {
        return $this->by('email', $email);
    }

    public function byId($id): mixed {
        return $this->by('id', $id);
    }

    public function create(User $user): void {
        $this->db->prepare('
      INSERT INTO autoshop.user (fio, email, password, date_of_birthday, bloodGroup, resusFactor)
      VALUES (?, ?, ?, ?, ?, ?)
    ')->execute([
            $user->getFio(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getBirthday(),
            $user->getBloodGroup(),
            $user->getResusFactor()
        ]);
    }

    private function by(string $key, mixed $value): mixed {
        $stmt = $this->db->prepare(
            'SELECT * FROM autoshop.user WHERE ' . $key . ' = ? LIMIT 1'
        );
        $stmt->execute([$value]);
        $users = $stmt->fetchAll();
        if (!count($users)) {
            return null;
        }
        return $users[0];
    }
}