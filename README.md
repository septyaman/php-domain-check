Domain Check Availability Php Script
===================

A PHP Class used to check if a domain has been registered.

## Example

```php

 require CLASS_DIR.'class_domain.php';
 $check_domain = new Domain_Checker;
 $check_domain->WHOIS_FILE = DATA_DIR.'whois_server.php'; // this Whois file location
 
 $yourdomainname = 'github.com';
 
 $is_available = $check_domain->cek_available_domain($yourdomainname);
 
```
