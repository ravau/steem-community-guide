<?php

//Longer execution time needed! Even 15 minutes in the background
ini_set('max_execution_time', 240);
ini_set('mysql.connect_timeout', 200);
ini_set('max_input_time', 200);

//We need a sbds Steem database
$mysql_host = "sbds.privex.io";
$mysql_database = "steem";
$mysql_user = "steem";
$mysql_password = "steem";

//What about base tags to analyse?
$base_tags="";

//For polish dates
setlocale(LC_TIME, "pl_PL.utf-8");


$wbazie = file_get_contents("data/aktualne.txt");
?>