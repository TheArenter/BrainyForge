<?php
	
	$botToken = "590748562:AAHVXJMYVo67rq7ZfGXAzMyVPfg0dii5cok"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$FilejSon = file_get_contents("php://input"); // Take the url input, in this case will be executed method getUpdates that return Update.
	$FilejSon = json_decode($FilejSon, TRUE); // Decode the variable before because now we can search with key (because it's a dictionary)

	$FirstName = $FilejSon["message"]["chat"]["first_name"]; // Get the name that user set
	$UserChatId = $FilejSon["message"]["chat"]["id"]; // get the User ID, this is unique
	$Message = $FilejSon["message"]["text"]; // Get the message sent from user
        $Benvenuti = 'Buongiorno';'buongiorno';

	switch ($Message)
	{
		case '/start':
			$msg = "Ciao $GLOBALS[FirstName]!";
			sendMessage($UserChatId, $msg);
			break;
		
		case '/Conigli':
			$msg = "La difficoltà EX dei conigli è disponibile nei seguenti orari: 00:00/05:00/13:00/16:00";
			sendMessage($UserChatId, $msg);
			break;
			
		case '$GLOBALS[Benvenuti]':
			$msg = "Buongiorno $GLOBALS[FirstName]!";
			sendMessage($UserChatId, $msg);
			break;

		default:
			$msg = "Unknown Command! So sorry ;(";
			sendMessage($ChatId, $msg);
			break;
	} 
	

	function sendMessage($chat_id, $text)
	{
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text);
		file_get_contents($url);
	}


?>
