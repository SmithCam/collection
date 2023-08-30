<?php
    /*define('USER', 'camsmit1_cam');
    define('PASSWORD', 'Braves05?123');
    define('HOST', '162.241.24.74');
    define('DATABASE', 'camsmit1_site');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }*/

    define('USER', 'root');
    define('PASSWORD', 'braves05');
    define('HOST', 'localhost:3307');
    define('DATABASE', 'site');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>