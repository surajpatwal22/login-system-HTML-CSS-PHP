<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin= true;
}else {
  $loggedin= false;
}

echo '<nav class="navbar navbar-expand-lg  bg-dark" data-bs-theme="dark>
  <div class="container">
    <a class="navbar-brand" href="#" style="color: white;">SecureApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem" style="color: white;">Home</a>
        </li>' ;

        if (!$loggedin) {
          echo '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/login.php" style="color: white;">login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/loginsystem/signup.php" style="color: white;">Register</a>
      </li>' ;
        }
        if ($loggedin) {
          echo '
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/logout.php" style="color: white;">logout</a>
        </li>
       ' ;
        }
     echo '</ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';

?>