<?php

class Auxiliar{

	public static function jugar(){
		$juego = new Ahorcado();
		$resultado = -1;
		//Comprobar si hay que empezar un juego nuevo
		if(isset($_POST['nuevo']))
			$juego->iniciarPartida();

		//Comprobar si se ha pulsado el botón de reinicio
		elseif(isset($_POST['reiniciar']))
			$juego->finalizarPartida();
		//Comprobar si se ha intentado una letra o palabra

		elseif(isset($_POST['intento'])&&!empty($_POST['intento'])){
			$resultado = $juego->comprobarIntento($_POST['intento']);
			$juego->guardarPartida();
		}

		//Obtener el estado actual de la partida
		$estado = $juego->obtenerEstado();
		$estado['resultadoIntento'] = $resultado;

		return $estado;
	}

	public static function generarVistas($estadoJuego){

		//Layout
		$vista = file_get_contents('./vistas/layout.html');
		//Botón de reinicio
		if($estadoJuego['estado'] == 1)
			$boton = '<input type="hidden" name="reiniciar" value="1"><input type="submit" class="btn btn-outline-danger" value="Reiniciar">';
		else
			$boton = '<input type="hidden" name="nuevo" value="1"><input type="submit" class="btn btn-outline-success" value="Nuevo">';
		$vista = str_replace("[BOTON_REINICIO]", $boton, $vista);


		//Vista del juego
		$juego = file_get_contents('./vistas/juego.html');

		//Mensaje
		$juego = str_replace("[MENSAJE]",self::generarMensaje($estadoJuego['estado'],$estadoJuego['resultadoIntento']),$juego);
		//Palabra oculta
		$juego = str_replace("[PALABRA]",self::generarPalabraOculta($estadoJuego['estado'],$estadoJuego['letrasPalabra'],$estadoJuego['aciertos']),$juego);
		//Letras probadas
		$juego = str_replace("[LETRAS]",self::generarLetrasProbadas($estadoJuego['letrasProbadas']),$juego);
		//Barra de vida
		$juego = str_replace("[VIDA]",self::generarBarraVida($estadoJuego['vidas'],$estadoJuego['intentosMax']),$juego);

		$vista = str_replace("[CONTENIDO]", $juego, $vista);

		return $vista;

	}
}