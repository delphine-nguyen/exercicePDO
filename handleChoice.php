<?php

require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    session_start();
    $_SESSION["display"] = "";

    if (strtolower($_GET["choice"]) == "edit") {
        $_SESSION["id"] = $_GET["id"];

        header("Location: ./formEditPerson.php");
        exit();
    } elseif (strtolower($_GET["choice"]) == "delete") {
        $_SESSION["id"] = $_GET["id"];
        header("Location: ./deletePerson.php");
        exit();
    } elseif (strtolower($_GET["choice"]) == "create") {
        header("Location: ./formCreatePerson.php");
        exit();
    } elseif (strtolower($_GET["choice"]) == "search") {
        $_SESSION["id"] = $_GET["searchId"];
        header("Location: ./searchPerson.php");
        exit();
    } else {
        $_SESSION["display"] = "Choice must be either 'edit' or 'delete'";
        header("Location: ./index.php");
        exit();
    }
}
