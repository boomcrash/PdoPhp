<?php
$pdo = new PDO('mysql:host=daw.mysql.database.azure.com;port=3306;dbname=superium', 'milton@daw', 'Camaleon1');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>