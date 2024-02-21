<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($password) || empty($confirmpassword)) {
        echo "<script>alert('Please fill all the fields');</script>";
    } elseif ($password != $confirmpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO signup (firstname, lastname, email, phone, password, confirmpassword) VALUES ('$firstname', '$lastname', '$email', '$phone', '$hashed_password', '$confirmpassword')";
        mysqli_query($con, $query);
        echo "<script>alert('You have successfully registered');</script>";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <h1>Sign up</h1>
    <form action="" method ="POST">
        <div class="field input">
            <label for="FirstName">FirstName</label>
            <br>
            <input type="text" name="firstname" id="firstname" placeholder="John" required>
            <br>
        </div>
        <div class="field input">
            <label for="LastName">LastName</label>
            <br>
            <input type="text" name="lastname" id="lastname" placeholder="Doe" required>
            <br>
        </div>
        <div class="field input">
            <label for="Email">Email</label>
            <br>
            <input type="text" name="email" id="email" placeholder="example@gmail.com" required>
            <br>
        </div>
        <div class="field input">
            <label for="Phone">Phone</label>
            <br>
            <input type="text" name="phone" id="phone" placeholder="0712345678" required>
            <br>
        </div>
        
        <div class="field input">
            <label for="Password">Password</label>
            <br>
            <input type="password" name="password" id="password" required>
            <br>
        </div>
        <div class="field input">
            <label for="ConfirmPassword">Confirm Password</label>
            <br>
            <input type="password" name="confirmpassword" id="confirmpassword"  required>
            <br>
        </div>
        <br>
        <br>
        <input type="submit" class ="btnsignup" name="submit">
</Form>

</body>
</html>