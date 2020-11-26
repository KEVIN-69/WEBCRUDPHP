<?php
  include('koneksi.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk PHP</title>
    <style type="text/css">
      * {
        font-family: "Didot";
      }
      h1 {
        text-transform: uppercase;
        color: #1f3c88;
      }
    table {
      border: solid 1px #16697a;
      border-collapse: collapse;
      border-spacing: 0;
      width: 80%;
      margin: 15px auto 15px auto;
    }
    table thead th {
        background-color: #16697a;
        border: solid 1px black;
        color: #e8ffff;
        padding: 15px;
        text-align: left;
        
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #16697a;
        color: #333;
        padding: 10px;
       
    }
    a {
          background-color: #3d7ea6;
          color: #e8ffff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Produk Toko Elektronik</h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Dekripsi</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
          <td>Rp <?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
          
          <td style="text-align: center;"><img src="public_html<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>