<!-- function
 1. function yang kita buat
 2. function bawaan strlen(), in_array() 
 -->

 <?php 
 
  function callName()
  {
    echo "Nama Saya Aldo <br>";
  }

  function callNameLagi()
  {
    return "Nama Saya Rio <br>";
  }

 

  function perkalian($angka1, $angka2)
  {
    // $angka1 = 20;
    // $angka2 = 20;
    $total = $angka1 * $angka2;
    return $total;
  }

  callname();
  echo "<br>";
  echo callNameLagi();
  echo "<br>";
  echo perkalian(30, 20);
  echo "<br>";
  echo perkalian(50, 20);