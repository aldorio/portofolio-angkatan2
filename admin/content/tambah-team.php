<?php 

if ($_SESSION['LEVEL'] != 1) {
    // echo "<h1>Anda tidak berhak kesini !!</h1>";
    // echo "<a href='dashboard.php' class='btn btn-warning'>Kembali</a>";
    // die;
    header("location:dashboard.php?failed=access");
}

if (isset($_POST['simpan'])) {
    $name = $_POST['name'];
    $position_name = $_POST['position_name'];
    $status  = $_POST['status'];
    $photo = $_FILES['photo']['name'];
    $size  = $_FILES['photo']['size'];

     $filesName = uniqid() . "_" . basename($photo);
    $filePath = "team/" . $filesName;

    // .png, jpg, jpeg
    $ekstensi = ['png', 'jpg', 'jpeg'];
    // apakah user mengupload gambar dengan ekstensi tersebut, jika iya masukkan gambar ke table dan folder, jika tidak
    // error, ekstensi tidak ditemukan
    // in_array = 
    $ext = pathinfo($photo, PATHINFO_EXTENSION);
    if (!in_array($ext, $ekstensi)) {
        $error[] = "Mohon maaf, ekstensi file tidak ditemukan";
    } else {
        $query = mysqli_query($config, "INSERT INTO teams (name, position_name, photo, status)
         VALUES ('$name','$position_name','$photo','$status')");
        if ($query) {
            header("location:?page=team&tambah=berhasil");
        }
    }
    print_r($error);
    die;
}

$header = isset($_GET['edit']) ? "Edit" : "Tambah";
$id_user = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($config, "SELECT * FROM teams WHERE id='$id_user'");
$rowEdit  = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $position_name = $_POST['position_name'];
    $status  = $_POST['status'];
    $photo = $_FILES['photo']['name'];
    $size  = $_FILES['photo']['size'];
    

    
    $queryUpdate = mysqli_query($config, "UPDATE teams SET name='$name', position_name='$position_name', status='$status' 
    ='$name' WHERE id='$id_user'");
    if ($queryUpdate) {
        header("location:?page=team&ubah=berhasil");
    }
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Nama * </label>
        </div>
        <div class="col-sm-10">
            <input required name="name" type="text"
                class="form-control"
                placeholder="Masukkan nama anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Jabatan * </label>
        </div>
        <div class="col-sm-10">
            <input required name="position_name" type="text"
                class="form-control"
                placeholder="Masukkan jabatan anda"
                value="<?= isset($_GET['edit']) ? $rowEdit['position_name'] : '' ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Foto </label>
        </div>
        <div class="col-sm-10">
            <input name="photo" type="file">
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2">
            <label for="">Status </label>
        </div>
        <div class="col-sm-10">
            <input type="radio" name="status" value="1" checked> Publish
            <input type="radio" name="status" value="0"> Draft
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-12">
            <button name="<?= isset($_GET['edit']) ? 'edit' : 'simpan'; ?>" type="submit"
                class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>