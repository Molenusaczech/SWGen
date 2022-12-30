<?php

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 267840);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(267840);

session_start();

$request = $_SERVER['REQUEST_URI'];

//echo $request





$args = explode("/", $request);

if ($args[1] == "api" && $args[2] == "card") {
    require "../cardapi.php";
    exit();
} else if ($args[1] == "api" && $args[2] == "report") {
    require "../reportapi.php";
    exit();
}

if ($args[1] !== "sbirka" || isset($args[2])) {
    require "../header.php";
}

$file = file_get_contents("../storage/data.json");
$file = json_decode($file, true);

if ($request == "/") {
    require "../home.php";
} elseif ($args[1] == "login") {
    require "../login.php";
} elseif ($args[1] == "ostrovy") {
    require "../ostrovy.php";
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
        if (isset($file[$args[2]])) {
            $user = $args[2];
        } else {
            require "../404.php";
            exit();
        }
    }
    require "../sbirka.php";
} elseif ($args[1] == "card" && preg_match("/[\s\S]-\d\d\d\d$/", $args[2]) && isset($args[3])) {
    $user = $args[2];
    $id = $args[3];
    if (isset($file[$user]["cards"][$id])) {
        require "../card.php";
    } else {
        require "../404.php";
    }
} else {
    require "../404.php";
}

