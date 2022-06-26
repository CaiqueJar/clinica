<?php
    session_start();

    $_SESSION["logged"] = $_SESSION["logged"] ?? False;


    $login = "adm";
    $senha = "123";

    $loginPost = $_POST["usernameId"] ?? null;
    $senhaPost = $_POST["passwordId"] ?? null;

    if($login == $loginPost && $senha == $senhaPost) {
        $_SESSION["logged"] = True;
        $_SESSION["login"] = $loginPost;
        $_SESSION["senha"] = $senhaPost;
        header("Location: area-restrita/restrito.php");
    }


?>