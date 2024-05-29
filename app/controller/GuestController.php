<?php

require_once 'app/model/Guest.php';
require_once 'app/dao/GuestDAO.php';

class GuestController {
    
    private $guest;
    private $guestDAO;

    public function __construct($id, $name, $cpf, $phone, $room) {
        $this->guest = new Guest($id, $name, $cpf, $phone, $room);
        $this->guestDAO = new GuestDAO();
    }

    public function insert() {
        try {
            $this->guestDAO->insert($this->guest);
            header('Location: list.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete() {
        try {
            $this->guestDAO->delete($this->guest->getId());
            header('Location: list.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit() {
        try {
            $this->guestDAO->edit($this->guest);
            header('Location: list.php');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectAll() {
        try {
            return $this->guestDAO->selectAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}