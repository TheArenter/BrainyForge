<?php
	
	$botToken = "510133925:AAFASuPjXlh3RngZPqFsX_he1EPnnzDsZYQ"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$FilejSon = file_get_contents("php://input"); // Take the url input, in this case will be executed method getUpdates that return Update.
	$FilejSon = json_decode($FilejSon, TRUE); // Decode the variable before because now we can search with key (because it's a dictionary)

	$FirstName = $FilejSon["message"]["chat"]["first_name"]; // Get the name that user set
	$UserChatId = $FilejSon["message"]["chat"]["id"]; // get the User ID, this is unique
	$Message = $FilejSon["message"]["text"]; // Get the message sent from user
        $a = ['Buongiorno', 'Buongiorno Cavaliere!', 'Bentrovato compagno!'];
        $b = ['Buongiorno','buongiorno'];

	switch ($Message)
	{
		case '/start':
			$msg = "Ciao $GLOBALS[FirstName]!";
			sendMessage($UserChatId, $msg);
			break;
		case '/Ciao':
			$msg = "Ciao $GLOBALS[FirstName]!";
			sendMessage($UserChatId, $msg);
			break;
		default:
			$msg = "Unknown Command! So sorry ;(";
			sendMessage($ChatId, $msg);		
	endswitch;
			
	} 
	
	function sendMessage($chat_id, $text)
		
	{
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text);
		file_get_contents($url);
	}

?>
