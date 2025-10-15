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
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $skills = isset($_POST['skills']) ? $_POST['skills'] : [];

        echo "<h2>Your Input:</h2>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Skills: " . implode(", ", $skills) . "<br>";
    }
?>