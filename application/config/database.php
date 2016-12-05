<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'rahnuma',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
//$active_group = 'default';
//$active_record = TRUE;
//$dbhost = 'localhost';    //host 
//$dbport= '1521';          //port default is 1521 
//$dbname = 'XE';        //name of database   
//$dbuser = 'yousuf';      //db user with all priviliges
//$dbpassword = 'password';    // password of user
//$dbConnString = '(DESCRIPTION =(ADDRESS_LIST =(ADDRESS = (PROTOCOL = TCP)(HOST = '. $dbhost .')(PORT = '. $dbport .'))
//  )(CONNECT_DATA =(SERVICE_NAME = '. $dbname .')))';    // connection string for this we must create TNS entry for Oracle 
//$db['default']['hostname'] = $dbConnString;
//$db['default']['username'] = $dbuser;
//$db['default']['password'] = $dbpassword;
//$db['default']['database'] = '';
//$db['default']['dbdriver'] = 'oci8';
//$db['default']['dbprefix'] = '';
//$db['default']['pconnect'] = TRUE;
//$db['default']['db_debug'] = TRUE;
//$db['default']['cache_on'] = FALSE;
//$db['default']['cachedir'] = '';
//$db['default']['char_set'] = 'utf8';
//$db['default']['dbcollat'] = 'utf8_general_ci';
