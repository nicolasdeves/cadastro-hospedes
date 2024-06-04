<?php

require_once '../../model/Guest.php';
require_once '../../dao/GuestDAO.php';

class DeleteController {

    private $guestDAO;

    public function __construct() {
        $this->guestDAO = new GuestDAO();
        $this->init();
    }

    public function init() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            
            $id = $_POST['id'];

            $this->delete($id);
            
        } else {
            return;
        }
    }

    public function delete($id) {
        try {
            $this->guestDAO->delete($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        header('Location: ../../view/list.php');
    }
}

new DeleteController();