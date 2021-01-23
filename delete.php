<?php

 session_start();
 require 'config.php';

 $delete = new MongoDB\Driver\BulkWrite();

 $delete->delete(['_id' => new MongoDB\BSON\ObjectId($_GET['id'])], ['limit'=>true]);
 $manager->executeBulkWrite("kampus.mahasiswa", $delete);

 $_SESSION['success'] = "Data Berhasil Dihapus";
 header("Location: index.php");
 ?>
