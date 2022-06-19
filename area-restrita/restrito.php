<?php
    session_start();
    $isLogged = $_SESSION["logged"] ?? null;

    if($_SESSION["logged"] != True) {
      die("Não tens acesso a essa página!!");
      
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
        <head>
        <link rel="stylesheet" href="..//assets//css//menu.css">
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="menu.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>

        <div class="sidebar">
            <div class="logo-details">
            <a href="../index.php" target=""> 
              <img width="50" height="50" class="favicon-sidebar" src="..//assets//img//favicon.png" alt="Black Icon"> 
            </a>
                <a href="restrito.php"><span class="logo_name">ADMIN</span></a>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="crud-paciente.php">
                        <i class='bx bxs-spreadsheet' ></i>
                        <span class="link_name">Paciente</span>
                    </a>

                </li>
                <li>
                    <a href="crud-profissional.php">
                        <i class='bx bx-dollar-circle'></i>
                        <span class="link_name">Profissional</span>
                    </a>

                </li>
                <li>
                    <a href="crud-agendamento.php">
                        <i class='bx bx-briefcase'></i>
                        <span class="link_name">Agendamento</span>
                    </a>

                </li>
                <li>
                    <a href="../logout.php">
                        <i class='bx bx-log-out'></i>
                        <span class="link_name"> Sair</span>
                    </a>

                </li>
            </ul>
        </div>
        <section class="home-section">
          <div class="home-content">
              <i class="bx bx-menu"></i>
              <!-- Colocar a tabela aqui caso de ruim na formatação do layout -->
          </div>
          <div class="welcome">
          

        <div class="section section-our-team-freebie">
            <a id="quem-somos"></a>
            <div class="parallax filter filter-color-black">
                <div class="image" style="background-image:url('assets/img/gaia-2.jpg')">
                </div>
                <div class="container">
                    <div class="content">
                        <div class="row">
                            <div style="margin: 45px auto 70px 40px;" class="title-area">
                                <h2>Bem vindo á área do administrador</h2>
                                <p>Selecione abaixo uma das opções para as áreas de administrações de seus respectivos agentes:</p>
                            </div>
                        </div>

                        <div class="team">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div style="margin: 0 0 0 30px;" class="row">
                                        <div class="col-md-4">
                                            <div class="card card-member">
                                                <div class="content">
                                                    <div class="description">
                                                        <h3 class="title text-center mt-3 mb-3">Profissional</h3>
                                                        <img style="margin: 5px auto 5px auto;" src="..//assets//img//funcionario.jpg" class="card-img-top" alt="...">
                                                        <div style="margin: 10px auto 15px auto;" class="text-center">
                                                            <a href="../area-restrita/crud-profissional.php"><button type="button" class="btn btn-secondary">Entrar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-member">
                                                <div class="content">
                                                    <div class="description">
                                                        <h3 class="title text-center mt-3 mb-3">Paciente</h3>
                                                        <img style="margin: 5px auto 5px auto;" src="..//assets//img//paciente.jpg" class="card-img-top" alt="...">
                                                        <div style="margin: 10px auto 15px auto;" class="text-center">
                                                            <a href="../area-restrita/crud-paciente.php"><button type="button" class="btn btn-secondary">Entrar</button></a>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card card-member">
                                                <div class="content">
                                                    <div class="description">
                                                        <h3 class="title text-center mt-3 mb-3">Agendamento</h3>
                                                        <img style="margin: 5px auto 5px auto;" src="..//assets//img//agenda.png" class="card-img-top" alt="...">
                                                        <div style="margin: 10px auto 15px auto;" class="text-center">
	                                                        <a href="../area-restrita/crud-agendamento.php"><button type="button" class="btn btn-secondary">Entrar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <script>
            const btn = document.querySelector(".bx-menu");
            const sidebar = document.querySelector(".sidebar");
            const searchBtn = document.querySelector("bx-search");
            
            btn.addEventListener("click", ()=>{
                sidebar.classList.toggle("close");
            });
            
        </script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>

    </body>
</html>
