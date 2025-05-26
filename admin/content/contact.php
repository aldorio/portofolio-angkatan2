<?php 
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
  header("location:user.php?hapus=berhasil");
}
?>
<div class="table-responsive">
                  <table class="table table-bordered table-striped-collapse">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      foreach($row as $key => $data): ?>
                      <tr>
                        
                        <td><?= $key + 1 ?></td>
                        <td><?= $data['your_name']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['subject']?></td>
                        <td><?= $data['message']?></td>
                        <td>
                          <a href="tambah-user.php?edit=<?php echo $data['id'] ?>&level=<?php echo base64_encode($_SESSION['LEVEL']) ?>" class="btn btn-success btn-sm">Edit</a>
                          <a onclick="return confirm('Are u Sure?')" href="user.php?delete=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">Delete</a>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>