<?php

    session_start();
    require 'config.php';

    $filter = ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])];
    $option = [];
    $query = new MongoDB\Driver\Query($filter, $option);
    $mhs = $manager->executeQuery("kampus.mahasiswa", $query);
    foreach ($mhs as $mhs) {};

 if(isset($_POST['submit'])){

 // Menangkap data yang dikirim dari form dan proses Update
    $mhsWrite = new MongoDB\Driver\BulkWrite();
      $mhsWrite->update(
       ['_id'=>new MongoDB\BSON\ObjectID($_GET['id'])],
       ['$set' => ['npm' => $_POST['npm'], 'name' => $_POST['name'], 'alamat' => $_POST['alamat'],
        'jk' => $_POST['jk'], 'telp' => $_POST['telp'], 'email' => $_POST['email'],
        ]]
          );

 // Proses update dan pengecekan hasil
    $result=$manager->executeBulkWrite("kampus.mahasiswa", $mhsWrite);

    if($result) {
    $_SESSION['success'] = "Data Berhasil Diedit";

    header("Location: index.php");
  }
 }
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
       <h1>Edit Data</h1>
       <a href="index.php" class="btn btn-primary">Back</a>

       <form method="post">
         <div class="form-group">
           <strong>NPM : </strong>
           <input type="text" name="npm" value="<?php echo $mhs->npm; ?>" required="" class="form-control">
         </div>

         <div class="form-group">
           <strong>Name : </strong>
           <input type="text" name="name" value="<?php echo $mhs->name; ?>" required="" class="form-control">
         </div>

         <div class="form">
           <strong>Alamat : </strong>
           <textarea class="form-control" name="alamat" placeholder="Detail"><?php echo $mhs->alamat; ?></textarea>
         </div>

         <div class="form-group">
           <strong>Jenis Kelamin : </strong>
           <input type="text" name="jk" value="<?php echo $mhs->jk; ?>" required="" class="form-control">
         </div>

         <div class="form-group">
           <strong>Telp : </strong>
           <input type="text" name="telp" value="<?php echo $mhs->telp; ?>" required="" class="form-control">
         </div>

         <div class="form-group">
           <strong>Email : </strong>
           <input type="text" name="email" value="<?php echo $mhs->email; ?>" required="" class="form-control">
         </div>

         <div class="form-group">
           <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
       </form>
     </div>
   </body>
 </html>
