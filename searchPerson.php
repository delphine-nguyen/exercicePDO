<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");

session_start();
$id = $_SESSION["id"];

$personDAO = new PersonDAO();

$_SESSION["display"] = $personDAO->getPersonById(id: $id);

header("Location: ./index.php");
exit();
