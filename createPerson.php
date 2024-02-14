<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (!empty($_POST["fullname"]) && !empty($_POST["email"]) && !empty($_POST["age"])) {

        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $age = $_POST["age"];

        $_SESSION["display"] = PersonDAO::createPerson(
            fullname: $fullname,
            email: $email,
            age: $age
        );
    } else {
        $_SESSION["display"] = "Couldn't create person";
    }

    header("Location: ./formCreatePerson.php");
    exit();
}
