<?php
require_once("./utils/DBconnect.php");
require_once("./DAO/PersonDAO.php");

session_start();
$id = $_SESSION["id"];

$_SESSION["display"] = PersonDAO::deletePerson(id: $id);
header("Location: ./index.php");
exit();
