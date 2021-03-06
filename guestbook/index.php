<?php

/*
 * Kim Vallido
 * index.php
 * Form page.
 */

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Include files
include ('includes/head.html');
?>

<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(199, 177, 182, .2)">
    <a class="navbar-brand" href="../resume/about.html"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg> Back</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="admin/index.php">Admin</a>
    </div>
</nav>

<div class="container mb-4" id="main">
    <!-- Jumbotron header -->
    <div class="jumbotron text-center mb-0">
        <h1 id="title">Guestbook</h1>
        <p class="lead">Pleased to make your acquaintance!</p>
    </div>

    <!-- Guestbook Form -->
    <form id="guestbook" method="post" action="confirmation.php">

        <!-- Contact info + How We Met -->
        <fieldset class="form-group border p-2">
            <legend>Contact Info</legend>
            <div class="form-row">
                <div class="col-auto">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                        <span class="d-none text-danger" id="err-fname">*required</span>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                        <span class="d-none text-danger" id="err-lname">*required</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com">
                        <span class="d-none text-danger" id="err-email">*required</span>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-auto">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="Job Title">
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="linkedin">LinkedIn URL</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                               placeholder="https://www.linkedin.com/yourURLhere">
                        <span id="err-linkedin" class="d-none text-danger">Please enter a valid URL</span>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="how-we-met">How We Met</label>
                        <select class="form-control" id="how-we-met" name="how-we-met" >
                            <option value='none'>How did we meet?</option>
                            <option value='meetup'>Meetup</option>
                            <option value='jobfair'>Job Fair</option>
                            <option value='haventmet'>Haven't met yet</option>
                            <option value='other'>Other</option>
                        </select>
                        <span id="err-how" class="d-none text-danger">*required</span>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-auto">
                        <div class="form-group">
                        <label for="other">Other (please specify)</label>
                        <br>
                        <input type="text" class="form-control" name="other" id="other">
                            <span id="err-other" class="d-none text-danger">* required</span>
                    </div>
                </div>
            </div>
        </fieldset>

        <!-- Message Area -->
        <fieldset class="form-group border p-2">
            <legend>Message</legend>
            <div class="form-group">
                <label for="message">Write your message here: </label>
                <br>
                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
            </div>

            <div class="form-group">
                <div class='form-check pl-1'>
                    <label for="mail_list">
                        <input type="checkbox" name="mail_list" id="mail_list">
                        Add me to your mailing list
                    </label>
                </div>
            </div>
            <div class="form-group">

                    <div class="form-check pl-1">
                    Please choose an email format:<br>
                    <label for="html">
                        <input type="radio" id="html" name="format"> HTML
                    </label>
                    <label for="text">
                        <input type="radio" id="text" name="format"> Text
                    </label>
                </div>

            </div>
        </fieldset>



        <!-- Submit button -->
        <button type="submit" class="btn-lg btn-block">Submit</button>

    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="scripts/guestbook.js"></script>
</body>
</html>

