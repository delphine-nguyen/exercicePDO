<?php

require_once("./utils/DBconnect.php");
require_once("./model/Person.php");
require_once("./interface/IPersonDAO.php");

class PersonDAO implements IPersonDAO
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBconnect::getInstance(
            dsn: "mysql:host=localhost; dbname=pdo;",
            username: "root",
            password: ""
        )->getPdo();
    }

    public function getAllPersons(): array
    {

        $persons = [];

        try {
            $statement = $this->pdo->prepare("SELECT * FROM persons;");
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

    public function createPerson(
        string $fullname,
        string $email,
        int $age
    ): string {

        $query = "INSERT INTO persons (fullname, email, age)
                            VALUES (:fullname, :email, :age);";

        try {
            $statement = $this->pdo->prepare($query);

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

    public function editPerson(
        int $id,
        string $fullname,
        string $email,
        int $age
    ): string {


        $query = "UPDATE persons
                    SET fullname=:fullname, 
                        email=:email, 
                        age=:age
                    WHERE id=:id";

        try {
            $statement = $this->pdo->prepare($query);
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

    public function deletePerson(
        int $id
    ): string {

        $query = "DELETE FROM persons
                WHERE id=:id;";

        try {
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(":id", $id);

            $statement->execute();
            $display = "Person deleted succesfully";
        } catch (PDOException $e) {
            $display = "Couldn't delete person";
        }

        return $display;
    }

    public function getPersonById(int $id)
    {

        $query = "SELECT * 
            FROM persons
            WHERE id=:id;";

        try {
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return new Person(
                    id: $result["id"],
                    fullname: $result["fullname"],
                    email: $result["email"],
                    age: $result["age"]
                );
            } else {
                return "No result";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
