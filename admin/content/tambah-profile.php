<?php 
if(isset($_POST['simpan'])){
  $name = $_POST['name'];
  $description= $_POST['description'];
  $photo = $_FILES['photo']['name'];
  $size = $_FILES['photo']['size'];

  $ekstensi = ['png','jpg','jpeg'];

  $ext = pathinfo($photo, PATHINFO_EXTENSION);

  if(!in_array($ext, $ekstensi)){
    $error[] = "Mohon Maaf, Ekstensi file tidak ditemukan";
  } else {

  $query = mysqli_query($config, "INSERT INTO tbl_about (name, description, photo) 
  VALUES ('$name','$about','$photo')");
  if ($query) {
    header("location:page=profile&tambah=berhasil");
    }
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
$_FILES
?>


<form action="" method="post" enctype="multipart/form-data">
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
                      <label for="">Description *</label>
                    </div>
                    <div class="col-sm-10">
                      <input required name="description" type="text" class="form-control" placeholder="Masukkan description anda" value="<?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?> ">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Photo *</label>
                    </div>
                    <div class="col-sm-10">
                      <input required name="photo" type="files">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-12">
                      <button name="<?= isset($_GET['edit']) ?'edit' : 'simpan'; ?>" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>