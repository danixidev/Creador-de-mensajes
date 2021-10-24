<?php 

require("controladores/Auxiliar.php");

/*

<div id="message-container-left">
  <div id="message-box" class="message-left"></div>
</div>
<div id="message-container-right">
  <div id="message-box" class="message-right"></div>
</div>

*/

//Arrancar la partida
$messages = Auxiliar::newMessage();
$view = Auxiliar::generateView($messages);

echo $view;


// if(isset($_POST['message'])) {

//   echo($_POST['message']);

// }