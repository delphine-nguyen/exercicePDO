<?php

require_once("./model/Person.php");
require_once("./DAO/PersonDAO.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>

<body>
    <header>
        <h1>PDO : PHP Data Object</h1>
    </header>

    <main>
        <section>
            <p>
                <?php
                session_start();
                if (isset($_SESSION["display"]) && !empty($_SESSION["display"])) {
                    echo $_SESSION["display"];
                }
                ?>
            </p>
        </section>

        <form method='get' action='handleChoice.php'>
            <input type='submit' name='choice' value='Create'>
            <input type="number" name="searchId" placeholder="ID of Person">
            <input type="submit" name="choice" value='Search'>
        </form>

        <hr>

        <?php

        $persons = PersonDAO::getAllPersons();

        foreach ($persons as $person) {
            echo "ID: " . $person->getId() . "<br>";
            echo "Fullname: " . $person->getFullname() . "<br>";
            echo "Email: " . $person->getEmail() . "<br>";
            echo "Age: " . $person->getAge() . "<br>";
            echo "<form method='get' action='handleChoice.php'>";
            echo "<input type='hidden' name='id' value='" . $person->getId() . "' />";
            echo "<input type='submit' name='choice' value='Edit' id='" . $person->getId() . "'>";
            echo "<input type='submit' name='choice' value='Delete' id='" . $person->getId() . "'>";
            echo "</form>";
            echo "<hr>";
        }

        ?>
    </main>

</body>

</html>