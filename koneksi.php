<?php
  $host = "localhost"; 
  $user = "id15502671_kevin";
  $pass = "a@R=h12bf-PA!bi%";
  $nama_db = "id15502671_daniel"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }
?>