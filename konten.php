<?php
if ($_SESSION == NULL) {
    echo "<script>alert('Anda belum login, silahkan login untuk mengakses halaman administrator !.'); window.location = 'login.php'</script>";
} else {
    //NOTIFIKASI PESAN ERROR BERDASARKAN GET URL pesan
    include "fungsi/fungsi_pesan.php";
    //AKHIR NOTIFIKASI

    if ($_GET['pages'] == 'home') {
        include "pages/page_home/home_admin.php";
    } elseif ($_GET['pages'] == 'profil') {
        include "pages/page_profil/profil_admin.php";
    }

    //pages KARYAWAN
    elseif ($_GET['pages'] == 'petugas') {
        include "pages/page_petugas/petugas.php";
    } elseif ($_GET['pages'] == 'tambah_petugas') {
        include "pages/page_petugas/tambah_petugas.php";
    } elseif ($_GET['pages'] == 'ubah_petugas') {
        include "pages/page_petugas/ubah_petugas.php";
    } elseif ($_GET['pages'] == 'hapus_petugas') {
        include "pages/page_petugas/hapus_petugas.php";
    }

    //pages JABTAN
    elseif ($_GET['pages'] == 'merk') {
        include "pages/page_merk/merk.php";
    } elseif ($_GET['pages'] == 'tambah_merk') {
        include "pages/page_merk/tambah_merk.php";
    } elseif ($_GET['pages'] == 'ubah_merk') {
        include "pages/page_merk/ubah_merk.php";
    } elseif ($_GET['pages'] == 'hapus_merk') {
        include "pages/page_merk/hapus_merk.php";
    }

    //pages JABTAN
    elseif ($_GET['pages'] == 'jenis_motor') {
        include "pages/page_jenis_motor/jenis_motor.php";
    } elseif ($_GET['pages'] == 'tambah_jenis_motor') {
        include "pages/page_jenis_motor/tambah_jenis_motor.php";
    } elseif ($_GET['pages'] == 'ubah_jenis_motor') {
        include "pages/page_jenis_motor/ubah_jenis_motor.php";
    } elseif ($_GET['pages'] == 'hapus_jenis_motor') {
        include "pages/page_jenis_motor/hapus_jenis_motor.php";
    }

    //pages PEMBELIAN
    elseif ($_GET['pages'] == 'pembelian') {
        include "pages/page_pembelian/pembelian.php";
    } elseif ($_GET['pages'] == 'tambah_pembelian') {
        include "pages/page_pembelian/tambah_pembelian.php";
    } elseif ($_GET['pages'] == 'laporan_pembelian') {
        include "pages/page_pembelian/laporan_pembelian.php";
    } 

    //pages PENJUALAN
    elseif ($_GET['pages'] == 'penjualan') {
        include "pages/page_penjualan/penjualan.php";
    } elseif ($_GET['pages'] == 'tambah_penjualan') {
        include "pages/page_penjualan/tambah_penjualan.php";
    } elseif ($_GET['pages'] == 'laporan_penjualan') {
        include "pages/page_penjualan/laporan_penjualan.php";
    } 

    //pages STOK BARANG
    elseif ($_GET['pages'] == 'stok') {
        include "pages/page_stok/stok.php";
    } elseif ($_GET['pages'] == 'detail_stok') {
        include "pages/page_stok/detail_stok.php";
    } 


    //pages PASSWORD
    elseif ($_GET['pages'] == 'profil') {
        include "pages/page_profil/profil_admin.php";
    }

    //pages UBAH FOTO
    elseif ($_GET['pages'] == 'foto') {
        include "pages/page_profil/foto_admin.php";
    }
}
?>
