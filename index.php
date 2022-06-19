<?php
    require_once 'dados_login.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Gaia</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/gaia.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="#home" class="navbar-brand">
                    Gaia
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li>
                        <a href="#home">Home</a>
                    </li>
.                    <li>
                        <a href="#servicos">Serviços</a>
                    </li>
                    <li>
                        <a href="#quem-somos">Quem somos</a>
                    </li>
                    <li>
                        <a href="#tecnologias">Tecnologias</a>
                    </li>
                    <li>
                        <a href="#contato">Contato</a>
                    </li>
                    <li class="dropdown">
                        <a href="#gaia" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-share-alt"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-danger">
                            <li>
                                <a href="#"><i class="fa fa-google"></i> Email</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin"></i> Linkedin</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-github"></i> GitHub</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                        if($_SESSION["logged"] == False) {
                            
                            echo('
                            <li>
                                <a href="#" class="btn btn-danger btn-fill" data-toggle="modal" data-target="#Login" data-whatever="@getbootstrap">Login</a>
                            </li>
                            ');
                        } else {
                            echo('
                            <li>
                                <a href="./area-restrita/restrito.php"><i class="fa fa-user fa-2xl"></i> Usuário</a>
                            </li>
                            <li>
                                <a href="logout.php">sair</a>
                            </li>
                            ');
                        }
                        
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    <!-- Modal do login -->
    <?php if($_SESSION["logged"] == false) { ?>
    <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog-centered" role="document">
                <div class="divLogin">
                    <form action="" method="POST">

                        <h3>Recebaaaaaa</h3>


                        <label for="Usuário">Usuário:</label>
                        <input type="text" placeholder="Usuário" id="usernameId" name="usernameId">

                        <label for="Senha">Senha:</label>
                        <div class="passwordDiv">
                            <input type="password" placeholder="Senha" id="passwordId" name="passwordId">
                            <i style="float: right;" id="eyeId" class="fa-regular fa-eye">*eyes*</i>
                        </div>
                        <button for="Entrar" type="submit">Entrar</button>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                var pswd = $("#passwordId");
                var eye = $("#eyeId");

                eye.mouseenter(function() {
                    pswd.attr("type", "text");
                    eye.attr("class", "fa-regular fa-eye-slash")
                });

                eye.mouseout(function() {
                    pswd.attr("type", "password");
                    eye.attr("class", "fa-regular fa-eye")
                });

                $("#eyeId").mouseout(function() {
                    $("#passwordId").attr("type", "password");
                });
            </script>
        </div>
        <?php } ?>
        <div class="section section-header">
        <a id="home"></a>
        <div class="parallax filter filter-color">
            <div class="image"
                style="background-image: url('assets/img/gaia.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1 class="title-modern">Gaia</h1>
                    </div>

                    <div class="button-get-started">
                        <a href="#" target="_blank" class="btn btn-white btn-fill btn-lg ">
                            Nosso serviços
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section">
        <a id="servicos"></a>
        <div class="container">
            <div class="row">
                <div class="title-area">
                    <h2>Nosso serviços</h2>
                    <div class="separator separator-danger">✻</div>
                    <p class="description">Prometemos-lhe um novo visual e, mais importante, uma nova atitude. Construímos isso conhecendo você, suas necessidades e proporcionando consultas melhores.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-graph1"></i>
                        </div>
                        <h3>Exames básicos</h3>
                        <p class="description">Exames básico como eletrocardiograma, ecocardiograma e exame de sangue com hemograma completo.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-note2"></i>
                        </div>
                        <h3>Consultas especializadas</h3>
                        <p class="description">Consultas especializadas por área, como cardiologia, neurologia, pediatria, ortopedia, ginecologia e outros.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-icon">
                        <div class="icon text-danger">
                            <i class="pe-7s-note"></i>
                        </div>
                        <h3>Exame de rotina/ checkup</h3>
                        <p class="description">Exames de checkup como hemograma, glicemia com jejum e exames de colesterol e tiglicerídeos  .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section section-our-team-freebie">
        <a id="quem-somos"></a>
        <div class="parallax filter filter-color-black">
            <div class="image" style="background-image:url('assets/img/gaia-2.jpg')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="title-area">
                            <h2>Que somos nós</h2>
                            <div class="separator separator-danger">✻</div>
                            <p class="description">Quem são os colaboradores da nosso clínica, quem fazem parte de um time sensacional de desenvolvedores e se esforçam para trazer um serviço de qualidade para todos que tenha o dinheiro para pagar.</p>
                        </div>
                    </div>

                    <div class="team">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/python.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Athirson</h3>
                                                    <p class="small-text">Front-end | Developer</p>
                                                    <p class="description">Engenheiro software back-end, especialista em Python, Jupyter, Selenium e outras tecnologias relacionadas á Python.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/php.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Caique</h3>
                                                    <p class="small-text">Back-end | Developer</p>
                                                    <p class="description">Engenheiro software back-end, especialista em Java e PHP, tendo conhecimento na framework de PHP Lavaravel.</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/mysql.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Guilherme</h3>
                                                    <p class="small-text">DBA | Developer</p>
                                                    <p class="description">Especilista na área de DataBase Administration, sendo o DBA da nossa equipe com especialização em mySQL e MSSQL Server .</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card card-member">
                                            <div class="content">
                                                <div class="avatar avatar-danger">
                                                    <img alt="..." class="img-circle" src="assets/img/rust.jpg"/>
                                                </div>
                                                <div class="description">
                                                    <h3 class="title">Glauber</h3>
                                                    <p class="small-text">Full-stack | Developer</p>
                                                    <p class="description">Engenheiro software e Pentester, sendo o developer Full-stack da nossa equipe com conhecimento em Python, Pentest e Rust.</p>
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


    <div class="section section-our-clients-freebie">
        <a id="tecnologias"></a>
        <div class="container">
            <div class="title-area">
                <h5 class="subtitle text-gray">Feito com</h5>
                <h2>Tecnologias utilizadas</h2>
                <div class="separator separator-danger">∎</div>
            </div>

            <ul class="nav nav-text" role="tablist">
                <li class="active">
                    <a href="#php" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/php.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#mysql" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/mysql.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#html" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/html.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#css" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/css.jpg"/>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#laravel" role="tab" data-toggle="tab">
                        <div class="image-clients">
                            <img alt="..." class="img-circle" src="assets/img/laravel.jpg"/>
                        </div>
                    </a>
                </li>
            </ul>


            <div class="tab-content">

                <div class="tab-pane active" id="php">
                    <p class="description">
                        Tecnologia utilizada no desenvolvimento do back-end do nosso site
                    </p>
                </div>
                <div class="tab-pane" id="mysql">
                    <p class="description">
                        Tecnologia utilizada no desenvolvimento da nossa base de dados
                    </p>
                </div>
                <div class="tab-pane" id="html">
                    <p class="description">
                        Tecnologia utilizada na estruturação do nosso site
                    </p>
                </div>
                <div class="tab-pane" id="css">
                    <p class="description"> 
                        Tecnologia utilizada no desenvolvimento da estilização do nosso site
                    </p>
                </div>
                <div class="tab-pane" id="laravel">
                    <p class="description"> 
                        Framework de PHP utilizado como plataforma de desenvolvimento PHP pro nosso back-end
                    </p>
                </div>

            </div>

        </div>
    </div>


    <div class="section section-small section-get-started">
        <a id="contato"></a>
        <div class="parallax filter">
            <div class="image"
                style="background-image: url('assets/img/office-1.jpeg')">
            </div>
            <div class="container">
                <div class="title-area">
                    <h2 class="text-white">Contato</h2>
                    <div class="separator line-separator">♦</div>
                    <p class="description"> Entre em contato conosco e compartilhar seu feedback, sugestões, reclamações e qualquer outras informações que você julgue importante e relevante para o nosso desenvolvimento!</p>
                </div>
                <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Nome</label>
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                    <label for="exampleFormControlTextarea1">Mensagem</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                </form>
                    <div class="button-get-started">
                        <a href="#gaia" class="btn btn-danger btn-fill btn-lg">Enviar feedback</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <div class="info">
                        <h5 class="title">Empresa - Gaia</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Home</a></li>
                                <li>
                                    <a href="#">Encontre ofertas</a>
                                </li>
                                <li>
                                    <a href="#">Nossos projetos</a>
                                </li>
                                <li>
                                    <a href="#">Nosso Portfolio</a>
                                </li>
                                <li>
                                    <a href="#">Sobre Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title"> Ajuda e suporte</h5>
                         <nav>
                            <ul>
                                <li>
                                    <a href="#">Contato</a>
                                </li>
                                <li>
                                    <a href="#">Guia do site</a>
                                </li>
                                <li>
                                    <a href="#">Termos &amp; Condições</a>
                                </li>
                                <li>
                                    <a href="#">Politica da empresa</a>
                                </li>
                                <li>
                                    <a href="#">Reembolso</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="info">
                        <h5 class="title">Ultimas noticias</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> <b>Get Shit Done</b> A melhor clinica do Brasil, Receba poha, obrigado meu Deus, SIIIUUUUU
                                        <hr class="hr-small">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> Eventos envolvendo nossa empresa <b> Nossas premiações </b>! Obrigado por dar seu dinheiro...
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-1 col-sm-3">
                    <div class="info">
                        <h5 class="title">Siga-nos</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fa fa-facebook-square"></i> Facebook
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-linkedin btn-simple">
                                        <i class="fa fa-linkedin"></i> Linkedin
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-github btn-simple">
                                        <i class="fa fa-github"></i> GitHub
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-social btn-reddit btn-simple">
                                        <i class="fa fa-google-plus-square"></i> Google+
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                 © <script> document.write(new Date().getFullYear()) </script> Gaia, feito com estilo
            </div>
        </div>
    </footer>

</body>

<!--   core js files    -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="assets/js/modernizr.js"></script>

<!--  script for google maps   -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="assets/js/gaia.js"></script>

<!-- script for modal login form -->
<script src="./assets//js//modal.js "></script>

</html>
