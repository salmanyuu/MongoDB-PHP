<?php
  session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Data Mahasiswa SI-C</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>

     <div class="container">
       <h1>List Mahasiswa</h1>

       <a href="create.php" class="btn btn-success">Add Data</a>

       <?php
          if (isset($_SESSION['success'])) {
            echo "<div class = 'alert alert-success'>".$_SESSION['success']."</div>";
          }
        ?>

        <table class="table table-borderd">
          <tr>
            <th>No</th>
            <th>_id</th>
            <th>NPM</th>
            <th>Name</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telp</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>

          <?php
            require 'config.php';
            $no = 0;
            $query = new MongoDB\Driver\Query([]);
            $mhs = $manager->executeQuery("kampus.mahasiswa" , $query );

            foreach ($mhs as $mhs) {
              $no++;
              echo "<tr>";
              echo "<td>".$no."</td>";
              echo "<td>".$mhs->_id."</td>";
              echo "<td>".$mhs->npm."</td>";
              echo "<td>".$mhs->name."</td>";
              echo "<td>".$mhs->alamat."</td>";
              echo "<td>".$mhs->jk."</td>";
              echo "<td>".$mhs->telp."</td>";
              echo "<td>".$mhs->email."</td>";
              echo "<td>";
              echo "<a href='edit.php?id=".$mhs->_id."' class='btn btn-primary'>Edit</a> &nbsp; &nbsp; ";
              echo "<a href='delete.php?id=".$mhs->_id."' class='btn btn-danger'>Delete</a>";
              echo "</td>";
              echo "</tr>";

            };
           ?>
        </table>
     </div>
   </body>
 </html>
