<?php
include 'services/connection.php';
include 'services/command.php';

$register = new Auth();
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Optional: validate input
    if (!empty($username) && !empty($password)) {
        $register->register($username, $password, $db);
    } else {
        $register->message = "Please fill in both username and password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include './layout/header.html'; ?>
    <h3>Register Form</h3>
    <i><?= $register->getMessage(); ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="register">Register Now!</button>
    </form>
    <?php include './layout/footer.html'; ?>
</body>
</html>