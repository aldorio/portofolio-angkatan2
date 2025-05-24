<?php 
$query = mysqli_query($config, "SELECT * FROM tbl_about ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($config, "DELETE FROM tbl_about WHERE id='$id'");
  header("location:?page=about&hapus=berhasil");
}
?>




<div class="table-responsive">
                  <div align="right" class="mb-3">
                    <a href="?page=tambah-profile" class="btn btn-primary">Add</a>
                  </div>
                  <table class="table table-bordered table-striped-collapse">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Description</th>
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
                        <td><?= $data['description']?></td>
                        <td>
                          <a href="tambah-profile.php?edit= " class="btn btn-success btn-sm">Edit</a>
                          <a onclick="return confirm('Are u Sure?')" href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>