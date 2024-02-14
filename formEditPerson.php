<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        input,
        label {
            display: block;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <main>
        <?php
        require_once("./utils/DBconnect.php");
        require_once("./DAO/PersonDAO.php");

        session_start();
        $id = $_SESSION["id"];

        $person = PersonDAO::searchPersonById($id);
        ?>


        <form action='./editPerson.php' method='post'>

            <label for='fullname'>Fullname</label>
            <input type='text' name='fullname' value='<?php echo $person->getFullname() ?>'>

            <label for='email'>Email</label>
            <input type='mail' name='email' value='<?php echo $person->getEmail() ?>'>

            <label for='age'>Age</label>
            <input type='number' name='age' value='<?php echo $person->getAge() ?>'>

            <button type='submit'>Save</button>

        </form>

    </main>
</body>

</html>