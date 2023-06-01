<?php
include_once "functions.php";
include_once "contact_process.php";
// Initialize variables
$lastname = $firstname = $email = $phone =  $message = "";
$lastnameError = $firstnameError = $emailError = $phoneError =  $messageError = "";
$isSuccess = false;
$emailTo = "mohamedlamine.silarbi@gmail.com";
$emailText = "";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Contactez-moi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="container">
    <div class="divider"></div>
    <div class="heading">
      <h2>Contactez-moi</h2>
    </div>
    <form id="contact-form" method="POST" action="contact_process.php" role="form">
      <div class="row">
        <div class="col-lg-6">
          <label for="firstname" class="form-label">Prénom <span class="blue">*</span></label>
          <input id="firstname" type="text" name="firstname" class="form-control" placeholder="Votre prénom">
          <p class="comments"><?php if (isset($_GET['firstnameError'])) echo $_GET['firstnameError']; ?></p>
        </div>
        <div class="col-lg-6">
          <label for="lastname" class="form-label">Nom <span class="blue">*</span></label>
          <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Votre Nom">
          <p class="comments"><?php if (isset($_GET['lastnameError'])) echo $_GET['lastnameError']; ?></p>
        </div>
        <div class="col-lg-6">
          <label for="email" class="form-label">Email <span class="blue">*</span></label>
          <input id="email" type="text" name="email" class="form-control" placeholder="Votre Email">
          <p class="comments"><?php if (isset($_GET['emailError'])) echo $_GET['emailError']; ?></p>
        </div>
        <div class="col-lg-6">
          <label for="phone" class="form-label">Téléphone</label>
          <input id="phone" type="phone" name="phone" class="form-control" placeholder="06 XX XX XX XX">
          <p class="comments"><?php if (isset($_GET['phoneError'])) echo $_GET['phoneError']; ?></p>
        </div>
        <div>
          <label for="message" class="form-label">Message <span class="blue">*</span></label>
          <textarea id="message" name="message" class="form-control" placeholder="Votre Message" rows="4"></textarea>
          <p class="comments"><?php if (isset($_GET['messageError'])) echo $_GET['messageError']; ?></p>
        </div>
        <div>
          <p class="blue"><strong>* Ces informations sont requises.</strong></p>
        </div>
        <div>
          <input type="submit" class="button1" value="Envoyer">
        </div>
      </div>
      <p class="thank-you" style="display:<?php if (isset($_GET['success']) && $_GET['success'] == 'true') echo "block";
                                          else echo "none"; ?>">
        Votre message a bien été envoyé. Merci de m'avoir contacté :)
      </p>
    </form>
  </div>
</body>

</html>

<!-- get = prendre des éléments (les do-->
<!-- post = enregistre des élémnts  (les données voyage da sle corps du site-->
<!-- array_key_exist methode pour vérifier si la clé existe -->
<!-- vérifier si le tableau est vide c'est emppty -->