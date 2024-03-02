<?php 
//echo "Hello world";
//var_dump($_SESSION);

$resp = array();

$file = file_get_contents("../storage/data.json");
$file = json_decode($file, true);

if (!isset($_SESSION['user'])) {

    $resp['error'] = "Not logged in";
    $resp['status'] = "error";
} else if (!isset($_POST['islanddesc']) || !isset($_POST['islandid'])) {
    $resp['error'] = "Reason not defined";
    $resp['status'] = "error";
} else if ($file[$_SESSION['user']]['isBanned']) {
    $resp['error'] = "Jsi zabanovaný LOL";
    $resp['status'] = "error";
} else {

    $desc = $_POST['islanddesc'];
    $user = $_SESSION['user'];
    $id = $_POST['islandid'];

    $file[$user]['islands'][$id]['desc'] = $desc;

    $resp['status'] = "done";
    

    $file = json_encode($file, JSON_PRETTY_PRINT);
    file_put_contents("../storage/data.json", $file);
}

echo json_encode($resp);

?>