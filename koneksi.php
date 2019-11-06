<?php
$koneksi = mysqli_connect("localhost","root","","penjualan_motor");

//cek koneksi ke database
if (mysqli_connect_error()){
    echo "Koneksi Gagal ke database! : " . mysqli_connect_error();
}