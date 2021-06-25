<?php
    $to = "noahschristopher250@gmail.com";
    $subject = "This is subject";

    $message = "<b>This is HTML message.</b>";
    $message .= "<h1>This is headline.</h1>";

    $header = "From:mymailid@gmail.com \r\n";
    $retval = mail($to,$subject,$message,$header);
    if(isset($retval))//change
    {
        echo "Message sent successfully...";
    }
    else
    {
        echo "Message could not be sent...";
    }
?>