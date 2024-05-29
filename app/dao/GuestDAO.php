<?php

class GuestDAO {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('../db.db/');
    }

    public function insert($guest) {
        $stmt = $this->db->prepare('INSERT INTO guest (name, cpf, phone, room) VALUES (:name, :cpf, :phone, :room)');

        $stmt->bindValue(':name', $guest->getName());
        $stmt->bindValue(':cpf', $guest->getCpf());
        $stmt->bindValue(':phone', $guest->getPhone());
        $stmt->bindValue(':room', $guest->getRoom());
        $stmt->execute();

        return true ? $stmt->execute() : false;
    }

    public function edit ($guest) {
        $stmt = $this->db->prepare('UPDATE guest SET name = :name, cpf = :cpf, phone = :phone, room = :room WHERE id = :id');

        $stmt->bindValue(':name', $guest->getName());
        $stmt->bindValue(':cpf', $guest->getCpf());
        $stmt->bindValue(':phone', $guest->getPhone());
        $stmt->bindValue(':room', $guest->getRoom());
        $stmt->bindValue(':id', $guest->getId());
        $stmt->execute();

        return true ? $stmt->execute() : false;
    }

    public function delete($id) {
        $stmt = $this->db->prepare('DELETE FROM guest WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return true ? $stmt->execute() : false;
    }

    public function selectAll() {
        $stmt = $this->db->prepare('SELECT * FROM guest');
        $result = $stmt->execute();

        $guests = [];

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $guest = new Guest($row['id'], $row['name'], $row['cpf'], $row['phone'], $row['room']);
            array_push($guests, $guest);
        }

        return $guests;
    }  
}