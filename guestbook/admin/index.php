<?php
/**
 *  guestbook/admin/index.php
 *  Kim Vallido
 *  11/25/2020
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['loggedin'])) {

    //Store the page that I'm currently on in the session
    $_SESSION['page'] = $_SERVER['SCRIPT_URI'];

    //Redirect to login
    header("location: login.php");
}

//Include files
require ('../includes/dbcreds.php');
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS (Make sure Bootstrap is first) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" >
    <title>Kim's Guestbook</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="../images/favicon.png">
</head>
<body>
<div class="container-fluid">
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(199, 177, 182, .2)">
        <a class="navbar-brand" href="./index.php"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg> Back to form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid" id="main">

    <!-- Jumbotron header -->
    <div class="jumbotron text-center mb-0">
        <h1 id="title">Guestbook Entries</h1>
    </div>
    <table id="order-table" class="display" style="width:100%">
        <thead>
        <tr>
            <td>Guest ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Job Title</td>
            <td>Company</td>
            <td>How We Met</td>
            <td>(cont)</td>
            <td>Message</td>
            <td>Mailing List</td>
            <td>Format</td>
            <td>Timestamp</td>
        </tr>
        </thead>
        <tbody>


        <?php
        $sql = "SELECT * FROM guestbook";
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);

        foreach ($result as $row) {
            //var_dump($row);
            $guest_id = $row['guest_id'];
            $fullname = $row['fname'] . " " . $row['lname'];
            $email = $row['email'];
            $job_title = $row['job_title'];
            $company = $row['company'];
            $how_met = $row['how_met'];
            $other = $row['other'];
            $message = $row['message'];
            $mail_list = $row['mail_list'];
            $format = $row['format'];
            $timestamp = date("M d, Y g:i a", strtotime($row['input_date']) );

            echo "<tr>";
            echo "<td>$guest_id</td>";
            echo "<td>$fullname</td>";
            echo "<td>$email</td>";
            echo "<td>$job_title</td>";
            echo "<td>$company</td>";
            echo "<td>$how_met</td>";
            echo "<td>$other</td>";
            echo "<td>$message</td>";
            echo "<td>$mail_list</td>";
            echo "<td>$format</td>";
            echo "<td>$timestamp</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
   </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
    $('#order-table').DataTable( {
        "order": [[ 10, "desc" ]]
    } );
</script>

</body>
</html>