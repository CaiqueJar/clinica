
<?php
    header("Location: ../area-restrita/crud-profissional.php");
    require_once("../model/Profissional.php");

     $id = $_POST['idProfissional'];

    $profissional = new Profissional();
    $profissional->deletar($id);

?> 
