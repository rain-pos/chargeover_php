<?php

/**
 * Example of deleting a customer from ChargeOver
 */

header('Content-Type: text/plain');

// Require the library
use ChargeOver\ChargeOverAPI;

require_once '../vendor/autoload.php';

// This url should be specific to your ChargeOver instance
$url = 'http://dev.chargeover.com/api/v3';
//$url = 'https://YOUR-INSTANCE-NAME.chargeover.com/api/v3';

// You should substitute your API credentials in here
$authmode = ChargeOverAPI::AUTHMODE_HTTP_BASIC;
$username = 'p1Ii7JWQKLzZ64G9lt3PAUa8exNsf5RM';
$password = 'h1YlowmzS6bROM8eHZBaT9pj5UcFtDIV';

$API = new ChargeOverAPI($url, $authmode, $username, $password);

// This is the unique creditcard ID value
$the_creditcard_id = 43;

// Delete them
$resp = $API->delete(\ChargeOver\APIObject::TYPE_CREDITCARD, $the_creditcard_id);

// Check for errors
if (!$API->isError($resp))
{
	print('Credit card was deleted!');
}
else
{
	print('The credit card COULD NOT BE DELETED!');

	print("\n\n\n\n");
	print($API->lastRequest());
	print("\n\n\n\n");
	print($API->lastResponse());
	print("\n\n\n\n");
}
