<?php 

$inverts = array("mechanic", "night", "trigger");
$file = file_get_contents("../storage/data.json");
$file = json_decode($file, true);

$name = htmlspecialchars($file[$user]["islands"][$islandid]["name"], ENT_QUOTES, 'UTF-8');
$desc = htmlspecialchars($file[$user]["islands"][$islandid]["desc"], ENT_QUOTES, 'UTF-8');
// htmlspecialchars($card["energy"]["1"], ENT_QUOTES, 'UTF-8');
?>

<!DOCTYPE html>
<html>
<head>
    <title>SW Hero Gen V2</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/herostyle.css">
    <link rel="stylesheet" href="/collectionstyle.css">
</head>

<body>

<h1> Ostrov - <?php echo $name ?></h1>
<h2> Vytvořil <?php echo $user ?></h2>

Popis ostrova: <br>
<div id="islanddesc"> <?php echo $desc ?> </div><br>

<?php

if ($user == $_SESSION["user"]) {
echo <<<END
    <button id="editdesc" onClick=editdesc()>Upravit popis</button> 
    <button id="savedesc" onClick=savedesc() style="display: none;">Uložit</button> 
END;
}
?>
<br>
<?php 

$cards = $file[$user]["islands"][$islandid]["types"];


foreach ($cards as $id => $card) {
    
    if ($card["weapons"]["sword"]) {
        $sword = "sword_on.png";
    } else {
        $sword = "sword_off.png";
    }

    if ($card["weapons"]["axe"]) {
        $axe = "axe_on.png";
    } else {
        $axe = "axe_off.png";
    }

    if ($card["weapons"]["bow"]) {
        $bow = "bow_on.png";
    } else {
        $bow = "bow_off.png";
    }

    if ($card["weapons"]["staff"]) {
        $staff = "staff_on.png";
    } else {
        $staff = "staff_off.png";
    }
//htmlspecialchars($string, ENT_QUOTES, 'UTF-8');

    $type = htmlspecialchars($card["type"], ENT_QUOTES, 'UTF-8');
    $pic = htmlspecialchars($card["pic"], ENT_QUOTES, 'UTF-8');
    $star = htmlspecialchars($card["star"], ENT_QUOTES, 'UTF-8');

    $effect1 = $card["effects"]["1"]["effect"];
    $effect2 = $card["effects"]["2"]["effect"];
    $effect3 = $card["effects"]["3"]["effect"];
    $effect4 = $card["effects"]["4"]["effect"];
    $effect5 = $card["effects"]["5"]["effect"];
    $effect6 = $card["effects"]["6"]["effect"];
    $effect7 = $card["effects"]["7"]["effect"];
    $effect8 = $card["effects"]["8"]["effect"];
    

    if (in_array($effect1, $inverts)) {
        $effectClass1 = "class='switchedeffect1'";
        $valueClass1 = "class='switchedvalue1'";
    } else {
        $effectClass1 = "";
        $valueClass1 = "";
    }

    if (in_array($effect2, $inverts)) {
        $effectClass2 = "class='switchedeffect2'";
        $valueClass2 = "class='switchedvalue2'";
    } else {
        $effectClass2 = "";
        $valueClass2 = "";
    }

    if (in_array($effect3, $inverts)) {
        $effectClass3 = "class='switchedeffect3'";
        $valueClass3 = "class='switchedvalue3'";
    } else {
        $effectClass3 = "";
        $valueClass3 = "";
    }

    if (in_array($effect4, $inverts)) {
        $effectClass4 = "class='switchedeffect4'";
        $valueClass4 = "class='switchedvalue4'";
    } else {
        $effectClass4 = "";
        $valueClass4 = "";
    }

    if (in_array($effect5, $inverts)) {
        $effectClass5 = "class='switchedeffect5'";
        $valueClass5 = "class='switchedvalue5'";
    } else {
        $effectClass5 = "";
        $valueClass5 = "";
    }

    if (in_array($effect6, $inverts)) {
        $effectClass6 = "class='switchedeffect6'";
        $valueClass6 = "class='switchedvalue6'";
    } else {
        $effectClass6 = "";
        $valueClass6 = "";
    }

    if (in_array($effect7, $inverts)) {
        $effectClass7 = "class='switchedeffect7'";
        $valueClass7 = "class='switchedvalue7'";
    } else {
        $effectClass7 = "";
        $valueClass7 = "";
    }

    if (in_array($effect8, $inverts)) {
        $effectClass8 = "class='switchedeffect8'";
        $valueClass8 = "class='switchedvalue8'";
    } else {
        $effectClass8 = "";
        $valueClass8 = "";
    }

    echo <<<END
    <div class="collectionContainer">
    <div class="main">
    <a href="/druh/$user/$islandid/$id" class="cardlink">
    <div class="container">
    
        
        <img src="/img/$pic.png" width="310px" class="heropic" id="heropic">    <!-- <img src="/img/golibuk.png" width="310px" class="heropic"> -->
    
      
        <img id="weaponBackground" src="/img/weapon_background.png">
    
    
            <img id="sword" src="/img/$sword">    
            <img id="axe" src="/img/$axe">    
            <img id="bow" src="/img/$bow">    
            <img id="staff" src="/img/$staff">    
    
        <div class="frame">
                <img src="/img/ram$star.png" width="320px" id="frame">    </div>
    
        <div class="header">
           
    
        <div class="heroType" id="heroType">
            $type    </div>
    
    
    
        <div id="energie1">
            +    </div>
    
        <div id="energie2">
            +   </div>
    
        <div id="energie3">
            +    </div>
    
        <div id="energie4">
            +    </div>
    
        
        <img src="/img/$effect1.png" id="effect1" $effectClass1>         
        <img src="/img/$effect2.png" id="effect2" $effectClass2>        
        <img src="/img/$effect3.png" id="effect3" $effectClass3>        
        <img src="/img/$effect4.png" id="effect4" $effectClass4>        
        <img src="/img/$effect5.png" id="effect5" $effectClass5>        
        <img src="/img/$effect6.png" id="effect6" $effectClass6>       
        <img src="/img/$effect7.png" id="effect7" $effectClass7>        
        <img src="/img/$effect8.png" id="effect8" $effectClass8>    
    
    
    </div>
       
    
        
    
    </div>
    </div>
    </a>
    </div>
    END;
}

?>

<script>

    var islandid = "<?php echo $islandid; ?>";
    var user = "<?php echo $user; ?>";

</script>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="/island.js"></script>

</body>
</html>