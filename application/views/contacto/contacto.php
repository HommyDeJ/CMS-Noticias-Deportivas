<?php
// define variables and set to empty values
$name_error = $email_error = "";
$name = $email = $message = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format";
    }
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }

  if ($name_error == '' and $email_error == ''){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }

      $to = 'hommydejesus1997@gmail.com';
      $subject = 'Contact Form Submit';
      if (mail($to, $subject, $message)){
          $success = "Message sent, thank you for contacting us!";
          $name = $email = $message = '';
      }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<div class="container full-page">
      <div class="row">

        <div class="breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('Inicio')?>">Inicio</a></li>
            <li class="active">Contacto</li>
          </ol>
        </div><!--/breadcrumb-wrapper-->

        <div class="container">
          <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <h3>Contacto</h3>
            <fieldset>
              <input placeholder="Nombre" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
              <span class="error"><?= $name_error ?></span>
            </fieldset>
            <fieldset>
              <input placeholder="Correo Electrónico" type="text" name="email" value="<?= $email ?>" tabindex="2">
              <span class="error"><?= $email_error ?></span>
            </fieldset>
            <fieldset>
              <textarea value="<?= $message ?>" name="message" tabindex="5">
              </textarea>
            </fieldset>
            <fieldset>
              <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
            <div class="success"><?= $success ?></div>
          </form>
        </div>


      </div><!--/full-page-->
    </div><!-- /main-view -->
