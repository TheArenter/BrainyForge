<?php
	
	$botToken = "590748562:AAHVXJMYVo67rq7ZfGXAzMyVPfg0dii5cok"; // Api TOKEN to our bot
	$website = "https://api.telegram.org/bot".$botToken;

	$FilejSon = file_get_contents("php://input"); // Take the url input, in this case will be executed method getUpdates that return Update.
	$FilejSon = json_decode($FilejSon, TRUE); // Decode the variable before because now we can search with key (because it's a dictionary)

	$FirstName = $FilejSon["message"]["chat"]["first_name"]; // Get the name that user set
	$UserChatId = $FilejSon["message"]["chat"]["id"]; // get the User ID, this is unique
	$Message = $FilejSon["message"]["text"]; // Get the message sent from user

	switch ($Message)
	{
		case '/start':
			$msg = "Welcome $GLOBALS[FirstName]!";
			showKeyboard($UserChatId, $msg);
			break;
		
		case '/Conigli':
			$msg = "La difficoltà EX dei conigli è disponibile nei seguenti orari: 00:00/05:00/13:00/16:00";
			showKeyboard($UserChatId, $msg);
			break;
			
		case 'Buongiorno':
			$msg = "Buongiorno $GLOBALS[FirstName]!";
			showKeyboard($UserChatId, $msg);
			break;

		case '/Tastiera': // Command to show normal Keyboard
			$msg = "This is a Tutorial, this Keyboard has 3 buttons, click one to test.";
			showKeyboard($UserChatId, $msg);
			break;

		case "chatid":
			$msg = $UserChatId;
			sendMessage($UserChatId, $msg);
			break;

		case "Normal Keyboard": // This is the same text inside a Keyboard
			$msg = "Abracadabra and keyboard will appear!";
			showKeyboard($UserChatId, $msg);
			break;

		case "Inline Keyboard": // This is the same text inside a Keyboard
			$msg = "Abracadabra and inline keyboard will appear!";
			inlineKeyboard($UserChatId, $msg);
			break;

		case "Remove Keyboard": // This is the same text inside a Keyboard
			$msg = "Abracadabra and keyboard will disappear!";
			removeKeyboard($UserChatId, $msg);
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

	function showKeyboard($chat_id, $text)
	{
		$jSonCodeKeyboard = '&reply_markup={"keyboard":[["Normal%20Keyboard"],["Hide%20Keyboard","Remove%20Keyboard"]],"one_time_keyboard":true}';
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text).$jSonCodeKeyboard;
		file_get_contents($url);
	}

	function removeKeyboard($chat_id, $text)
	{
		$jSonCodeKeyboard = '&reply_markup={"remove_keyboard":true}';
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text).$jSonCodeKeyboard;
		file_get_contents($url);
	}

	function inlineKeyboard($chat_id, $text) // This is an useless type of this keyboard, in a specific Tutorial I show an useful usage of this keyboard.
	{
		$jSonCodeKeyboard = '&reply_markup={"inline_keyboard":[[{"text":"API%20Bot%20Telegram","url":"https://core.telegram.org/bots/api"},{"text":"Google","url":"https://www.google.com"}]]}';
		$url = $GLOBALS[website]."/sendMessage?chat_id=".$chat_id."&text=".urlencode($text).$jSonCodeKeyboard;
		file_get_contents($url);
	}

?>
