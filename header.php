<header>

    Generátor karet

    <a href="/"> Vytvořit hrdinu </a>
    <a href="/sbirka"> Sbírka </a>
    
    <span id="login">
    <?php 
    if (isset($_SESSION['user'])) {
        echo "Jsi přihlášen jako: " . $_SESSION['user'] . " <a href='logout' id='logout'> Odhlásit </a>";
    } else {
        echo "<a href='login' id='logout'> Nejste přihlášen </a>";
    }
    ?>
    </span>
</header>
