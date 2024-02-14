<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");
require_once("./utils/FormValidation.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();
    if (FormValidation::validate(
        fields: ["fullname", "email", "age"],
        form: $_POST
    )) {


        $cleanData = FormValidation::cleanData(
            fields: ["fullname", "email", "age"],
            data: $_POST
        );

        var_dump($cleanData);

        $id = $_SESSION["id"];
        $fullname = $cleanData["fullname"];
        $email = $cleanData["email"];
        $age = $cleanData["age"];

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
