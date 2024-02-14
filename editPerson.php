<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (!empty($_POST["fullname"]) && !empty($_POST["email"]) && !empty($_POST["age"])) {

        $id = $_SESSION["id"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $age = $_POST["age"];

        $_SESSION["display"] = PersonDAO::editPerson(
            id: $id,
            fullname: $fullname,
            email: $email,
            age: $age
        );
    } else {
        $_SESSION["display"] = "Couldn't edit person";
    }

    header("Location: ./index.php");
    exit();
}
