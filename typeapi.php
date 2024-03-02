<?php 
error_reporting(0);
$GLOBALS["pics"] = array(
    "golibuk",
    "boulder_golibuk",
    "coryphor",
    "furiousscout",
    "maramis",
    "mifmif",
    "purplepotato",
    "rachael",
    "rock_golibuk",
    "troll",
    "plysobear",
    "gnometopus",
    "kastrolovytrpaslik",
    "silenyVynalezce",
    "hrobnik",
    "motobobr",
    "megamysl",
    "rytir",
    "vousatyhrobnik"
);

$GLOBALS["effects"] = array(
    "attack",
    "bite",
    "block",
    "canba",
    "combo",
    "cumulative",
    "curse",
    "energy",
    "heal",
    "mechanic",
    "night",
    "perma",
    "shrapnel",
    "trap",
    "trigger",
    "unibonus",
    "univerzal",
    "weapon"
);

//echo "Hello world";
//var_dump($_SESSION);

function cardValid($card) {
    
    /*if (!isset($card['name'])) return false;
    if (!isset($card['type'])) return false;
    if (!isset($card['hp'])) return false;

    if ($card['hp'] < 0 || $card['hp'] > 100) return false;

    if (!isset($card['teamHp'])) return false;

    if ($card['teamHp'] < 0 || $card['teamHp'] > 10) return false;

    if (!isset($card['pic'])) return false;

    if (!in_array($card['pic'], $GLOBALS["pics"])) return false;

    if (!isset($card['star'])) return false;

    if ($card['star'] < 1 || $card['star'] > 4) return false;

    if (count($card['weapons']) !== 4) return false;

    foreach ($card['weapons'] as $weapon) {
        if ($weapon !== false && $weapon !== true) return false;
    }

    if (count($card['energy']) !== 4) return false;

    foreach ($card['energy'] as $energy) {
        if ($energy > 9 || $energy < 0) return false;
    }

    if (count($card['effects']) !== 8) return false;

    foreach ($card['effects'] as $effect) {
        if (!in_array($effect["effect"], $GLOBALS["effects"])) return false;
        if ($effect["value"] < -9 || $effect["value"] > 9) return false;
    }*/

    return true;
}

$resp = array();

$card = $_POST['card'];
$card = json_decode($card, true);

$file = file_get_contents("../storage/data.json");
$file = json_decode($file, true);


if (!isset($_SESSION['user'])) {

    $resp['error'] = "Not logged in";
    $resp['status'] = "error";
} else if (!isset($_POST['card'])) {
    $resp['error'] = "Card not defined";
    $resp['status'] = "error";
} else if (!isset($_POST['island'])) {
    $resp['error'] = "Island not defined";
    $resp['status'] = "error";
} else if ($file[$_SESSION['user']]['isBanned']) {
    $resp['error'] = "Jsi zabanovaný LOL";
    $resp['status'] = "error";
} else if (!cardValid($card)) {
    $resp['error'] = "Card is not valid";
    $resp['status'] = "error";
} else {

    $global = file_get_contents("../storage/global.json");
    $global = json_decode($global, true);

    $id = $global['druh'];
    $island = $_POST['island'];
    

    //array_push($file[$_SESSION['user']]['cards'], $card);
    $file[$_SESSION['user']]['islands'][$island]["types"][$id] = $card;
    $resp['status'] = "done";
    $resp['druh'] = $id;
    $resp['user'] = $_SESSION['user'];
    $resp['island'] = $island;
    $file = json_encode($file, JSON_PRETTY_PRINT);
    file_put_contents("../storage/data.json", $file);

    $global['druh'] = $global['druh'] + 1;
    $global = json_encode($global, JSON_PRETTY_PRINT);
    file_put_contents("../storage/global.json", $global);
}

echo json_encode($resp);

?>