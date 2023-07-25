<?php
    #header("Location: http://ec2-52-8-173-25.us-west-1.compute.amazonaws.com/redial/index2.php");

    $host = $_ENV["SERVER_HOST"];
    header('Location: http://'.$host.'/redial/index2.php');
    /* Make sure that code below does not get executed when we redirect. */
    exit;
?>
