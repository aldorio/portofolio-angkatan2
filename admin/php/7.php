<!-- variable system : var yg dibuat oleh php
$_POST, $_GET, $_SESSION, $_SERVER, $_FILES, $_REQUEST 
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Variable System | Superglobal var</title>
</head>


<body>

<form action="" method="get">
  <div class="form-group">
    <label for="">Nama :</label>
    <input type="text" name="nama" placeholder="Masukkan Nama Anda">
  </div>
  <br>
 
   <div class="form-group">
    <label for="">Nilai :</label>
    <input type="number" name="nilai" placeholder="Masukkan Nilai Anda">
  </div>
    <br>
  <div class="form-group">
    <button type="submit">kirim</button>
  </div>
</form>
<br>
<?php 
   if(isset($_GET['nama'])){
    $nama = $_GET['nama'];
     $nilai = $_GET['nilai'];
     $grade = "";
     $status ="";
    echo "Halo " . $nama . " , ";


    if($nilai >= 70) {
  $status = "Lulus";
} else {
  $status = "tidak lulus" ;
}

    if($nilai > 90) {
  $grade = "A";
} elseif ($nilai >= 80) {
  $grade = "B";
}elseif ($nilai >= 80) {
  $grade = "C";
}elseif ($nilai >= 80) {
  $grade = "D";
}else  {
  $grade = "B";
}

echo "Nama Peserta : ". $nama. "<br> Nilai : ". $nilai. "<br> Grade : " .$grade . "<br> Status : " . $status;
   }
  //  shorthand / ternery
  // $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
  // echo "Selamat Siang " . $nama;


  ?>

</body>
</html>