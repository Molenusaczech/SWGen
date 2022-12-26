<!DOCTYPE html>
<html>
<head>
    <title>SW Hero Gen V2</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/herostyle.css">
    <link rel="stylesheet" href="/collectionStyle.css">
</head>

<body>
<h1>Karty vytvořené
<?php
echo $user;
?>
</h1>

<?php 

$inverts = array("mechanic", "night", "trigger");

$cards = file_get_contents("data.json");
$cards = json_decode($cards, true);
$cards = $cards[$user]['cards'];
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
    $name = $card["name"];
    $type = $card["type"];
    $hp = $card["hp"];
    $teamHp = $card["teamHp"];
    $pic = $card["pic"];
    $star = $card["star"];
    $energie1 = $card["energy"]["1"];
    $energie2 = $card["energy"]["2"];
    $energie3 = $card["energy"]["3"];
    $energie4 = $card["energy"]["4"];

    $effect1 = $card["effects"]["1"]["effect"];
    $val1 = $card["effects"]["1"]["value"];
    if ($val1 >= 0 && !in_array($effect1, $inverts)) {
        $val1 = "+" .$val1;
    } else {
        $val1 = $val1;
    }

    $effect2 = $card["effects"]["2"]["effect"];
    $val2 = $card["effects"]["2"]["value"];
    if ($val2 >= 0 && !in_array($effect2, $inverts)) {
        $val2 = "+" .$val2;
    } else {
        $val2 = $val2;
    }

    $effect3 = $card["effects"]["3"]["effect"];
    $val3 = $card["effects"]["3"]["value"];
    if ($val3 >= 0 && !in_array($effect3, $inverts)) {
        $val3 = "+" .$val3;
    } else {
        $val3 = $val3;
    }

    $effect4 = $card["effects"]["4"]["effect"];
    $val4 = $card["effects"]["4"]["value"];
    if ($val4 >= 0 && !in_array($effect4, $inverts)) {
        $val4 = "+" .$val4;
    } else {
        $val4 = $val4;
    }

    $effect5 = $card["effects"]["5"]["effect"];
    $val5 = $card["effects"]["5"]["value"];
    if ($val5 >= 0 && !in_array($effect5, $inverts)) {
        $val5 = "+" .$val5;
    } else {
        $val5 = $val5;
    }

    $effect6 = $card["effects"]["6"]["effect"];
    $val6 = $card["effects"]["6"]["value"];
    if ($val6 >= 0 && !in_array($effect6, $inverts)) {
        $val6 = "+" .$val6;
    } else {
        $val6 = $val6;
    }

    $effect7 = $card["effects"]["7"]["effect"];
    $val7 = $card["effects"]["7"]["value"];
    if ($val7 >= 0 && !in_array($effect7, $inverts)) {
        $val7 = "+" .$val7;
    } else {
        $val7 = $val7;
    }

    $effect8 = $card["effects"]["8"]["effect"];
    $val8 = $card["effects"]["8"]["value"];
    if ($val8 >= 0 && !in_array($effect8, $inverts)) {
        $val8 = "+" .$val8;
    } else {
        $val8 = $val8;
    }

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
    <a href="/card/$user/$id" class="cardlink">
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
           
        <div class="heroName" id="heroName">
            $name    </div>
    
        <div class="heroType" id="heroType">
            $type    </div>
    
        <div class="heroHp" id="heroHp">
            $hp    </div>
    
        <div class="heroTeamHp" id="heroTeamHp">
            $teamHp    </div>
    
        <div id="energie1">
            +$energie1    </div>
    
        <div id="energie2">
            +$energie2   </div>
    
        <div id="energie3">
            +$energie3    </div>
    
        <div id="energie4">
            +$energie4    </div>
    
        
        <img src="/img/$effect1.png" id="effect1" $effectClass1>      <div id="value1" $valueClass1>$val1</div>    
        <img src="/img/$effect2.png" id="effect2" $effectClass2>      <div id="value2" $valueClass2>$val2</div>    
        <img src="/img/$effect3.png" id="effect3" $effectClass3>      <div id="value3" $valueClass3>$val3</div>    
        <img src="/img/$effect4.png" id="effect4" $effectClass4>      <div id="value4" $valueClass4>$val4</div>    
        <img src="/img/$effect5.png" id="effect5" $effectClass5>      <div id="value5" $valueClass5>$val5</div>    
        <img src="/img/$effect6.png" id="effect6" $effectClass6>     <div id="value6" $valueClass6>$val6</div>    
        <img src="/img/$effect7.png" id="effect7" $effectClass7>      <div id="value7" $valueClass7>$val7</div>    
        <img src="/img/$effect8.png" id="effect8" $effectClass8>      <div id="value8" $valueClass8>$val8</div>
    
    
    </div>
       
    
        
    
    </div>
    </div>
    </a>
    </div>
    END;
}

?>

</body>

</html>