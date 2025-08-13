<?php
    $host = 'localhost';
    $dbname = 'kursus_online_db';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo 'Database berhasil terhubung';
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>