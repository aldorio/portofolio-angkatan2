<?php 
include 'config/koneksi.php';
if($_SESSION['LEVEL'] !=1) {
  // echo "<h1>Anda Tidak berhak kesini</h1>";
  // echo "<a href='admin/dashboard.php' class='btn btn-warning>Kembali</a>";
  // die;
  header("location:dashboard.php?failed=access");
}


$query = mysqli_query($config, "SELECT levels.name_level , tbl_users. * FROM tbl_users LEFT JOIN levels ON levels.id = tbl_users.id_level 
ORDER BY tbl_users.id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($config, "DELETE FROM tbl_users WHERE id='$id'");
  header("location:user.php?hapus=berhasil");
}
?>

<div class="table-responsive">
                  <div align="right" class="mb-3">
                    <a href="?page=tambah-user" class="btn btn-primary">Add</a>
                  </div>
                  <table id="table" class="table table-bordered table-striped-collapse">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Level</th>
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
                        <td><?= $data['name_level']?></td>
                        <td><?= $data['name']?></td>
                        <td><?= $data['email']?></td>
                        <td>
                          <a href="?page=tambah-user&edit=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                          <a onclick="return confirm('Are u Sure?')" href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>