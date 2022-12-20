<?php 
session_start();

if(isset($_POST["login"]) && isset($_POST["password"])) {
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    $url = "https://scratchwars.cloud/public/api/auth";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
       "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    $data = "uid=$login&pin=$password";
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    //var_dump($resp);
    
    //echo "<br>code:";
    //echo curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($code == 200) {
        $authed = 1;
        $_SESSION['user'] = $login;
        header("Location: index.php");
    } else {
        $authed = 0;
        echo "Wrong credentials";
    }

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
</head>

<body>

<div class="authWindow"> 
        <!--<p>Login:</p> -->
        <form action="login.php" method="post">
            <input type="text" name="login" placeholder="App ID"> <br>
            <input type="password" name="password" placeholder="PIN"> <br>

            <input type="submit" value="Přihlásit se">
        </form>
        </div>


</body>

</html>