<?php
$hostname_db = "localhost";
$database_db = "budget";
$username_db = "postgres";
$password_db = "1234";

$db = pg_connect("host=$hostname_db user=$username_db password=$password_db dbname=$database_db") or die("Can't Connect Server");

pg_query("SET client_encoding = 'utf-8'"); 




?>
