<?php
session_start();
// Sode required by Simcaptcha
$code = $_POST['code'] ?? 0;
$code = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Captcha</title>
</head>

<body>
    <?php
        
    require_once 'captcha_class.php';
    $captcha = new Captcha();

    if ($captcha->validateCaptcha($code)) {
        echo '<h2>Valid Captcha!</h2>';
        // Do something
    } else {
        echo '<h2>Invalid Captcha!</h2>';
        // Do something else
    }

    echo $captcha->renderImage();
    ?>

    <form method="POST">
        <p><input required type="input" name="code"></p>
        <p><button>Submit</button></p>
    </form>

</body>

</html>