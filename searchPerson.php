<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/imp/PersonDAOImp.php");

session_start();
$id = $_SESSION["id"];

$personDAO = new PersonDAOImp();

$_SESSION["display"] = $personDAO->getPersonById(id: $id);

header("Location: ./index.php");
exit();
