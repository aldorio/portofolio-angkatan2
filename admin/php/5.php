<!-- if: percabangan dan logika, untuk menjalankan
 kode berdasarkan kondisi yang dicari -->

 <?php

// operator pembanding
// = memberikan nilai
// == membandingkan
// === membandingkan tapi dengan tipe datanya
// !: tidak
// empty: kosong
// isset :tidak kosong
$nama = "bambang" ;
if($nama != "bambang"){
  echo "iya";
}else{
  echo "Bukan";
}
echo "<br>";
echo "<br>";

if(empty($nama)) {
  echo "Yaaaa";
} else {
  echo "Tidak";
}
echo "<br>";
echo "<br>";

$suhu =35;
if($suhu > 37) {
  echo "demam";
}elseif ($suhu >= 35){
  echo "normal";
}
else{
  echo "Dingin";
}
echo "<br>";
echo "<br>";

?>

<!--  -->

<!-- 
Nama Peserta : Nama kalian
Nilai : 85
grade : B
Status : Lulus

peserta dinyatakan lulus jika nilainya lebih dari 70 dan tidak lulus jika nilai kurang dari 70.
nilai juga dikategorikan ke dalam grade dengan huruf apa
A: 90-100
b: 80-89
C: 70-79
D: 60-69
E: dibawah 60 -->

<?php 

$nama="Aldo Rio Prayoga";
$nilai=60;
$grade="";
$status="";

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

echo "<br>";
echo "<br>";
echo "<br>";

// operator logika
// AND, &&, OR, ||, !

$username ="admin";
$password ="admin";

if($username == "admin" AND $password="admin"){
  echo "Login Berhasil";
} else {
  echo "Login Gagal";
}






