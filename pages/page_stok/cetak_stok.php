<?php
session_start();


include "../../fungsi/fungsi_tanggal.php";
include "../../koneksi.php";
include "../../fungsi/pdf/fpdf.php";

$query = mysqli_query($koneksi, "SELECT * FROM merk")or die(mysqli_error($koneksi));
$num = mysqli_num_rows($query);

if ($num == 0) {
    echo "<script language='javascript'>
                alert('Data penjualan tidak ditemukan atau masih kosong');
                window.location='../../index.php?page=laporan_pembelian';
                </script>";
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN STOK MOTOR', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 10);
$pdf->Ln();

$w = array(6, 50, 50, 50, 50, 30, 30, 30); //163
//=========0, 1,  2,  3,  4,  5,  6, 7=====//

$list = array('NO', 'TGL PEMBELIAN', 'NO.POL.', 'MERK', 'JENIS MOTOR', 'H.BELI', 'H.JUAL', 'LABA');
//=============0, ========1, ========== 2, ======= 3, ======== 4,  =======5, ======6,  ==========7,   
$pdf->setX(50);
$pdf->SetFont('Arial', 'B', 7);

$pdf->Cell($w[0], 6, 'NO', 'TLR', 0, 'L');
$pdf->Cell($w[1], 6, 'MERK MOTOR', 'TLR', 0, 'C');
$pdf->Cell($w[2], 6, 'JUMLAH BARANG', 'TLR', 0, 'C');
$pdf->Cell($w[3], 6, 'JUMLAH TERJUAL', 'TLR', 0, 'C');
$pdf->Cell($w[4], 6, 'SISA BARANG', 'TLR', 0, 'C');
$pdf->Ln();

//Color and font restoration
$pdf->setX(4);
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(1);
$pdf->SetFont('Arial', '', 7);
//Data

$fill = true;
$i = 0;
$tjlh_beli = 0;
$tjlh_jual = 0;
$tjlh_sisa = 0;

while ($row = mysqli_fetch_array($query)) { 
    $query_pembelian = mysqli_query($koneksi, "SELECT * FROM pembelian p JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor WHERE id_merk = '$row[id_merk]'");
    $jlh_pembelian = mysqli_num_rows($query_pembelian);
    $tjlh_beli += $jlh_pembelian;
    
    $query_terjual = mysqli_query($koneksi, "SELECT * FROM pembelian p JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor WHERE id_merk = '$row[id_merk]' AND status = 1");
    $jlh_terjual = mysqli_num_rows($query_terjual);
    $tjlh_jual += $jlh_terjual;
    
    $query_sisa = mysqli_query($koneksi, "SELECT * FROM pembelian p JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor WHERE id_merk = '$row[id_merk]' AND status = 0");
    $jlh_sisa = mysqli_num_rows($query_sisa);
    $tjlh_sisa = $jlh_sisa;
    
    $pdf->setX(50);
    $i++;
    $pdf->Cell($w[0], 6, $i, 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[1], 6, $row['nama_merk'], 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[2], 6, $jlh_pembelian, 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[3], 6, $jlh_terjual, 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[4], 6, $jlh_sisa, 'TLRB', 0, 'C', $fill);
    $fill = !$fill;
    $pdf->Ln();
}


$pdf->setX(50);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($w[0] + $w[1], 6, 'TOTAL', 1, 0, 'C');
$pdf->Cell($w[2], 6, $tjlh_beli, 1, 0, 'C');
$pdf->Cell($w[3], 6, $tjlh_jual, 1, 0, 'C');
$pdf->Cell($w[4], 6, $tjlh_sisa, 1, 0, 'C');

//footer selalu sama
$pdf->SetFont('Arial', '', 9);
$pdf->Ln();
        $pdf->setX(120);
$pdf->Cell(5, 6, 'Sakrad Motor Pagerbarang, ' . format_date(date('Y-m-d')), 0, 1, 'C', 0);
$pdf->Ln(-2);
        $pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Disiapkan Oleh,', 0, 0, 'C');
$pdf->Cell(163 / 2, 6, 'Diketahui Oleh,', 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 9);
$pdf->Ln(20);
        $pdf->setX(80);
$pdf->Cell(163 / 2, 6, $_SESSION['nama'], 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'Mohamad Dani', 0, 1, 'C', 0);

$pdf->Ln(-2);
$pdf->SetFont('Arial', '', 9);
        $pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Petugas', 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'Pimpinan', 0, 0, 'C', 0);
$pdf->Output();
?>