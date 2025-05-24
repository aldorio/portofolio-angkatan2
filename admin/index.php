<?php 
session_start();
include 'config/koneksi.php';

if(isset ($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = sha1($_POST['password']);

  // select / tampulkan semua data dari table bernama tbl_users dimana email diambil dari orang 
  // input di inputan email

  $query = mysqli_query($config, "SELECT * FROM tbl_users WHERE email='$email' AND password='$password'");
  // apakah benar email dan password yang sudah di input user sesuai dengan tbl_user

  if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);

    $_SESSION['NAME'] = $row['name'];
    $_SESSION['ID_USER'] = $row['id'];
    $_SESSION['LEVEL'] = $row ['id_level'];
    header("location:dashboard.php");
  } else {
    header("location:index.php?error=login");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Portofolio Aldo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="wrapper">
    <div class="login-form mt-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-header">
                Login Form
              </div>
              <div class="card-body">
                <form action="" method="post">
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ex:admin@gmail.com">
                  </div>
                   <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Masuk</button>
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