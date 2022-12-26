<?php
session_start();

$request = $_SERVER['REQUEST_URI'];

//echo $request





$args = explode("/", $request);

if ($args[1] == "api" && $args[2] == "card") {
    require "cardapi.php";
    exit();
} else if ($args[1] == "api" && $args[2] == "report") {
    require "reportapi.php";
    exit();
}

require "header.php";

if ($request == "/") {
    require "home.php";
} elseif ($args[1] == "login") {
    require "login.php";
} elseif ($args[1] == "ostrovy") {
    require "ostrovy.php";
} elseif ($args[1] == "logout") {
    unset($_SESSION['user']);
    header("Location: /");
} elseif ($args[1] == "sbirka") {
    $reg = "/[\s\S]-\d\d\d\d$/";
    if (!isset($args[2]) || !preg_match($reg, $args[2])) {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit();
        } else {
            $user = $_SESSION['user'];
            header("Location: /sbirka/$user");
            exit();
        }
    } else {
        $user = $args[2];
    }
    require "sbirka.php";
} elseif ($args[1] == "card" && preg_match("/[\s\S]-\d\d\d\d$/", $args[2]) && isset($args[3])) {
    $user = $args[2];
    $id = $args[3];
    require "card.php";
}

