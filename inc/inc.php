<?php
//require 'autoload.php';
//spl_autoload_register('autoload_function');
//require_once(inc . 'admin/admin.php');


$config_directory = CORE_CONFIG;
$scanned_directory = array_diff(scandir($config_directory), array('..', '.'));
foreach ($scanned_directory as $config){
	$file_parts = pathinfo(CORE_CONFIG . $config); 
	$file_parts = $file_parts["extension"] ; 
	if($file_parts == 'php')
	require_once(CORE_CONFIG . $config );



}


include(CORE_CLASS . 'query.php');
include(CORE_CLASS . 'fc.php');
include(CORE_CLASS . 'fc-case.php');
include(CORE_CLASS . 'mail.php');
include(CORE_CLASS . 'exception.php');
include(CORE_CLASS . 'metadata.php');

//include('literature-form-intregration.php');
//include('sc.php');
//include('search.php');
include(CORE_FUNCTION . 'registration.php');
include(CORE_ERROR . 'exception-register.php');
include(CORE_FUNCTION . 'login.php');
include(CORE_ERROR . 'exception-login.php');
include(CORE_FUNCTION . 'user-activation-email.php');
include(CORE_FUNCTION . 'file-a-case.php');
include(CORE_FUNCTION . 'file-a-claim.php');
include(CORE_ERROR . 'exception-claim.php');
//include('fc-case-meta.php');
