
<?php
    header("Location: ../area-restrita/crud-profissional.php");
    require_once("../model/Profissional.php");

    $id = $_POST['idProfissional'];
    $nome = $_POST["nomeProfissional"];
    $cpf = $_POST ["cpfProfissional"];
    $rg = $_POST ["rgProfissional"];

    $profissional = new Profissional();

    $profissional ->editar($id, $nome, $cpf, $rg);


?>
