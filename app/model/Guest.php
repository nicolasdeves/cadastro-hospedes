<?php

class Guest {
    private $id;
    private $name;
    private $cpf;
    private $phone;
    private $room;

    public function __construct($id, $nome, $cpf, $telefone, $quarto) {
        $this->id = $id;
        $this->name = $nome;
        $this->cpf = $cpf;
        $this->phone = $telefone;
        $this->room = $quarto;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getRoom() {
        return $this->room;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setRoom($room) {
        $this->room = $room;
    }  
}