<?php
session_start();

include "../../fungsi/koneksi.php";

$idmerk= $_GET['idmerk'];
$hasil = mysqli_query($koneksi, "SELECT * FROM jenis_motor WHERE id_merk = '$idmerk'");
  
echo "<option>--pilih Jenis Motor--</option>";
 
while($w = mysqli_fetch_array($hasil)){
   	echo "<option value=$w[id_jenis_motor]> $w[jenis_motor]</option>";
}
?>
