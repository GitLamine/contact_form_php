<?php
// Function to sanitize the user input
function verifyInput($var)
{
    return htmlspecialchars(stripslashes(trim($var)));
}

// Function to validate an email address
function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

// Function to validate a phone number
function isPhone($var)
{
    return preg_match("/^[0-9 ]*$/", $var);
}
