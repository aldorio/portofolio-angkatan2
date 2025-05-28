<?php 
include 'config/koneksi.php';
if($_SESSION['LEVEL'] !=1) {
  // echo "<h1>Anda Tidak berhak kesini</h1>";
  // echo "<a href='admin/dashboard.php' class='btn btn-warning>Kembali</a>";
  // die;
  // header("location:dashboard.php?failed=access");
}



if(isset($_POST['simpan'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $id_level = $_POST['id_level'];
  $password = sha1($_POST['password']);

  $query = mysqli_query($config, "INSERT INTO tbl_users (name, email, password, id_level) VALUES ('$name','$email','$password', '$id_level')");
  if ($query) {
    header("location:?page=user&tambah=berhasil");
  }
  
}

$header = isset($_GET['edit'])? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM tbl_users WHERE id='$id_user'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if(isset($_POST['edit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $id_level = $_POST['id_level'];
  $password = sha1($_POST['password']);

  if ($password == '') {
    $queryUpdate = mysqli_query($config, "UPDATE tbl_users SET  id_level='$id_level', name='$name', email='$email', WHERE id='$id_user'");
  }

  $queryUpdate = mysqli_query($config, "UPDATE tbl_users SET id_level='$id_level', name='$name', email='$email', password='$password' WHERE id='$id_user'");
  if ($queryUpdate) {
    header("location:?page=user&ubah=berhasil");
  }
}

$queryLevels = mysqli_query($config, "SELECT * FROM levels ORDER BY id DESC");
$rowLevels = mysqli_fetch_all($queryLevels, MYSQLI_ASSOC);

?>


<form action="" method="post">
  <div class="mb-3 row">
                    <div class="col-sm-2">
                      <label for="">Nama Level*</label>
                    </div>
                    <div class="col-sm-10">
                      <select name="id_level" id="" class="form-control">
                        <option value="">Pilih Level</option>
                        <!-- data option ini berasal dari table bernama levels -->
                         <?php foreach ($rowLevels as $level):
                         ?> 
                        <option <?php isset($_GET['edit']) ? ($level['id'] == $rowEdit['id_level']) ? 'selected' : '':'' ?>
                        value="<?php echo $level['id'] ?>"><?php echo $level['name_level']?></option>
                        <?php endforeach ?>
                        <!-- endoption -->
                      </select>
                      
                    </div>
                  </div>
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