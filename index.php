<?php 

require("controladores/Auxiliar.php");


session_start();

if(isset($_GET["reset"])) {

  session_destroy();

} else {

  //Arrancar la partida
  $messages = Auxiliar::newMessage();
  $view = Auxiliar::generateView($messages);
  
  echo $view;
}