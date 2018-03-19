<?php

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "testing");

$db = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to connect to DB');
mysqli_set_charset($db,'utf8') or die('Conenction coding is not installed');
