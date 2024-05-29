<?php

require_once 'app/model/Guest.php';
require_once 'app/dao/GuestDAO.php';

class GuestController {
    
    private $guest;

    public function __construct($id, $name, $cpf, $phone, $room) {
        $this->guest = new Guest($id, $name, $cpf, $phone, $room);
    }

    


    
}