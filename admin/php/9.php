<?php 
session_start();

if(empty($_SESSION ['email'])){
  header("location:8php?access=failed");
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="wrapper">
    <header class="shadow p-3 mb-5 bg-body-tertiary rounded">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CMS Aldo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Page
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Page</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="user.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="keluar.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </header>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-body">
                <div align="right">
                <h6>Selamat Datang, <?php echo isset($_SESSION['email']) ? $_SESSION ['email'] : ''?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>