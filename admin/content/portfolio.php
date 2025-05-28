<?php 
include "config/koneksi.php";


if (isset($_POST['simpan'])) {
  $id_category = $_POST['id_category'];
  $name_photo = $_POST['name_photo'];
  $photo = $_FILES['photo']['name'];
  $tmp_name = $_FILES['photo']['tmp_name'];

  $filesName = uniqid(). "_".basename($photo);
  $filePath = "portfolios/". $filesName;

  // Jika ada file gambar, upload
  if (!empty($photo)) {
    move_uploaded_file($tmp_name, $filePath);
  } else {
    $filesName = ''; // jika tidak upload gambar
  }

  // Insert data baru setiap kali simpan
  $insertQ = mysqli_query($config, "INSERT INTO portofolios (id_category, name_photo, photo) 
      VALUES ('$id_category', '$name_photo', '$filesName')");

  if ($insertQ) {
    header("location:?page=portfolio&tambah=berhasil");
    exit;
  }
}
?>



<form action="" method="post" enctype="multipart/form-data">
  <div class="m-2" style="width:55%">  
    <div class="mb-3">
    <label for="" class="form-label">Id</label>
    <input type="text"  value="<?php echo !isset($row['id_category']) ? '' : $row['id_category']?>" class="form-control" name="id_category">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Name Photo</label>
    <input type="text"  value="<?php echo !isset($row['name_photo']) ? '' : $row['name_photo']?>" class="form-control" name="name_photo">
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Photo</label>
    <input type="file" class="form-control" name="photo">
    </div>
    <img src="<?php echo "portfolios/". $row['photo']?>" width="300" alt=""><br>

    <button type="submit" name="simpan" class="btn btn-primary mt-2" >Simpan Perubahan</button>
    
   
  
  </div>
</form>