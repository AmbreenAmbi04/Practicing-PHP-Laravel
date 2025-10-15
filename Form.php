<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Practicing PHP/Laravel</title>
</head>
<body>
    <div class="container card mt-3 p-3">
        <label class="fs-2 fw-bold">This is a form</label>
        <form action= "Form.php" method="POST">
            <label class="form-label fw-bold">Name</label>
            <input type="text" name="name" placeholder="Enter your name" class="form-control"><br>
            <label class="form-label fw-bold">Email address</label>
            <input type="email" name="email" placeholder="Enter your email" class="form-control"><br>
            <label class="form-label fw-bold">Password</label>
            <input type="password" name="password" placeholder="Enter your password" class="form-control"><br>
            <label class="form-label fw-bold">Gender</label><br>
            <input type="radio" name="gender" class="radio" value="female">Female<br>
            <input type="radio" name="gender" class="radio" value="male">Male<br>
            <label class="form-label fw-bold">Skills</label><br>
            <input type="checkbox" name="skills[]" class="checkbox" value="php">PHP<br>
            <input type="checkbox" name="skills[]" class="checkbox" value="laravel">Laravel<br>
            <input type="checkbox" name="skills[]" class="checkbox" value="react">React<br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<?php
// Array Merge Function
    $string = "I am an incomplete array.";
    $string1 = "I complete you!";
    echo $string . " " . $string1 . "<br>";

    //Foreach Loop
    $fruits = ["Banana", "Mango", "Grapes"];
    foreach($fruits as $fruit)
    {
        echo $fruit . "<br>";
    }

    //Associative Loop
    $colors = ["101" => "Red", "102" => "Bottle Green", "103" => "Emerald Green"];
    foreach($colors as $code => $value)
    {
        echo "Color Code: " . $code . " Color Name: " . $value . "<br>";
    }

    //Form Handling
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $skills = isset($_POST['skills']) ? $_POST['skills'] : [];

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        //Cookie set for 30 days
        setcookie('email', $email, time() + (86400 * 30), "/");
        setcookie('password', $password, time() + (86400 * 30), "/");
        echo "<div class='container mt-3 alert alert-success'>Session and cookie stored successfully!</div>";

        echo "<h2>Your Input:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Skills: " . implode(", ", $skills) . "<br>";

        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbname = "db_practicing";

        $connection = new mysqli($serverName, $userName, $password, $dbname);

        if($connection)
        {
            echo "Connection Successful!";
        }
        else
        {
            die("Connection Failed!" . $connection->connect_error);
        }

        $skills_str = implode(", ", $skills);

        $insert = "INSERT INTO tbl_info (name, email, password, gender, skills)
           VALUES ('$name', '$email', '$password', '$gender', '$skills_str')";

        if($connection->query($insert) === TRUE)
        {
            echo "<br>New record created successfully";
        }
        else
        {
            echo "Error: " . $insert . "<br>" . $connection->error;
        }

        $fetch = "SELECT * FROM tbl_info";
        $result = $connection->query($fetch);
        if($result->num_rows > 0)
        {
            echo "<h2>Data from Database:</h2>";
            echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Gender</th><th>Skills</th></tr>";
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['email'] .
                "</td><td>" . $row['password'] . "</td><td>" . $row['gender'] . "</td><td>" . $row['skills'] . "</td></tr>";
            }
        }

        $update = "UPDATE tbl_info SET password='burak' WHERE name='Burak Deniz'";
        if($connection->query($update) === TRUE)
        {
            echo "<br>Record updated successfully";
        }
        else
        {
            echo "Error updating record: " . $connection->error;
        }

        $delete = "DELETE FROM tbl_info WHERE id=10";
        if($connection->query($delete) === TRUE)
        {
            echo "<br>Record deleted successfully";
        }
        else
        {
            echo "Error deleting record: " . $connection->error;
        }
    }
?>