<?php

function invalidate(): void {
    $_SESSION['display'] = "initial";

}

session_start();

require '../connect.php';
$_SESSION['logged_in'] = false;
$connection = OpenConnection(database: "personal_page_db", username: "root");
if ($connection == null) {
    echo "it is null";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $name = trim($_POST['email']);
        $password = trim($_POST['password']);
        if (empty($name) || empty($password)) {
            header("Location: index.php");
        }
        $select = "SELECT * FROM personal_page_db.people_entries WHERE name='$name'";
        $result = $connection->prepare($select);
        $result->execute();
        $rows = $result->fetchAll();
        if (empty($rows)) {
            $insert = "INSERT INTO personal_page_db.people_entries (name, password) VALUE ('$name', '$password')";
            $add = $connection->prepare($insert);
            $add->execute();
            header("Location: ../Log_in/");
        } else {
            echo "User already exists";
            invalidate();
            header("Location: index.php");
            exit();
        }
    }
}
