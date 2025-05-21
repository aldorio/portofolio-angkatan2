<?php 
include 'config/koneksi.php';

// jika user mencet button simpan terjadi perintah ambil data dari inputan, email,nama, dan password
// jika sudah input makan akan masuk ke dalam table user(name,email,password) nilainya dari masing" inputan

if(isset($_POST['simpan'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($config, "INSERT INTO tbl_users (name, email, password) VALUES ('$name','$email','$password')");
  if ($query) {
    header("location:user.php?tambah=berhasil");
  }
  
}

$header = isset($_GET['edit'])? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM tbl_users WHERE id='$id_user'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  $queryUpdate = mysqli_query($config, "UPDATE tbl_users SET name='$name', email='$email', password='$password' WHERE id='$id_user'");
  if ($queryUpdate) {
    header("location:user.php?ubah=berhasil");
  }
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
          <a class="nav-link active" aria-current="" href="dashboard.php">Home</a>
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
                <?= $header ?> Data User
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Nama *</label>
                    </div>
                    <div class="col-sm-10">
                      <input  required name="name" type="text" class="form-control" placeholder="Masukkan nama anda" values="<?= $rowEdit['name']?> ">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Email *</label>
                    </div>
                    <div class="col-sm-10">
                      <input required name="email" type="Email" class="form-control" placeholder="Masukkan email anda" values="<?= $rowEdit['email']?> ">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Password *</label>
                    </div>
                    <div class="col-sm-10">
                      <input required name="password" type="password" class="form-control" placeholder="Masukkan password anda">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-12">
                      <button name="<?= isset($_GET['edit']) ?'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>



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