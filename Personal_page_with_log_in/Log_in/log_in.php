<?php

function invalidate(): void {
    $_SESSION['display'] = "initial";

}

function validate(): void {
    $_SESSION['logged_in'] = true;
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
            echo "wrong credentials";
            invalidate();
            header("Location: index.php");
            exit();
        }
        if ($name == $rows[0]['name'] && $password == $rows[0]['password']) {
            validate();
            header("Location: ../Personal_page/");
        } else {
            echo "wrong credentials";
            invalidate();
            header("Location: index.php");
        }
    }
}
