<?php 

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    
    $file = file_get_contents('../storage/data.json');
    $file = json_decode($file, true);

    $user = $_SESSION['user'];

    $global = file_get_contents('../storage/global.json');
    $global = json_decode($global, true);

    $id = $global['ostrovy'];

    $global['ostrovy'] = $global['ostrovy'] + 1;

    $file[$user]["islands"][$id] = array(
        "name" => $name,
        "desc" => "Tady zatím nic není",
        "types" => array(),
        "image" => "defaultIsland.png"
    );

    $file = json_encode($file, JSON_PRETTY_PRINT);
    file_put_contents('../storage/data.json', $file);

    $global = json_encode($global, JSON_PRETTY_PRINT);
    file_put_contents('../storage/global.json', $global);
    
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


<h1> Vytvořit nový ostrov </h1>

<form action="/ostrovy" method="post">
    Název Ostrova: <input type="text" id="name" name="name"><br>
    <input type="submit" value="Vytvořit">
</form>

<table>
    <tr>
        <th>Ostrov</th>
        <th>Název</th>
        <th>Popis</th>
        <th>Počet typů</th>
    </tr>

<?php 

$file = file_get_contents('../storage/data.json');
$file = json_decode($file, true);

$islands = $file[$_SESSION['user']]['islands'];

//var_dump($islands);

foreach ($islands as $id => $island) {
    $name = $island['name'];
    $image = $island['image'];
    $desc = $island['desc'];
    $typecount = count($island['types']);
    $user = $_SESSION['user'];

    if ($image == "" || $image == "defaultIsland.png") {
        $image = "/img/defaultIsland.png";
    }

    $count = count($island['types']);
    echo <<<END
    
    <tr>
        
        <td><a href="/ostrov/$user/$id"> <img src="$image" alt="Ostrov" width="100"></a> </td>
        <td><a href="/ostrov/$user/$id">$name</a></td>
        <td>$desc</td>
        <td>$count</td>
        

    </tr>

    END;
}

?>

</table>

</body>
</html>