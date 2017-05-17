<?php
    $text = str_replace('[jump]', '<br />', $_POST['message']);

    $text = str_replace('[p]', '</p><p style="margin: 1em 0px;margin-top: 0px; text-align: center">', $text);

    $text = str_replace('[link href=', '<a style="color: #3f3f3f;text-decoration: underline;" href="', $text);
    $text = str_replace(' link-text=', '">', $text);
    $text = str_replace(' /link]', '</a>', $text);

    require('email.php');

    $file = fopen('mail.txt', 'r+');
    ftruncate($file, 0);
    fputs($file, $message . '</body></html>');
    fclose($file);

    echo $message;
?>
<script src='newsletter.js' type='text/javascript'></script>