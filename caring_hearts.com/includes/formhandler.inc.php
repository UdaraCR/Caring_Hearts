<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fisrtname = $_POST["firstname"];
    $lastname = $_POST["lastname"]; 
    $email = $_POST["email"];   

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$fisrtname, $lastname, $email]);
        $pdo = null;
        $stmt = null;

        header("Location ../home.html");

        die();
    }

    } catch (PDOException $e) {
        die ("Query Failed: " . $e->getMessage());

    }


} else {
    header("Location ../login.html");
}
