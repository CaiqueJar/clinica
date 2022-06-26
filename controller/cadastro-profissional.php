
<?php
    header("Location: ../area-restrita/crud-profissional.php");
    require_once("../model/Profissional.php");

    $nome = $_POST["nomeProfissional"];
    $cpf = $_POST ["cpfProfissional"];
    $rg = $_POST ["rgProfissional"];

    $profissional = new Profissional();


    $profissional -> setNomeProfissional($nome);
    $profissional -> setCpfProfissional($cpf);
    $profissional -> setRgProfissional($rg);

    $profissional ->cadastrar($profissional);


?>
