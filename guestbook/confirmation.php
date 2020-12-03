<?php
/* confirmation.php
 * Gets data from guestbook/index.html
 * 11/10/2020
 */

// Turn on error reporting
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

//Redirect if form has not been submitted
if (empty($_POST)) {
    header("location: index.php");
}

//Set the time zone
date_default_timezone_set('America/Los_Angeles');

//Include files
include ('includes/head.html');
include ('includes/functions.php');
require ('includes/dbcreds.php');
?>

<body>
<div class="container mb-4" id="main">
    <!-- Jumbotron header -->
    <div class="jumbotron text-center mb-0">
        <h1 id="title">Your entry has been received.</h1>
        <p class="lead">We'll be in touch!</p>
    </div>

    <div class="container-fluid" >
        <fieldset>
        <?php

        //Data validation will go here
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $job_title = $_POST['job_title'];
        $company = $_POST['company'];
        $linkedin = $_POST['linkedin'];
        $message = $_POST['message'];
        $mail_list = $_POST['mail_list'];
        $format = $_POST['format'];

        // validate everything
        $isValid = true;

        // validate first name
        if (!validName($fname)) {
            echo "<h5>First name is required.</h5>";
            $isValid = false;
        }

        // validate last name
        if (!validName($lname)) {
            echo "<h5>Last name is required.</h5>";
            $isValid = false;
        }


        // validate email
        if (validEmail($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<h5>Please enter a valid email.</h5>";
                $email = "";
                $isValid = false;
            }
        }

        // validate url if entered
        if (validUrl($linkedin) == false) {
            $isValid = false;
        }

        // validate how we met
        $how_met = $_POST['how-we-met'];
        $other = "";
        if (validMet($how_met)) {
            if ($how_met == 'other') {
                $other = $_POST['other'];
                }
        }
        else {
            $isValid = false;
        }

        if(!isset($format)) {
            $format = null;
        }

        if (!isset($mail_list)) {
            $mail_list = null;
        }

        // validate mailing list
        if (isset($mail_list)) {
            $mail_list = true;
            // validate email
            if (!validEmail($email)) {
                echo "<h5>Email is required for mailing list.</h5>";
                $isValid = false;
            }
        }
        else {
            $mail_list = null;
        }


        // check format
        if (isset($_POST['format']) AND validFormat($_POST['format'])) {
            $format = true;
        }
        else {
            $format = null;
        }


        if ($isValid == true) {
            // save into database
            $sql = "INSERT INTO guestbook(fname, lname, email, job_title, company, 
                        linkedin, how_met, other, message, mail_list, format) VALUES 
                        ('$fname', '$lname', '$email', '$job_title', '$company', 
                        '$linkedin', '$how_met', '$other', '$message', '$mail_list', '$format')";
            $success = mysqli_query($cnxn, $sql);
            if (!$success) {
                echo "<p>Sorry... something went wrong</p>";
                return;
            }
        }
        else {
            echo "<a href='index.php'>Please re-enter valid data.</a>";
            return;
        }
        ?>


            <legend>Entry Summary</legend>
            <table class="table">
                <tbody>
                <tr>
                    <th>Name</th>
                    <td><?php echo $fname . " " . $lname ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $email ?></td>
                </tr>
                <tr>
                    <th>Job Title</th>
                    <td><?php echo $job_title ?></td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td><?php echo $company ?></td>
                </tr>
                <tr>
                    <th>LinkedIn</th>
                    <td><?php echo $linkedin ?></td>
                </tr>
                <tr>
                    <th>How we met</th>
                    <td><?php
                            if ($how_met == "other") {
                                echo $other;
                            }
                            else {
                                echo $how_met;
                            }
                        ?>
                    </td>

                </tr>
                <tr>
                    <th>Message</th>
                    <td><?php echo $message ?></td>
                </tr>
                </tbody>
            </table>
        </fieldset>
        <a href="index.php" class="btn btn-lg btn-block mt-1" role="button" id="button">Return to form</a>
    </div>

</div>

</body>
</html>