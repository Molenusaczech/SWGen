<?php 
//echo "Hello world";
//var_dump($_SESSION);

$resp = array();

$file = file_get_contents("../storage/data.json");
$file = json_decode($file, true);

if (!isset($_SESSION['user'])) {

    $resp['error'] = "Not logged in";
    $resp['status'] = "error";
} else if (!isset($_POST['reason'])) {
    $resp['error'] = "Reason not defined";
    $resp['status'] = "error";
} else if ($file[$_SESSION['user']]['isBanned']) {
    $resp['error'] = "Jsi zabanovaný LOL";
    $resp['status'] = "error";
} else {


    $reports = file_get_contents("../storage/reports.json");
    $reports = json_decode($reports, true);

    $reason = $_POST['reason'];
    $location = $_POST['location'];

    $repdata = array(
        "reason" => $reason,
        "location" => $location,
        "user" => $_SESSION['user']
    );

    //array_push($file[$_SESSION['user']]['cards'], $card);
    $resp['status'] = "done";
    $resp['id'] = $id;
    $resp['user'] = $_SESSION['user'];
    array_push($reports, $repdata);

    $reports = json_encode($reports, JSON_PRETTY_PRINT);
    file_put_contents("../storage/reports.json", $reports);    
}

echo json_encode($resp);

?>