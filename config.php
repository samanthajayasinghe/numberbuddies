<?php

$_SESSION['userId'] = isset($_GET['uid']) ? $_GET['uid'] : 1;

define('dsn', 'mysql:host=localhost;dbname=numberbuddy');
define('username', 'root');
define('password', 'root');
