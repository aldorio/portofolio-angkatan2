<?php
include 'admin/config/koneksi.php';
$queryprofile = mysqli_query($config, "SELECT * FROM profiles ORDER BY id DESC");
$rowprofile = mysqli_fetch_assoc($queryprofile);

if(isset($_POST['simpan'])){
  $your_name = $_POST['your_name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $query = mysqli_query($config, "INSERT INTO contacts (your_name, email, subject, message) 
  VALUES ('$your_name','$email','$subject','$message')");
  if ($queryUpdate) {
    header("location:index.php?ubah=berhasil");
  }
}
?>
