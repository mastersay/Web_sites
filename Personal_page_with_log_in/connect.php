<?php

function OpenConnection($database, $servername="localhost", $username="", $password=""): PDO | null
{
    $connection = null;
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $connection;
}