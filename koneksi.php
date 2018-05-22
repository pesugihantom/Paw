<?php
error_reporting(E_ALL ^ E_DEPRECATED); 
$host = "localhost";
$user = "root";
$pass = "";
$db = "toko_ol";

$kon = mysqli_connect ($host,$user,$pass);
if (!$kon)
	die("GOBLOK");
$hasil  = mysqli_select_db($kon,$db);
if (!$hasil){
	$hasil = mysqli_query($kon, "create database $db");
	if (!$hasil)
		die ("Goblok");
else 
		$hasil = mysqli_select_db($kon, $db);
	if (!$hasil) die ("Gagal Koneksi");
}

$sqltabelbarang = "create table if not exists barang (
idbarang int auto_increment not null primary key,
nama varchar(40) not null,
harga int not null default 0,
stok int not null default 0,
foto varchar(70) not null default'',
KEY(nama))";

mysqli_query($kon, $sqltabelbarang) or die ("Gagal buat tabel barang");

$sqlTabelHjual = "create table if not exists hjual(
idhjual int auto_increment not null primary key,
tanggal date not null,
namacust varchar(40)not null,
email varchar(50) not null default '',
notelp varchar(20) not null default ''
)";
mysqli_query($kon, $sqlTabelHjual) or die ("Gagal buat tabel h jual");

$sqlTabelDjual = "create table if not exists djual (
iddjual int auto_increment not null primary key,
idhjual int not null,
idbarang int not null,
harga int not null
)";

mysqli_query($kon, $sqlTabelDjual) or die ("Gagal buat tabel djual");

?>