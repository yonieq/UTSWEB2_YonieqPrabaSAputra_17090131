<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['pages'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../koneksi.php";
    include "../../fungsi/fungsi_tanggal.php";
    include "../../fungsi/fungsi_validasi.php";
    include "../../fungsi/format_number.php";

    //MODUL TAMBAH GURU
    if ($module == 'pembelian' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $id_jenis_motor = $_POST['id_jenis_motor'];
        $jenis_motor = $_POST['jenis_motor'];
        $nopol = $_POST['nopol'];
        $tgl_pembelian = format_indotosql($_POST['tgl_pembelian']);
        $harga_pembelian = trim_number($_POST['harga_pembelian']);
        $penjual = $_POST['penjual'];
        $alamat = $_POST['alamat'];
        $keterangan = $_POST['keterangan'];

        $cek = mysqli_query($koneksi, "SELECT * FROM pembelian WHERE nopol = '$nopol'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Pembelian yang anda masukkan sudah ada. Periksa kembali data pembelian yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO pembelian(
                                    id_jenis_motor,
                                    nopol,
                                    tgl_pembelian,
                                    harga_pembelian,
                                    penjual,
                                    alamat,
                                    keterangan,
                                    status)
                            VALUES(
                                    '$id_jenis_motor',
                                    '$nopol',
                                    '$tgl_pembelian',
                                    '$harga_pembelian',
                                    '$penjual',
                                    '$alamat',
									'$keterangan',
									'0')") or die(mysqli_error($koneksi));
            if ($query) {
                header('location:../../index.php?pages=' . $module . '&pesan=tambah');
            } else {
                header('location:../../index.php?pages=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'pembelian' AND $act == 'hapus') {
            $query = mysqli_query($koneksi, "DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");
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
