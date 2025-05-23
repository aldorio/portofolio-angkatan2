<?php 
include 'config/koneksi.php';

// munculkan semua data dari table user urutkan dari yang terbesar
// ke terkecil

$query = mysqli_query($config, "SELECT * FROM tbl_users ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($config, "DELETE FROM tbl_users WHERE id='$id'");
  header("location:user.php?hapus=berhasil");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="wrapper">
    <?php include 'inc/header.php'; ?>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                Data User
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <div align="right" class="mb-3">
                    <a href="tambah-user.php?level=<?php echo base64_encode($_SESSION['LEVEL']) ?> " class="btn btn-primary">Add</a>
                  </div>
                  <table class="table table-bordered table-striped-collapse">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach($row as $key => $data): ?>
                      <tr>
                        
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                          <a href="tambah-user.php?edit=<?php echo $data['id'] ?>&level=<?php echo base64_encode($_SESSION['LEVEL']) ?>" class="btn btn-success btn-sm">Edit</a>
                          <a onclick="return confirm('Are u Sure?')" href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>