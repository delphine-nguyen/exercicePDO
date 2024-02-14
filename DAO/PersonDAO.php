<?php

require_once("./utils/DBconnect.php");
require_once("./model/Person.php");

class PersonDAO
{
    public static function getAllPersons(): array
    {
        $connexion = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        );

        $persons = [];

        try {
            $statement = $connexion->getPdo()->prepare("SELECT * FROM persons;");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                foreach ($result as $row) {
                    $persons[] = new Person(
                        id: $row["id"],
                        fullname: $row["fullname"],
                        email: $row["email"],
                        age: $row["age"]
                    );
                }
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return $persons;
    }

    public static function createPerson(
        string $fullname,
        string $email,
        int $age
    ): string {

        $connexion = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        );

        $query = "INSERT INTO persons (fullname, email, age)
                            VALUES (:fullname, :email, :age);";

        try {
            $statement = $connexion->getPdo()->prepare($query);

            $statement->bindParam(":fullname", $fullname);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":age", $age);

            $statement->execute();
            $display = "Person added successfully";
        } catch (PDOException $e) {
            $display = "Couldn't add person to DB";
        }
        return $display;
    }

    public static function editPerson(
        int $id,
        string $fullname,
        string $email,
        int $age
    ): string {
        $connexion = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        );

        $query = "UPDATE persons
                    SET fullname=:fullname, 
                        email=:email, 
                        age=:age
                    WHERE id=:id";

        try {
            $statement = $connexion->getPdo()->prepare($query);
            if (isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["age"])) {
                $statement->bindParam(":fullname", $fullname);
                $statement->bindParam(":email", $email);
                $statement->bindParam(":age", $age);
                $statement->bindParam(":id", $id);

                $statement->execute();
                $display = "Person edited succesfully";
            }
        } catch (PDOException $e) {
            $display = "Couldn't edit person";
        }
        return $display;
    }

    public static function deletePerson(
        int $id
    ): string {

        $connexion = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        );

        $query = "DELETE FROM persons
                WHERE id=:id;";

        try {
            $statement = $connexion->getPdo()->prepare($query);
            $statement->bindParam(":id", $id);

            $statement->execute();
            $display = "Person deleted succesfully";
        } catch (PDOException $e) {
            $display = "Couldn't delete person";
        }

        return $display;
    }
}
