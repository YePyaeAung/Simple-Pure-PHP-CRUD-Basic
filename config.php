<?php
define('MySQL_HOST', 'localhost');
define('MySQL_USER', 'root');
define('MySQL_DBNAME', 'testing');
define('MySQL_PASS', 'Aaa123!@');

try {
    $pdo = new PDO('mysql:host='.MySQL_HOST.';dbname='.MySQL_DBNAME , MySQL_USER, MySQL_PASS, 
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    
    ]
);
// echo "Connection OK!";
} catch(PDOException $e) {
    echo "Connection failed" . $e->getMessage();
}
