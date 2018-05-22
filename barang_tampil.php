<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
 <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
 
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  

<?php
$nama_barang = "";
if(isset($_POST["nama_barang"]))
$nama_barang = $_POST["nama_barang"];
include "koneksi.php";
$sql = "select * from barang where nama like '%".$nama_barang."%' order by idbarang desc";
$hasil = mysqli_query($kon, $sql);
if (!$hasil)
die ("Ika Indah Winarni joget telanjang".mysqli_error($kon));
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <a class="navbar-brand" href="#">Pesugihan Tom And Jerry</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">
     
      <li class="nav-item">
        <a class="nav-link" href="barang_isi.php"><span class="glyphicon glyphicon-plus-sign" >&nbsp;Input Barang</span></a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
	<form action="barang_tampil.php" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Cari dong</button>
    </form>
  </div>
</nav>

<table class="table table-hover">
<tr>
<th>&nbsp;&nbsp;Foto</span></th>
<th>&nbsp;&nbsp;Nama </th>
<th>&nbsp;&nbsp;Harga </th>

<th>&nbsp;&nbsp;Operasi</th>



<?php
$no = 0;
while ($row = mysqli_fetch_assoc($hasil)){
	echo " <tr>";
	echo " <td> <a href='pict/{$row['foto']}'/>
       <img src='thumb/t_{$row['foto']}' width='100'/>
	   </a></td>";
    echo "<td>".$row['nama']."</td>";
	echo "<td>".$row['harga']."</td>";
	//echo "<td>".$row['stok']."</td>";
	echo "<td>";
	echo "<a href='barang_edit.php?idbarang=".$row['idbarang']."'><span class='glyphicon glyphicon-edit' >&nbsp;Edit</a>";
	echo "&nbsp;&nbsp;";
	echo "<a href='barang_hapus.php?idbarang=".$row['idbarang']."'><span class='glyphicon glyphicon-trash' >&nbsp;Hapus</a>";
	echo " </tr>";
}
?>
</table>
<script>
      (function() {
        'use strict';

        if (!('serviceWorker' in navigator)) {
          console.log('Service worker not supported');
          return;
        }
        navigator.serviceWorker.register('service-worker.js', {
          scope: 'PAW/'
        })
        .then(function(registration) {
          console.log('Registered at scope:', registration.scope);
        })
        .catch(function(error) {
          console.log('Registration failed:', error);
        });

      })();
    </script>

