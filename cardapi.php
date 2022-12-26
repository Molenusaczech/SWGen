<?php 
//echo "Hello world";
//var_dump($_SESSION);

$resp = array();

$card = $_POST['card'];
$card = json_decode($card, true);

$file = file_get_contents("data.json");
$file = json_decode($file, true);


if (!isset($_SESSION['user'])) {

    $resp['error'] = "Not logged in";
    $resp['status'] = "error";
} else if (!isset($_POST['card'])) {
    $resp['error'] = "Card not defined";
    $resp['status'] = "error";
} else if ($file[$_SESSION['user']]['isBanned']) {
    $resp['error'] = "Jsi zabanovaný LOL";
    $resp['status'] = "error";
} else {

    $global = file_get_contents("global.json");
    $global = json_decode($global, true);

    $id = $global['id'];
    

    //array_push($file[$_SESSION['user']]['cards'], $card);
    $file[$_SESSION['user']]['cards'][$id] = $card;
    $resp['status'] = "done";
    $resp['id'] = $id;
    $resp['user'] = $_SESSION['user'];
    $file = json_encode($file, JSON_PRETTY_PRINT);
    file_put_contents("data.json", $file);

    $global['id'] = $global['id'] + 1;
    $global = json_encode($global, JSON_PRETTY_PRINT);
    file_put_contents("global.json", $global);
}

echo json_encode($resp);

?>