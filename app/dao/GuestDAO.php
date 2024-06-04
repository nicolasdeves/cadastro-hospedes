<?php

class GuestDAO {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('C:/Users/nicolas.deves/Desktop/Dev/Projetos/cadastro-hospedes/database/db.db');

    }

    public function insert($guest) {
        $stmt = $this->db->prepare('INSERT INTO guest (name, cpf, phone, room) VALUES (:name, :cpf, :phone, :room)');

        $stmt->bindValue(':name', $guest->getName());
        $stmt->bindValue(':cpf', $guest->getCpf());
        $stmt->bindValue(':phone', $guest->getPhone());
        $stmt->bindValue(':room', $guest->getRoom());
        //$stmt->execute();

        return true ? $stmt->execute() : false;
    }

    public function edit ($guest) {
        $stmt = $this->db->prepare('UPDATE guest SET name = :name, cpf = :cpf, phone = :phone, room = :room WHERE id = :id');

        $stmt->bindValue(':id', $guest->getId());
        $stmt->bindValue(':name', $guest->getName());
        $stmt->bindValue(':cpf', $guest->getCpf());
        $stmt->bindValue(':phone', $guest->getPhone());
        $stmt->bindValue(':room', $guest->getRoom());
        $stmt->bindValue(':id', $guest->getId());
        $stmt->execute();

        //return true ? $stmt->execute() : false;
    }

    public function delete($id) {
        try {
            $stmt = $this->db->prepare('DELETE FROM guest WHERE id = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return true; // Retorna true se a exclusão foi bem-sucedida
        } catch (Exception $e) {
            // Captura e trata qualquer exceção que ocorra durante a execução da consulta
            echo 'Erro ao excluir: ' . $e->getMessage();
            return false; // Retorna false se houver um erro
        }
    }
    
    public function selectById ($id) {
        $stmt = $this->db->prepare('SELECT * FROM guest WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();

        $guest = new Guest();

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $guest->setId($row['id']);
            $guest->setName($row['name']);
            $guest->setCpf($row['cpf']);
            $guest->setPhone($row['phone']);
            $guest->setRoom($row['room']);
        }

        return $guest;
    }

    public function selectAll() {
        $stmt = $this->db->prepare('SELECT * FROM guest');
        $result = $stmt->execute();

        $guests = array();

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

            $guest = $this->selectById($row['id']);

            array_push($guests, $guest);
        }

        
        return $guests;
    }  
}