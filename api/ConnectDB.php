<?php

    $mysqli = new mysqli('localhost','root', 'root','review');

    $mysqli->set_charset('utf8');

    // проверка подключения

    if ($mysqli->connect_errno) {
        die('Error connect to DataBase');
    }

?>