<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['pages'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../koneksi.php";
    include "../../fungsi/fungsi_tanggal.php";
    include "../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'jenis_motor' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $jenis_motor = trimed($_POST['jenis_motor']);

        $cek = mysqli_query($koneksi, "SELECT jenis_motor FROM jenis_motor WHERE jenis_motor = '$jenis_motor'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Merk yang anda masukkan sudah ada. Periksa kembali data Merk yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi, "INSERT INTO jenis_motor(id_merk,
                                    jenis_motor)
                            VALUES(
                                    '$_POST[id_merk]',
                                    '$_POST[jenis_motor]')") or die(mysqli_error($koneksi));
                if ($query) {
                    header('location:../../index.php?pages=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?pages=' . $module . '&pesan=error');
                }
            }
        }
    //MODUL UBAH MERK
    elseif ($module == 'jenis_motor' AND $act == 'ubah') {
	$jenis_motor = trimed($_POST['jenis_motor']);
        mysqli_query($koneksi, "UPDATE jenis_motor SET id_merk     = '$_POST[id_merk]',
                                    jenis_motor     = '$jenis_motor'
                                WHERE id_jenis_motor      = '$_POST[id_jenis_motor]'")or die(mysqli_error($koneksi));
        header('location:../../index.php?pages=' . $module . '&pesan=ubah');
    } elseif ($module == 'jenis_motor' AND $act == 'hapus') {
            //HAPUS DATA MERK
            $query = mysqli_query($koneksi, "DELETE FROM jenis_motor WHERE id_jenis_motor='$_GET[id]'");
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
