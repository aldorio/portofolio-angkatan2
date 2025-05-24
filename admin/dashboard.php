<?php 
session_start();
ob_start();

$_name = isset($_SESSION['NAME']) ? $_SESSION['NAME'] : '';
// if(isset($_SESSION['NAME])){$_name = $_SESSION['name]};
if(!$_name){
  header("location:index.php?access=failed");
}

include "config/koneksi.php";

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
                <?php echo isset($_GET['page'])?str_replace("-", " ",subject: ucwords( $_GET['page'])) : 'Home'?>
              </div>
              <div class="card-body">
                <?php 
                  if (isset($_GET['page'])){

                    if (file_exists("content/" . $_GET['page'] . ".php")) {
                      include ("content/" . $_GET['page'] . ".php");
                   } else { include "content/notfound.php";
                }

                
              } else {
                include "content/home.php";
              }
              
                  ?>
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