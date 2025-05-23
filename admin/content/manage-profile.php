<?php 
include "config/koneksi.php";
if(isset($_POST['simpan'])){
  $profile_name = $_POST['profile_name'];
  $profesion = $_POST['profesion'];
  $description = $_POST['description'];
  // proses simpan foto
  $photo = $_FILES['photo'];
  // var_dump($photo)
  if($photo['error'] == 0) {
    $filesName = uniqid(). "_".basename($photo['name']);
    $filePath = "uploads/". $filesName;
    move_uploaded_file($photo['tmp_name'], $filePath);
    $insertQ = mysqli_query($config, "INSERT INTO profiles ( profile_name, profesion, description, photo) VALUES ('$profile_name', '$profesion', '$description', '$filesName')");

  }
  
  if($insertQ) {
    header("location:dashboard.php?level=" . base64_encode ($_SESSION['LEVEL']) . "&page=manage-profile");
  }
}

if(isset($_GET['del'])){
  $idDel = $_GET['del'];
  
  $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idDel");
  $rowPhoto = mysqli_fetch_assoc($selectPhoto);
  if (isset($rowPhoto['photo'])){
  unlink("uploads/" . $rowPhoto['photo']);
  }

  $delete = mysqli_query($config, "DELETE FROM profiles  WHERE id=$idDel");
  if($delete) {
    // header("location:dashboard.php?level=" . base64_encode ($_SESSION['LEVEL']) . "&page=manage-profile");
  }
}

$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2" style="width:55%">  
    <label for="" class="form-label">Profile Name</label>
    <input type="text"  value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name']?>" class="form-control" name="profile_name">

    <label for="" class="form-label">Profession</label>
    <input type="text" value="<?php echo !isset($row['profesion']) ? '' : $row['profesion']?>" class="form-control" name="profesion">

    <label for="" class="form-label">Descriptionn</label>
    <textarea type="text" value="" class="form-control" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? '' : $row['description']?> </textarea>

    <label for="" class="form-label">Photo</label>
    <input type="file" class="form-control" name="photo">
    <img src="<?php echo "uploads/". $row['photo']?>" width="300" alt=""><br>
    <?php if(empty($row['profile_name'])) { ?>
      
      <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
    <?php 
    }else{
      ?>
      <a onclick= "return confirm('YAKIN INGIN HAPUS??')" href="?level=<?php echo base64_encode($_SESSION['LEVEL']) ?>&page=manage-profile&del=<?php echo $row['id'] ?>" class= "btn btn-danger mt-2">delete</a>
    <?php } 
    
    ?>
   
  
  </div>
</form>