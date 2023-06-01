<?php
include_once "functions.php";
// Initialize variables
$lastname = $firstname = $email = $phone =  $message = "";
$lastnameError = $firstnameError = $emailError = $phoneError =  $messageError = "";
$isSuccess = false;
$emailTo = "mohamedlamine.silarbi@gmail.com";
$emailText = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and validate the input values
    $firstname = verifyInput($_POST["firstname"]);
    $lastname = verifyInput($_POST["lastname"]);
    $email = verifyInput($_POST["email"]);
    $phone = verifyInput($_POST["phone"]);
    $message = verifyInput($_POST["message"]);

    $isSuccess = true;
    $errors = [];

    // Validate and construct the email body
    if (empty($firstname)) {
        $firstnameError = "Prénom est incorrect";
        $errors['firstnameError'] = $firstnameError;
        $isSuccess = false;
    } else {
        $emailText .= "Firstname : $firstname\n";
    }

    if (empty($lastname)) {
        $lastnameError = "Le nom est incorrect";
        $errors['lastnameError'] = $lastnameError;
        $isSuccess = false;
    } else {
        $emailText .= "Lastname : $lastname\n";
    }

    if (!isEmail($email)) {
        $emailError = "Email invalid";
        $errors['emailError'] = $emailError;
        $isSuccess = false;
    } else {
        $emailText .= "Email : $email\n";
    }

    if (!isPhone($phone)) {
        $phoneError = "le numéro de téléphone n'est pas valid";
        $errors['phoneError'] = $phoneError;
        $isSuccess = false;
    } else {
        $emailText .= "Phone : $phone\n";
    }

    if (empty($message)) {
        $messageError = "Le message est incorrect";
        $errors['messageError'] = $messageError;
        $isSuccess = false;
    } else {
        $emailText .= "Message : $message\n";
    }

    // If the validation is successful, send the email
    if ($isSuccess) {
        $headers = "From: $firstname $lastname <$email>\r\nReply-To: $email";
        mail($emailTo, "email test", $emailText, $headers);
        header("Location: index.php?success=true");
    } else {
        $errorQuery = http_build_query($errors);
        header("Location: index.php?success=false&$errorQuery");
    }
}
