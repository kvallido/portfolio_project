<?php

// echo "functions.php is loaded";

function validName($name)
{
    return !empty($name); // && ctype_alpha($name);
}

function validFormat($format)
{
    return $format == "HTML" OR $format == "text";
}

function validEmail($email)
{
    return !empty($email);
}

function validMet($how_met)
{
    if ($how_met == 'none') {
        echo '<h5>"How we met" is required</h5>';
        return false;
    }
    elseif ($how_met == 'other') {
        if (empty($_POST['other'])) {
            echo "<h5>If other is selected, details in text box are required.</h5>";
            return false;
        }
    }
    return true;
}

function validUrl($linkedin) {
    if (!empty($linkedin)) {
        $url = "https://www.linkedin.com/";
        if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED))
        {
            return true;
        }
        else {
            echo "<h5>Please enter a valid URL</h5>";
            return false;
        }
    }
    return false;
}
