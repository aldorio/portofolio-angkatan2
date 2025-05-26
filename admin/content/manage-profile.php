<?php 
include "config/koneksi.php";


if(isset($_POST['simpan'])){
  $profile_name = $_POST['profile_name'];
  $description = $_POST['description'];
  // proses simpan foto
  $photo = $_FILES['photo']['name'];
  $tmp_name = $_FILES['photo']['tmp_name'];

  $filesName = uniqid(). "_".basename($photo);
  $filePath = "uploads/". $filesName;


  // mencari apakah di dalam table profiles ada datanya, jika ada maka update, jika tidak ada maka insert.
  // mysqli_num_row()
  $queryProfile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
  if(mysqli_num_rows($queryProfile) > 0){
    $rowProfile = mysqli_fetch_assoc($queryProfile);
    $id = $rowProfile['id'];

    // jika user upload gambar
    if(!empty($photo)){
      

      unlink("uploads/" . $rowProfile['photo']);
      move_uploaded_file($tmp_name, $filePath);

      $update = mysqli_query($config, "UPDATE profiles SET profile_name='$profile_name', description='$description', photo='$filesName' WHERE id ='$id' ");
    header("location:?page=manage-profile&tambah=berhasil");
    } else {

    // perintah up  
    $update = mysqli_query($config, "UPDATE profiles SET profile_name='$profile_name', description='$description', photo='$filesName' WHERE id ='$id' ");
    header("location:?page=manage-profile&tambah=berhasil");
    }
  }else{
    // perintah insert
    if(!empty($photo)){

      move_uploaded_file($tmp_name, $filePath);
      // jika user upload gambar

      $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name, description, photo) 
      VALUES ('$profile_name', '$description', '$filesName')");
      header("location:?page=manage-profile&tambah=berhasil");
      

    }else {
      // jika user tidak upload gambar
      $insertQ = mysqli_query($config, "INSERT INTO profiles (profile_name, description) VALUES ('$profile_name', '$description')");
      header("location:?page=manage-profile&tambah=berhasil");
      
      
    }
  }
}
//   if($photo['error'] == 0) {
//     $filesName = uniqid(). "_".basename($photo['name']);
//     $filePath = "uploads/". $filesName;
//     move_uploaded_file($photo['tmp_name'], $filePath);
//     $insertQ = mysqli_query($config, "INSERT INTO profiles ( profile_name, profesion, description, photo) VALUES ('$profile_name', '$profesion', '$description', '$filesName')");

//   }
  
//   if($insertQ) {
//     header("location:dashboard.php?level=" . base64_encode ($_SESSION['LEVEL']) . "&page=manage-profile");
//   }
// }

if(isset($_GET['del'])){
  $idDel = $_GET['del'];
  
  $selectPhoto = mysqli_query($config, "SELECT photo FROM profiles WHERE id= $idDel");
  $rowPhoto = mysqli_fetch_assoc($selectPhoto);
  if (isset($rowPhoto['photo'])){
  unlink("uploads/" . $rowPhoto['photo']);
  }

  $delete = mysqli_query($config, "DELETE FROM profiles  WHERE id=$idDel");
  if($delete) {
    header("location:dashboard.php?level=" . base64_encode ($_SESSION['LEVEL']) . "&page=manage-profile");
  }
}

$selectProfile = mysqli_query($config, "SELECT * FROM profiles");
$row = mysqli_fetch_assoc($selectProfile);
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2" style="width:55%">  
    <div class="mb-3">
    <label for="" class="form-label">Judul</label>
    <input type="text"  value="<?php echo !isset($row['profile_name']) ? '' : $row['profile_name']?>" class="form-control" name="profile_name">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Descriptionn</label>
    <textarea id="summernote" type="text" value="" class="form-control" name="description" cols="30" rows="5"><?php echo !isset($row['description']) ? '' : $row['description']?> </textarea>
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Photo</label>
    <input type="file" class="form-control" name="photo">
    </div>
    <img src="<?php echo "uploads/". $row['photo']?>" width="300" alt=""><br>

    <div>
      <input type="radio" name="status" value="1" checked> Publish
      <input type="radio" name="status" value="0" > Private
    </div>
    <button type="submit" name="simpan" class="btn btn-primary mt-2" >Simpan Perubahan</button>
    
   
  
  </div>
</form>