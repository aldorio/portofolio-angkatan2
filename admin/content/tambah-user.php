<?php 
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

  if ($password == '') {
    $queryUpdate = mysqli_query($config, "UPDATE tbs_users SET name='$name', email='$email', WHERE id='$id_user'");
  }

  $queryUpdate = mysqli_query($config, "UPDATE tbl_users SET name='$name', email='$email', password='$password' WHERE id='$id_user'");
  if ($queryUpdate) {
    header("location:user.php?ubah=berhasil");
  }
}

?>


<form action="" method="post">
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Nama *</label>
                    </div>
                    <div class="col-sm-10">
                      <input  required name="name" type="nama" class="form-control" placeholder="Masukkan nama anda" value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?> ">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Email *</label>
                    </div>
                    <div class="col-sm-10">
                      <input required name="email" type="Email" class="form-control" placeholder="Masukkan email anda" value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?> ">
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