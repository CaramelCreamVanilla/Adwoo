<!DOCTYPE html>
<html>
<head>
  <title>My PHP page with Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>.center {
    display: flex;
    justify-content: center;
    align-items: center;
    }</style>
</head>
<body>
  <!-- Your HTML goes here -->

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>
 <!-- Navbar -->

    <container>
  <h1 class="center">Welcome to my page</h1>
  <p class="center">Hello, my name is John and this is my personal website.</p>
  <div>
    <h2 class="center">About Me</h2>
    <p class="center">I am a software developer and I enjoy building websites and applications.</p>
  </div>
    <h2 class="center">Projects</h2>
    </container>

<form method="POST" action="index.php">
  <button  class="btn btn-primary links" >click</button>
</form>



  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>


 <!-- PHP TEST DB -->
 <?php

include("server.php");

$sql_command = "SELECT * FROM adwoo_wallat WHere cus_id = '1'";
$sql_data_obj = mysqli_query($conn,$sql_command);
while($show_sql = mysqli_fetch_array($sql_data_obj))
{
    echo  $show_sql['adwoo_coin'] + 20;
}
?>
<!-- PHP TEST DB -->