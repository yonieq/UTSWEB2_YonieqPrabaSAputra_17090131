<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);
$y = mysqli_fetch_array($data);

if($cek > 0){
    $_SESSION['id_pengguna'] = $y['username'];
    $_SESSION['nama']        = $y['nama_petugas'];
    $_SESSION['pass_user']   = $password;
    $_SESSION['hak_akses']  = $y['hak_akses'];
    header("location:index.php?pages=home");
}else{
    echo "<script>alert('Username/ Password yang anda masukkan salah, silahkan coba kembali !.'); window.location = 'login.php'</script>";
}
?>