<?php

require_once '../../model/Guest.php';
require_once '../../dao/GuestDAO.php';

class UpdateController {

    private $guest;
    private $guestDAO;

    public function __construct() {
        $this->guestDAO = new GuestDAO();
        $this->init();
    }

    public function init() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['name']) && isset($_POST['cpf']) && isset($_POST['phone']) && isset($_POST['room'])) {
            
            $id = $_POST['id'];
            $name = strtoupper($_POST['name']);
            $cpf = $_POST['cpf'];
            $phone = $_POST['phone'];
            $room = $_POST['room'];

            $this->guest = new Guest($id, $name, $cpf, $phone, $room);
            $this->edit();
            
        } else {
            echo "Erro init";
            return;
        }
    }

    public function edit() {
        try {
            $this->guestDAO->edit($this->guest);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        header('Location: ../../view/list.php');
    }
}

new UpdateController();

