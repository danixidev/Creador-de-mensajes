<?php

class Auxiliar{

	public static function newMessage(){
		
        $messageArray = [];

        if(isset($_POST["message"])) {
            array_push($messageArray, $_POST["message"]);
        }

        $messages = self::generateMessages($messageArray);

		return $messages;
	}

    public static function generateMessages($messageArray) {

        $return = "";

        if(isset($messageArray)) {

            for ($i=0; $i < count($messageArray); $i++) { 
                $return .= '<div id="message-container-left"><div id="message-box" class="message-left">'.$messageArray[$i].'</div></div>';
            }

        }

        return $return;
    }

    public static function generateView($messages) {

        $layout = file_get_contents("vistas\layout.html");

        $layout = str_replace("[MESSAGES]",$messages,$layout);

        return $layout;
    }

	// public static function generarVistas($estadoJuego){

	// 	//Layout
	// 	$vista = file_get_contents('./vistas/layout.html');
	// 	//Botón de reinicio
	// 	if($estadoJuego['estado'] == 1)
	// 		$boton = '<input type="hidden" name="reiniciar" value="1"><input type="submit" class="btn btn-outline-danger" value="Reiniciar">';
	// 	else
	// 		$boton = '<input type="hidden" name="nuevo" value="1"><input type="submit" class="btn btn-outline-success" value="Nuevo">';
	// 	$vista = str_replace("[BOTON_REINICIO]", $boton, $vista);


	// 	//Vista del juego
	// 	$juego = file_get_contents('./vistas/juego.html');

	// 	//Mensaje
	// 	$juego = str_replace("[MENSAJE]",self::generarMensaje($estadoJuego['estado'],$estadoJuego['resultadoIntento']),$juego);
	// 	//Palabra oculta
	// 	$juego = str_replace("[PALABRA]",self::generarPalabraOculta($estadoJuego['estado'],$estadoJuego['letrasPalabra'],$estadoJuego['aciertos']),$juego);
	// 	//Letras probadas
	// 	$juego = str_replace("[LETRAS]",self::generarLetrasProbadas($estadoJuego['letrasProbadas']),$juego);
	// 	//Barra de vida
	// 	$juego = str_replace("[VIDA]",self::generarBarraVida($estadoJuego['vidas'],$estadoJuego['intentosMax']),$juego);

	// 	$vista = str_replace("[CONTENIDO]", $juego, $vista);

	// 	return $vista;

	// }
}