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
    <form action="" method="POST">
      <input type="text" id="message" name="message" placeholder="Your message">
      <input type="submit" value="Submit">
    </form> 
  </header>

  <article>



  </article>
</body>
</html>


<?php 

if(isset($_POST['message'])) {

  echo($_POST['message']);

}

?>