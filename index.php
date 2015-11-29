<?php

include_once('./vendor/autoload.php');

use DbSimple\Generic as DbSimpleGeneric;

$dsn = [
    'mysqli' => 'mysqli://root:root@localhost/db_oos?charset=utf8',
    'pgsql' => 'postgres://postgres:postgres@192.168.0.10/db_oos',
];

foreach($dsn as $key => $d){
    $DB = DbSimpleGeneric::connect($d);
    $DB->setErrorHandler('databaseErrorHandler');
}

function databaseErrorHandler($message, $info)
{
	if (!error_reporting()){
        return;
    }
	echo "SQL Error: $message<br><pre>"; 
	print_r($info);
	echo "</pre>";
	exit();
}
