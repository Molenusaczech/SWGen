
<div class="navbar">
  <a href="/">Generátor Karet</a>
  <div class="dropdown">
    <button class="dropbtn">Vytvořit 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/">Hrdinu</a>
      <a href="/typ">Typ hrdiny</a>
    </div>
  </div> 

  <div class="dropdown">
    <button class="dropbtn">Moje 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/sbirka">Moje sbírka</a>
      <a href="/ostrovy">Moje ostrovy</a>
    </div>
  </div> 

  <?php 
  
  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo <<<END
    <div class="dropdown left">
    <button class="dropbtn"> $user
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="/logout">Odhlásit se</a>
    </div>
    </div> 
    END;
} else {
    echo '<div class="left"><a href="/login">Přihlásit se</a></div>';
}

  ?>

</div>