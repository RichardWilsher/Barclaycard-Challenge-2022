<?php
// Code to Connect to the database used by the site

$pdo = new PDO('mysql:host=barclaycardmysql.mysql.database.azure.com;port=3306;dbname=test;charset=utf8', 'barclaysgroup2@barclaycardmysql', 'ChallengeAccepted22!',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>