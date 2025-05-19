<?php
// tas

//$nama= array();
//$nama = [];

//array index (data bisa lebih dari 1)
$nama = array('Aldo','Rio','Prayoga');
print_r($nama);
echo "<br>";
echo "<br>";


echo $nama[0];
echo "<br>";
echo $nama[1];
echo "<br>";
echo $nama[2];
echo "<br>";

$buah = ["Nanas", "Semangka", "Mangga", "Pepaya", "Pir"];
print_r( $buah);
echo "<br>";
foreach($buah as $b){
  echo "Nama buah " . $b . "<br>";
}

// array asosiatif : key menggunakan string
$kelas_web = [
"nama" => " Aldo ",
"umur" => 25 ,
"jurusan" => "Junior web prog "
];

echo "Nama siswa " . $kelas_web[ "nama" ] . " Umur " . $kelas_web[ 'umur' ] . " Jurusan " . $kelas_web[ 'jurusan' ];
echo "<br>";
echo "<br>";

$siswa = [
  [
    "nama" => "Aldo",
    "umur" => 25,
    "jurusan" => "Junior Web Prog",
  ],
  [ "nama" => "Rio",
  "umur" => 25,
  "jurusan" => "Mobile Prog",
  ],
];

print_r($siswa);
echo "<br>";
echo $siswa[0]['nama'];
echo "<br>";
foreach ($siswa as $key => $sw) {
  echo "key : " . $key . "<br><br>";
  echo "Nama : " . $sw['nama'] . "<br>";
  echo "Umur : " . $sw['umur'] . "<br>";
  echo "Jurusan : " . $sw['jurusan'] . "<br>";
  echo "<br>";
}
// $siswa = array(
//   array(),
//   array(),
// )

?>