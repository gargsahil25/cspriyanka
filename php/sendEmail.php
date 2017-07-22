<?php

$name = $_POST['name'];
$contact = $_POST['contact'];
$message = $_POST['message'];
$to = "cspriyankagarg@gmail.com, garg.sahil25@gmail.com";

if ($name || $contact || $message) {
	$subject = "Someone contacted you via your website"; 
	$message = "Name: {$name}\nContact: {$contact}\nMessage: {$message}";
	echo mail($to,$subject,$message);

}

?>