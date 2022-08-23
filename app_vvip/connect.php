<?php
$dsn = 'mysql:host=localhost;dbname=bitrix24';
$userdb = 'login';
$passdb = 'password';

$pdo = new PDO($dsn, $userdb, $passdb);