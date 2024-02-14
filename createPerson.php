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

        $fullname = FormValidation::cleanData($_POST["fullname"]);
        $email = FormValidation::cleanData($_POST["email"]);
        $age = FormValidation::cleanData($_POST["age"]);

        $personDAO = new PersonDAO();

        $_SESSION["display"] = $personDAO->createPerson(
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
