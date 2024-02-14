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
        session_start();
        $id = $_SESSION["id"];

        $connexion = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        );

        $query = "SELECT fullname, email, age
                    FROM persons
                    WHERE id =:id;";

        try {

            $statement = $connexion->getPdo()->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();

            $person = $statement->fetch(PDO::FETCH_ASSOC);


            echo "<form action='./editPerson.php' method='post'>";

            echo "<label for='fullname'>Fullname</label>";
            echo "<input type='text' name='fullname' value='" . $person["fullname"] . "'>";

            echo "<label for='email'>Email</label>";
            echo "<input type='mail' name='email' value='" . $person["email"] . "'>";

            echo "<label for='age'>Age</label>";
            echo "<input type='number' name='age' value='" . $person["age"] . "'>";

            echo "<button type='submit'>Save</button>";
            echo "</form>";
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage() . "";
        } ?>

    </main>
</body>

</html>