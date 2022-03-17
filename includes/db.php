<?php 
    
    $ip = 'localhost';
    $un = 'root';
    $pw = '';
    $db = 'stsloan';

    $link = mysqli_connect($ip, $un, $pw, $db);

    if(!$link) {
        die('could not connect: ');
    }

?>