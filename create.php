<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Data Mahasiswa SI-C</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   </head>
   <body>
     <div class="container">
       <h1>Add Data</h1>
       <a href="index.php" class="btn btn-primary">Back</a>


       <form method="post">
         <div class="form-group">
           <strong>NPM : </strong>
           <input type="text" name="npm" required="" class="form-control" placeholder="NPM">
         </div>

         <div class="form-group">
           <strong>Name : </strong>
           <input type="text" name="name" required="" class="form-control" placeholder="Name">
         </div>

         <div class="form-group">
           <strong>Alamat : </strong>
           <textarea name="alamat" required="" class="form-control" placeholder="Alamat">
           </textarea>
         </div>

         <div class="form-group">
           <strong>Jenis Kelamin : </strong>
           <input type="text" name="jk" required="" class="form-control" placeholder="Gender">
         </div>

         <div class="form-group">
           <strong>Telp : </strong>
           <input type="text" name="telp" required="" class="form-control" placeholder="No.Telp">
         </div>

         <div class="form-group">
           <strong>Email : </strong>
           <input type="text" name="email" required="" class="form-control" placeholder="email">
         </div>

         <div class="form-group">
           <button type="submit" name="submit" class="btn btn-success">Submit</button>

         </div>
       </form>
     </div>
   </body>
 </html>



 <?php
     session_start();

     if (isset($_POST['submit'])) {
       require 'config.php';

       $mhsWrite = new MongoDB\Driver\BulkWrite;
       $mhsWrite -> insert(['npm' => $_POST['npm'], 'name' => $_POST['name'], 'alamat' => $_POST['alamat'],
        'jk' => $_POST['jk'], 'telp' => $_POST['telp'], 'email' => $_POST['email'] ]);

       $manager->executeBulkWrite("kampus.mahasiswa", $mhsWrite);

       $_SESSION['success'] = "Data Berhasil Ditambahkan";
       header ("Location: index.php");
     }

  ?>
