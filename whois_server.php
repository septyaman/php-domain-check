<?php defined('PHP_DOMAIN_CHECK') OR exit;

/*
   PHP DOMAIN CHECK
   Check if Domain Is Available
   source https://github.com/septyaman/php-domain-check
   
*/

	$WHOIS_SERVER = array(
	   "com" =>  array("whois.verisign-grs.com", "No match for "),
	   "net" =>  array("whois.verisign-grs.com", "No match for "),
	   "org" =>  array("whois.pir.org", "NOT FOUND"),
	   // etc
	);