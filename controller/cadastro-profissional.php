
<?php

    require_once("../model/Profissional.php");

    $nome = $_POST["txtNomeP"];
    $cpfR = $_POST ["txtCpfP"];
    $rgR = $_POST ["txtRgP"];

    $profissional = new Profissional();


    $profissional -> setNomeProfissional($nome);
    $profissional -> setCpfProfissional($cpfR);
    $profissional -> setRgProfissional($rgR);

?>
