<?php

require_once '../model/Guest.php';
require_once '../dao/GuestDAO.php';


class ReadController
{

    private $guestDAO;

    public function __construct()
    {
        $this->guestDAO = new GuestDAO();
        $this->init();
    }

    public function init()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->show();
        } else {
            return;
        }
    }

    public function selectAll()
    {
        try {
            $guests = $this->guestDAO->selectAll();  
            return $guests;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show() {
        $guests = $this->selectAll();
        foreach ($guests as $guest) {
            echo '<tr>';
            echo '<td>' . $guest->getId() . '</td>';
            echo '<td>' . $guest->getName() . '</td>';
            echo '<td>' . $guest->getCpf() . '</td>';
            echo '<td>' . $guest->getPhone() . '</td>';
            echo '<td>' . $guest->getRoom() . '</td>';

            echo   '<td>
                        <form action="../view/update.php" method="GET">
                            <input type="hidden" name="id" value=" ' . $guest->getId() . '">
                            <button class="btn btn-outline-info" type="input">Editar</button>
                        </form>
                    </td>';

            echo   '<td>
                        <form action="../view/delete.php" method="GET">
                            <input type="hidden" name="id" value=" ' . $guest->getId() . '">
                            <button class="btn btn-outline-danger" type="input">Excluir</button>
                        </form>
                    </td>';


            echo '</tr>';
        }
    }
}
