<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Creador de mensajes</title>
</head>
<body>
  
  <header>
    <div class="div-centered-hv">
      <form action="" method="POST">
        <input type="text" id="message" name="message" placeholder="Your message">
        <input type="submit" value="Send">
      </form>
    </div>
  </header>

  <article>

    <div id="background" class="div-centered-hv">

      <div id="messagebox-inside">
        [MESSAGES]
      </div>
    </div>

  </article>
</body>
</html>


<?php 


/*

<div id="message-container-left">
  <div id="message-box" class="message-left"></div>
</div>
<div id="message-container-right">
  <div id="message-box" class="message-right"></div>
</div>

*/


if(isset($_POST['message'])) {

  echo($_POST['message']);

}

?>