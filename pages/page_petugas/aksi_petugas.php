<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses pages, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $page = $_GET['pages'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../koneksi.php";
    include "../../fungsi/fungsi_tanggal.php";
    include "../../fungsi/fungsi_validasi.php";

    //pages TAMBAH GURU
    if ($page == 'petugas' AND $act == 'tambah') {
        $password = md5($_POST['password_confirm']);

        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = $_FILES['foto']['type'];
        $nama_file = $_FILES['foto']['name'];
        $allowed_filetypes = array('.png', '.gif', '.jpg', '.bmp');
        $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $username = trimed($_POST['username']);

        $cek = mysqli_query($koneksi, "SELECT username FROM petugas WHERE username = '$username'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Username yang anda masukkan sudah ada. Periksa kembali data Username yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
            //JIKA FOTO KOSONG
            if (empty($nama_file)) {
                $query = mysqli_query($koneksi, "INSERT INTO petugas(
                                    nama_petugas,
                                    username,
                                    password,
                                    hak_akses,
                                    foto)
                            VALUES(
                                    '$_POST[nama_petugas]',
                                    '$_POST[username]',
                                    '$password',
                                    '$_POST[hak_akses]',
                                    'file/foto_petugas/default_user.png')") or die(mysqli_error($koneksi));
                if ($query) {
                    header('location:../../index.php?pages=' . $page . '&pesan=tambah');
                } else {
                    header('location:../../index.php?pages=' . $page . '&pesan=error');
                }
            }
            //JIKA FOTO ADA TAPI FORMAT SALAH
            else if (!in_array($ext, $allowed_filetypes)) {
                header('location:../../index.php?pages=tambah_petugas&pesan=foto_error');
            }
            //JIKA FOTO ADA N FORMAT TIDAK SALAH
            else {
                $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
                $direktori = "../../file/foto_petugas/$nama_file";
                $file_2 = "../../file/foto_petugas/$_POST[id_petugas]$ext";

                move_uploaded_file($lokasi_file, $direktori);
                $file_1 = "../../file/foto_petugas/$nama_file";
                rename($file_1, $file_2);
                $file = "file/foto_petugas/$_POST[id_petugas]$ext";

                $query = mysqli_query($koneksi, "INSERT INTO petugas(
                                    nama_petugas,
                                    username,
                                    password,
                                    hak_akses,
                                    foto)
                            VALUES(
                                    '$_POST[nama_petugas]',
                                    '$_POST[username]',
                                    '$password',
                                    '$_POST[hak_akses]',
                                    '$file')") or die(mysqli_error($koneksi));
                if ($query) {
                    header('location:../../index.php?pages=' . $page . '&pesan=tambah');
                } else {
                    header('location:../../index.php?pages=' . $page . '&pesan=error');
                }
            }
        }
    }
    //pages UBAH GURU
    elseif ($page == 'petugas' AND $act == 'ubah') {
		$password = md5($_POST[password_confirm_ubah]);
        mysqli_query($koneksi, "UPDATE petugas SET nama_petugas        = '$_POST[nama_petugas]',
                                     username          		= '$_POST[username]',
                                     password 				= '$password',
                                     hak_akses    			= '$_POST[hak_akses]'
                                WHERE id_petugas      		= '$_POST[id_petugas]'")or die(mysqli_error($koneksi));
        header('location:../../index.php?pages=' . $page . '&pesan=ubah');
    } elseif ($page == 'petugas' AND $act == 'hapus') {
        $data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto_petugas FROM petugas WHERE id_petugas='$_GET[id]'"));
        if ($data['foto_petugas'] != 'file/default_user.png') {
            $_SESSION['foto'] = substr($data['foto_petugas'], 15);

            //HAPUS DATA GURU
            $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$_GET[id]'");
            if ($query) {
                unlink("../../file/foto_petugas/$_SESSION[foto]");
                //HAPUS DATA PENGGUNA
                mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_petugas='$_GET[id]'");

                header('location:../../index.php?pages=' . $page . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?pages=$page';
                </script>";
            }
        } else {
            //HAPUS DATA GURU
            $query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?pages=' . $page . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?pages=$page';
                </script>";
            }
        }
    }
}
?>
