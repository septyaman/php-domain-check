<?php //error_reporting(0);

  /* Set location your class exist ( Recomended ) 
     ! Replace it with your setting's
	  ( this only Sample ), example, like this :
  */
  
  define('DS', DIRECTORY_SEPARATOR);
  define('APP_BASE', dirname(__FILE__).DS);
  define('CLASS_DIR', APP_BASE.'class'.DS);
  define('DATA_DIR', APP_BASE.'data'.DS);
  
 //------------------------------------------------------
  
  // Get the class and Set Whois data
  
  require CLASS_DIR.'class_domain.php';  // '../class/class_domain.php';
 
  $check_domain = new Domain_Checker;
  $check_domain->WHOIS_FILE = DATA_DIR.'whois_server.php'; // '../data/whois_server.php';
 
 // ------------------------------------------------------
 
  // Handle user's request
  
  if( isset($_GET['domainname']) && !empty ($_GET['domainname']) ) {
      $domainsearch = preg_replace('/http:\/\/(.*?)*\.com/', '', $_GET['domainname']);
	  $is_available = $check_domain->cek_available_domain($domainsearch);
  }
  
  
  // Search Form Example
  
  $domain_cek_form = '<div align="center"><h1>'.( isset($is_available) ? ( $is_available ? $domainsearch.' available' : $domainsearch.' not available' ) : 'Check your domain' ).'</h1>
   <form method="GET">
      <input type="text" name="domainname" placeholder="example: yourdomain.com" required/>
	  <input type="submit" value="GO"/>
    </form></div>';
  
  echo($domain_cek_form);
  