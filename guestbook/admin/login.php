<?php
/**
 *  guestbook/admin/login.php
 *  Kim Vallido
 *  11/25/2020
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start session
session_start();

//var_dump($_POST);

//Initialize variables
$err = false;
$username = "";

//If the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get the username and password
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    //If they are correct
    //Actual username and password are stored in a separate file
    //Should be moved to home directory ABOVE public_html
    require ('includes/login-creds.php');

    if ($username == $adminUser && $password == $adminPassword) {

        $_SESSION['loggedin'] = true;

        //Redirect to page the user was on
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = 'index.php';
        }
        header("location: " . $_SESSION['page']);

    }

    //Set an error flag
    $err = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">

    <style>
        .err {
            color: darkred;
        }
    </style>
</head>
<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(199, 177, 182, .2)">
    <a class="navbar-brand" href="../index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg> Back to form</a>
</nav>
<div class="container mb-4" id="main">
    <!-- Login Form -->
    <form method="post" action="#">
        <fieldset class="form-group border p-2">
            <legend>Admin Login</legend>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    <?php echo "value='$username' " ?>
                >
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

        <?php
        if ($err) {
            echo '<span class="err">Incorrect login.</span><br>';
        }
        ?>

            <button type="submit" class="btn-lg btn-block">Login</button>
    </form>

</div>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>