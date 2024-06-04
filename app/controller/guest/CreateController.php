<?php

require_once '../../model/Guest.php';
require_once '../../dao/GuestDAO.php';

class CreateController {

    private $guest;
    private $guestDAO;

    public function __construct() {
        $this->guestDAO = new GuestDAO();
        $this->init();
    }

    public function init() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && isset($_POST['cpf']) && isset($_POST['phone']) && isset($_POST['room'])) {
            
            $id = null;
            $name = strtoupper($_POST['name']);
            $cpf = $_POST['cpf'];
            $phone = $_POST['phone'];
            $room = $_POST['room'];

            $this->guest = new Guest($id, $name, $cpf, $phone, $room);
            $this->insert();
            
        } else {
            return;
        }
    }

    public function insert() {
        try {
            $this->guestDAO->insert($this->guest);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        header('Location: ../../view/create.php');
    }
}

new CreateController();

