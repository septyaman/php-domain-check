<?php

/*
   PHP DOMAIN CHECK
   Check if Domain Is Available
   source https://github.com/septyaman/php-domain-check
   
*/

 class Domain_Checker {
 
     public $WHOIS_SERVER = false;
	 public $timeout = 20;
	
	public function __construct($WHOIS_SERVER_FILE=false) {
	
	  $this->WHOIS_SERVER = load_whois_data($WHOIS_SERVER_FILE);

	}
	
	function cek_available_domain($dom_name=false) {

		$domain_name = ( ($dom_name) ? strtolower($dom_name) : false );
		
		if ( gethostbyname($domain_name) == $domain_name ) {

			$ext = $this->dom_extension($dom_name);

			if (isset($this->WHOIS_SERVER[$ext][0])) {
			
				$whois_server = $this->WHOIS_SERVER[$ext][0];
				$Not_Found = $this->WHOIS_SERVER[$ext][1];
				
			} else {throw new Exception("Domain extension not Supported!");}

			$OPtest = fsockopen($whois_server, 43, $errno, $errstr, $this->timeout);
	
				$out = $domain . "\r\n";
				fwrite($OPtest, $out);
				$whois = null;
				while (!feof($OPtest)) { $whois .= fgets($OPtest, 128); }
				fclose($OPtest);

				if (strpos($whois,$Not_Found)) return TRUE; 
				else  return FALSE;
				
		} else {return FALSE;}
	}
	

	private function load_whois_data($sorce=false){
	  
	  if($sorce) {
	  
	     if( file_exists($sorce) ){
		 
		     include $sorce;
			 
		     if( isset($WHOIS_SERVER) && is_array($WHOIS_SERVER) )
			    return $WHOIS_SERVER;			 
			 else 
			    exit('WHOIS_SERVER MUST BE AN ARRAY');
		 }
		 
		 else{ exit('Whois Server File "'.$sorce.'" Not Found'); }
		 
	  }else exit('Whois Server Not Defined');

	}
	
	function dom_extension ($domain_name) {
	
		$Xs = explode('.', $domain_name);
		if(count($Xs) === 0) { throw new Exception('Invalid domain extension'); }
		return end($Xs);
		
	}

 
 }