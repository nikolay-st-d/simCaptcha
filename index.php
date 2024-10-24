<?php
session_start();
// Code required by Simcaptcha
$code = $_POST['code'] ?? 0;
$code = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="captcha-styles.css">
    <title>Simple Captcha</title>
</head>

<body>
        <?php

        require_once 'captcha_class.php';
        $captcha = new Captcha($code);

        // Optional validation message
        // Must be placed BEFORE the renderImage method
        $validation_message = $captcha->validationMessage();
        if ($_POST) {
            echo '<div class="captcha-validation-message">';
            echo $validation_message;
            echo '</div>';
        } else {
            echo '<div class="captcha-validation-message">';
            echo 'Captcha Form';
            echo '</div>';
        }

        if ($captcha->validateCaptcha($code)) {
            // Code to execute:
        
        } else {
            // Optional code for failed validation:
        }

        ?>

        <form id="form-with-captcha" method="POST">
            <input type="text" name="name_1" placeholder="Form field 1">
            <input type="text" name="name_2" placeholder="Form field 2">
            <input type="text" name="name_3" placeholder="Form field 3">
            <div>
                <img src="<?= $captcha->renderImage(); ?>">
                <div> = </div>
                <input required type="input" name="code" placeholder=" ?">
            </div>
            <button>SUBMIT</button>
        </form>
</body>

</html>