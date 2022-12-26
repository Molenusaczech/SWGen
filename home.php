<?php
//var_dump($_POST);

if (isset($_POST["card"])) {
    echo "test";
    //exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>SW Hero Gen V2</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="herostyle.css">
</head>

<body>

<?php 
?>

<div class="main">

<div class="container">

    
    <img src="img/golibuk.png" width="310px" class="heropic" id="heropic">    <!-- <img src="img/golibuk.png" width="310px" class="heropic"> -->

  
    <img id="weaponBackground" src="img/weapon_background.png">


        <img id="sword" src="img/sword_off.png">    
        <img id="axe" src="img/axe_off.png">    
        <img id="bow" src="img/bow_off.png">    
        <img id="staff" src="img/staff_off.png">    

    <div class="frame">
            <img src="img/ram4.png" width="320px" id="frame">    </div>

    <div class="header">
       
    <div class="heroName" id="heroName">
        Jméno hrdiny    </div>

    <div class="heroType" id="heroType">
        Druh hrdiny    </div>

    <div class="heroHp" id="heroHp">
        99    </div>

    <div class="heroTeamHp" id="heroTeamHp">
        9    </div>

    <div id="energie1">
        +1    </div>

    <div id="energie2">
        +2   </div>

    <div id="energie3">
        +3    </div>

    <div id="energie4">
        +4    </div>

    
    <img src="img/attack.png" id="effect1">     <div id="value1">+2</div>    
    <img src="img/bite.png" id="effect2">       <div id="value2">-1</div>    
    <img src="img/univerzal.png" id="effect3">  <div id="value3">+1</div>    
    <img src="img/trap.png" id="effect4">       <div id="value4">+3</div>    
    <img src="img/unibonus.png" id="effect5">   <div id="value5">+2</div>    
    <img src="img/curse.png" id="effect6" >     <div id="value6">-2</div>    
    <img src="img/energy.png" id="effect7">     <div id="value7">+3</div>    
    <img src="img/attack.png" id="effect8">     <div id="value8">+3</div>


</div>
   

    

</div>

</div>

</div>


<div id="config">

    Jméno hrdiny: <input id="nameInput" type="text" onChange=updateCard() value="Jméno hrdiny">
<br>
Druh hrdiny: <input id="typeInput" type="text" onChange=updateCard() value="Druh hrdiny">
<br>
Životy hrdiny: <input id="hpInput" type="number" min="1" max="99" onChange=updateCard() value=99> Týmové životy hrdiny: <input id="teamHpInput" type="number" min="1" max="9" onChange=updateCard() value=9>
<br>
Obrázek hrdiny: <select id="picInput" class="select" onChange=updateCard()>
        <option value="golibuk" selected>Golibuk</option>
        <option value="boulder_golibuk">Boulder Golibuk</option>
        <option value="coryphor">Coryphor</option>
        <option value="furiousscout">Furious Scout</option>
        <option value="maramis">Maramis</option>
        <option value="mifmif">Mif Mif</option>
        <option value="purplepotato">Purple Potato</option>
        <option value="rachael">Rachael</option>
        <option value="rock_golibuk">Rock Golibuk</option>
        <option value="troll">Troll</option>
        <option value="plysobear">Plyšobear</option>
        <option value="gnometopus">Gnometopus</option>
        <option value="kastrolovytrpaslik">Kastrólový trpaslík</option>
        <option value="silenyVynalezce">Šílený vynálezce</option>
        <option value="hrobnik">Hrobník</option>
        <option value="motobobr">Motobobr</option>
        <option value="megamysl">Megamysl</option>
        <option value="rytir">Rudý Rytíř</option>
        <option value="vousatyhrobnik">Vousatý hrobník</option>
</select>
<br>

Počet hvězd:
<select name="star" class="select" id="starInput" onChange=updateCard()>
        <option value="1">1*</option>
        <option value="2">2*</option>
        <option value="3">3*</option>
        <option value="4" selected>4*</option>
    </select>

<br>
Preference zbraní: 
 <input type="checkbox" id="swordInput" onChange=updateCard() > Meče
 <input type="checkbox" id="axeInput" onChange=updateCard() > Sekery
 <input type="checkbox" id="bowInput" onChange=updateCard() > Luky
 <input type="checkbox" id="staffInput" onChange=updateCard() > Hůlky
<br>
Energie: <input id="energInput1" type="number" min="1" max="9" onChange=updateCard() value=1> 
<input id="energInput2" type="number" min="1" max="9" onChange=updateCard() value=2>
<input id="energInput3" type="number" min="1" max="9" onChange=updateCard() value=3>
<input id="energInput4" type="number" min="1" max="9" onChange=updateCard() value=4>
<br>
<div id="prvnidoba" class="doba">
    <select id="effectInput1" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput1" type="number" min="-9" max="9" onChange=updateCard() value=2>
    <br>
    <select id="effectInput2" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite" selected>Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput2" type="number" min="-9" max="9" onChange=updateCard() value=-1>
</div>

<div id="druhadoba" class="doba">

<select id="effectInput3" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal" selected>Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput3" type="number" min="-9" max="9" onChange=updateCard() value=1>
    <br>
    <select id="effectInput4" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap" selected>Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput4" type="number" min="-9" max="9" onChange=updateCard() value=3>

</div>

<div id="tretidoba" class="doba">

<select id="effectInput5" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus" selected>Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput5" type="number" min="-9" max="9" onChange=updateCard() value=2>
    <br>
    <select id="effectInput6" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse" selected>Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput6" type="number" min="-9" max="9" onChange=updateCard() value=-2>

</div>

<div id="ctvrtadoba" class="doba">

<select id="effectInput7" class="select" onChange=updateCard()>
        <option value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy" selected>Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput7" type="number" min="-9" max="9" onChange=updateCard() value=3>
    <br>
    <select id="effectInput8" class="select" onChange=updateCard()>
        <option selected value="attack">Útok do hrdiny</option>
        <option value="bite">Vampirijské kousnutí</option>
        <option value="block">Štít</option>
        <option value="canba">Canbalandský útok do zbraně</option>
        <option value="combo">Combo</option>
        <option value="cumulative">Kumulák</option>
        <option value="curse">Prokletí</option>
        <option value="energy">Energie</option>
        <option value="heal">Léčení</option>
        <option value="mechanic">Mechanikova superakce</option>
        <option value="night">Noční útok</option>
        <option value="perma">Trvalý útok</option>
        <option value="shrapnel">Šrapnel</option>
        <option value="trap">Past</option>
        <option value="trigger">Odpalovač komba</option>
        <option value="unibonus">Požehnání</option>
        <option value="univerzal">Univerzální útok</option>
        <option value="weapon">Útok na zbraň</option>
    </select> 
    <input id="valueInput8" type="number" min="-9" max="9" onChange=updateCard() value=3>

</div>

<button id="jsonExport" onClick=jsonExport()>Exportovat do JSONu</button>
<button id="jsonImportButton" onClick=jsonImport()>Importovat z JSONu</button>

<?php

if (isset($_SESSION['user'])) {
    echo <<<END
    <button id="saveButton" onClick=saveCard()>Uložit kartu</button>
    END;
} else {
    echo <<<END
    Ukládání karet je možné pouze přihlášeným uživatelům.
    END;
}

?>


</div>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="main.js"></script>

</body>

</html>