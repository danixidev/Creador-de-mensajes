<?php

class Auxiliar{

	public static function newMessage(){

        if(isset($_SESSION["messageArray"]) && isset($_SESSION["senderArray"])) {
            $messageArray = $_SESSION["messageArray"];
            $senderArray = $_SESSION["senderArray"];
        } else {
            $messageArray = [];
            $senderArray = [];
            $_SESSION["messageArray"] = $messageArray;
            $_SESSION["senderArray"] = $senderArray;
        }

        if(isset($_POST["message1"])) {
            array_push($messageArray, $_POST["message1"]);
            array_push($senderArray, false);
        } else if (isset($_POST["message2"])) {
            array_push($messageArray, $_POST["message2"]);
            array_push($senderArray, true);
        }

        $_SESSION["messageArray"] = $messageArray;
        $_SESSION["senderArray"] = $senderArray;

        $messages = self::generateMessages($messageArray, $senderArray);

		return $messages;
	}

    public static function generateMessages($messageArray, $senderArray) {

        $return = "";

        if(isset($messageArray)) {

            for ($i=0; $i < count($messageArray); $i++) { 

                if(!$senderArray[$i]) {
                    $return .= '<div id="message-container-left"><div id="message-box" class="message-left"><p>'.$messageArray[$i].'</p></div></div>';
                } else {
                    $return .= '<div id="message-container-right"><div id="message-box" class="message-right"><p>'.$messageArray[$i].'</p></div></div>';
                }
            }

        }

        return $return;
    }

    public static function generateView($messages) {

        $layout = file_get_contents("vistas\layout.html");

        $layout = str_replace("[MESSAGES]",$messages,$layout);

        return $layout;
    }
}