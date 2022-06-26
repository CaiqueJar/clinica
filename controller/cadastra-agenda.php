<?php
header("Location: ../area-restrita/crud-agendamento.php");


require_once("../model/Agenda.php");
require_once("../model/Paciente.php");


require_once("../model/Paciente.php");
try {
  $paciente = new Paciente();
  $agenda = new Agenda();


  //$email_paciente = $paciente->emailPaciente();
  //$data_agenda = $agenda->data_agenda();

} catch (Exception $e) {
  echo $e->getMessage();
}



$agenda->setDtAgenda($_POST['txtData']);
$agenda->setHoraAgenda($_POST['txtHora']);

$agenda->setIdPaciente($_POST['paciente']);

$agenda->setIdProfissional($_POST['profissional']);

$agenda->cadastrar($agenda);



/* mandar e-mail para o paciente;

$nome = $_POST['txtNome'];
$paciente->setNomePaciente($nome);


// função pra pegar o email e id do paciente
$emailPaciente =  $paciente->emailPaciente();




//Aqui você vai juntar a função pra pegar o email e id
// e juntar com a função de data e hora da agenda e vai
// montar a mensagem com base nisso usando html


$mensagem = "
     <html>
          <p> Ola, sua consulta foi marcada com sucesso
    </html>
     ";




//função para pegar a data e hora
$data_consulta = $agenda->data_agenda();


$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');

// Compo E-mail
$arquivo = "
     <html>
          <p> Ola´ $nome, este email e´ para informar que a sua consulta
          foi marcada com sucesso :)
       <p><b>Dados da consulta: </b></p><br>
       <br>
       <p> Data e hora: $data_consulta.</p>
       <p> Profissional: $email_paciente.</p>

       <p> obrigado pea atençao e pela preferencia :) </p>

       <p> Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></p>
     </html>
   ";

//  <p><b>E-mail: </b>$emailPaciente  </p>
//  <p><b>Mensagem: </b> $mensagem</p>
//  <p> A data da consulta: " .$data_consulta. "  </p>

//Emails para quem será enviado o formulário
$destino = "guilherme.scarabelli04@gmail.com";
$assunto = "teste envio email";

//Este sempre deverá existir para garantir a exibição correta dos caracteres
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: GAIA - A clinica feita para voce!
    $nome <$email>";

//Enviar
mail($destino, $assunto, $arquivo, $headers);

echo "<meta http-equiv='refresh' content='10;URL=../contato.html'>";
*/