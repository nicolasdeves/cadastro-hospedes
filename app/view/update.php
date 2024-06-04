<?php

require_once '../model/Guest.php';
require_once '../dao/GuestDAO.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $guestDAO = new GuestDAO();
    $guest = $guestDAO->selectById($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <?php include("header.php")?> 
</head>

<body class=" align-items-center justify-content-center vh-100">
<br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <form class="col-12 col-md-6 col-lg-4" method="post" action="../controller/guest/UpdateController.php">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?php echo $guest->getId() ?>" name="id" readonly>
                    <label for="floatingInput">Id</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" value="<?php echo $guest->getName() ?>" placeholder="Nome" name="name">
                    <label for="floatingInput">Nome</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="<?php echo $guest->getCpf() ?>" placeholder="CPF" name="cpf">
                    <label for="floatingPassword">CPF</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="<?php echo $guest->getPhone() ?>" placeholder="Telefone" name="phone">
                    <label for="floatingPassword">Telefone</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="<?php echo $guest->getRoom() ?>" placeholder="Quarto" name="room">
                    <label for="floatingPassword">Quarto</label>
                </div>

                <button type="submit" class="btn btn-outline-secondary w-100 mt-3">Editar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>