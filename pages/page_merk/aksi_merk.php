<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses hamalan ini, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['pages'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../koneksi.php";
    include "../../fungsi/fungsi_tanggal.php";
    include "../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'merk' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $nama_merk = trimed($_POST['nama_merk']);

        $cek = mysqli_query($koneksi, "SELECT nama_merk FROM merk WHERE nama_merk = '$nama_merk'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Merk yang anda masukkan sudah ada. Periksa kembali data Merk yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi, "INSERT INTO merk(
                                    nama_merk)
                            VALUES(
                                    '$_POST[nama_merk]')") or die(mysqli_error($koneksi));
                if ($query) {
                    header('location:../../index.php?pages=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?pages=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'merk' AND $act == 'ubah') {
		$nama_merk = trimed($_POST['nama_merk']);
        mysqli_query($koneksi, "UPDATE merk SET nama_merk     = '$nama_merk'
                                WHERE id_merk      = '$_POST[id_merk]'");
        header('location:../../index.php?pages=' . $module . '&pesan=ubah');
    } elseif ($module == 'merk' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi, "DELETE FROM merk WHERE id_merk='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?pages=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?pages=$module';
                </script>";
            }
    }
}
?>
