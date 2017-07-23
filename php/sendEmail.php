<?php
// If you are using Composer
require '../vendor/autoload.php';

$name = $_POST['name'];
$contact = $_POST['contact'];
$message = $_POST['message'];
$message = "Name: {$name}<br/>Contact: {$contact}<br/>Message: {$message}";

if ($name || $contact || $message) {
	$request_body = json_decode('{
	  "personalizations": [
	    {
	      "to": [
	        {	
	        	"name": "Priyanka Garg",
	          	"email": "cspriyankagarg@gmail.com"
	        },
	        {	
	        	"name": "Sahil Garg",
	          	"email": "garg.sahil25@gmail.com"
	        }
	      ],
	      "subject": "Someone contacted you via your website"
	    }
	  ],
	  "from": {
	  	"name": "CS Priyanka Garg",
	    "email": "info@cspriyanka.com"
	  },
	  "content": [
	    {
	      "type": "text/html",
	      "value": '.$message.'
	    }
	  ]
	}');

	$apiKey = getenv('SENDGRID_API_KEY');
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($request_body);
	http_response_code($response->statusCode());
}

?>