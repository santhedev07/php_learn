<?php
    include 'services/connection.php';
    include 'services/command.php';

    $login = new Auth();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    if(isset($_POST['login'])){
        // Optional: validate input
        if(!empty($username) && !empty($password)){
            $login->login($username, $password, $db);
        } else {
           $login->message = "Please fill in both username and password.";
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
    <h3>Login Form</h3>
    <i><?= $login->getMessage(); ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="login">Login Now!</button>
    </form>
    <?php include './layout/footer.html'; ?>
</body>
</html>