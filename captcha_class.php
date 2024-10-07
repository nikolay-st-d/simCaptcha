<?php

class Captcha
{

    const DATA = [
        '101' => 5,
        '102' => 12,
        '103' => 4,
        '104' => 3,
        '105' => 9,
        '106' => 11,
        '107' => 1,
        '108' => 6,
        '109' => 7,
        '110' => 10,
        '111' => 13,
        '112' => 2,
        '113' => 8,
        '114' => 14,
        '115' => 19,
        '116' => 15,
        '117' => 16,
        '118' => 18,
        '119' => 20,
        '120' => 17,
    ];

    const PATH_TO_IMG = 'capt_img/';

    function renderImage()
    {
        $file_name = (string) rand(101, 120);
        $path = Captcha::PATH_TO_IMG;
        $_SESSION['captcha_file'] = $file_name;
        return "<img src='{$path}capt_img_{$file_name}.jpg'>";
    }

    function validateCaptcha($input)
    {
        if (!empty($_SESSION['captcha_file'])) {
            $file_name = $_SESSION['captcha_file'];
            return (int) $input === (int) Captcha::DATA[$file_name];
        }
        return False;
    }

}

