<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <form action="./createPerson.php" method="post">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname">

            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="age">Age</label>
            <input type="number" name="age">

            <button type="submit">Submit</button>
        </form>
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
    </main>
</body>

</html>