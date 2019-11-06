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
    include "../../fungsi/format_number.php";

    //MODUL TAMBAH GURU
    if ($module == 'penjualan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $id_pembelian = $_POST['id_pembelian'];
		$tgl_penjualan = format_indotosql($_POST['tgl_penjualan']);
		$harga_penjualan= trim_number($_POST['harga_penjualan']);
		$keterangan = $_POST['keterangan'];
		$pembeli = $_POST['pembeli'];

        $cek = mysqli_query($koneksi, "SELECT * FROM penjualan 
									WHERE id_pembelian = '$id_pembelian'");
        if (mysqli_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Penjualan yang anda masukkan sudah ada. Periksa kembali data penjualan yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
                $query = mysqli_query($koneksi, "INSERT INTO penjualan(
                                    id_pembelian,
                                    tgl_penjualan,
                                    harga_penjualan,
                                    pembeli,
                                    keterangan)
                            VALUES(
                                    '$id_pembelian',
                                    '$tgl_penjualan',
                                    '$harga_penjualan',
                                    '$pembeli',
									'$keterangan')") or die(mysqli_error($koneksi));
									
				mysqli_query($koneksi, "UPDATE pembelian SET status = 1 WHERE id_pembelian = $id_pembelian");
				
                if ($query) {
                    header('location:../../index.php?pages=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?pages=' . $module . '&pesan=error');
                }
            }
        }elseif ($module == 'penjualan' AND $act == 'hapus') {
            $query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan='$_GET[id]'");
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
