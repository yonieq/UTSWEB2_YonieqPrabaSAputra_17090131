<?php

session_start();

include "../../koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include "../../fungsi/pdf/fpdf.php";

$bulan = substr($_POST['bulan'], 0, 2);
$tahun = substr($_POST['bulan'], 3, 4);

$query = mysqli_query($koneksi, "SELECT * FROM pembelian p 
                        JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor 
                        JOIN merk m ON m.id_merk = jm.id_merk
			WHERE MONTH(tgl_pembelian) = '$bulan' AND YEAR(tgl_pembelian) = '$tahun'") or die(mysqli_error($koneksi));
$num = mysqli_num_rows($query);

if ($num == 0) {
    echo "<script language='javascript'>
                        alert('Data pembelian tidak ditemukan atau masih kosong');
                        window.location='../../index.php?pages=laporan_pembelian';
			</script>";
}

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN PEMBELIAN MOTOR', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 10);
$pdf->Cell(0, 5, 'Periode Bulan : ' . format_month($bulan) . ' ' . $tahun, 0, 1, 'C');
$pdf->Ln();

$w = array(6, 23, 16, 28, 28, 30, 30, 30); //163
//=========0, 1,  2,  3,  4,  5,  6, 7=====//

$list = array('NO', 'TGL PEMBELIAN', 'NO.POL.', 'MERK', 'JENIS MOTOR', 'H.BELI', 'ASAL', 'KETERANGAN', 'H.PENJUALAN');
//=============0, ========1, ========== 2, ======= 3, ======== 4,  =======5, ======6,  ==========7,  ==========8,  
$pdf->setX(70);
$pdf->SetFont('Arial', 'B', 7);

$pdf->Cell($w[0], 6, 'NO', 'TLR', 0, 'L');
$pdf->Cell($w[1], 6, 'TANGGAL', 'TLR', 0, 'C');
$pdf->Cell($w[2], 6, 'NOPOL', 'TLR', 0, 'C');
$pdf->Cell($w[3], 6, 'MERK', 'TLR', 0, 'C');
$pdf->Cell($w[4], 6, 'JENIS MOTOR', 'TLR', 0, 'C');
$pdf->Cell($w[5], 6, 'HARGA BELI', 'TLR', 0, 'C');
$pdf->Cell($w[6], 6, 'PENJUAL', 'TLR', 0, 'C');
$pdf->Ln();

//Color and font restoration
$pdf->setX(4);
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(1);
$pdf->SetFont('Arial', '', 7);
//Data

$fill = false;
$i = 0;
$thbeli = 0;

while ($row = mysqli_fetch_array($query)) {
    $thbeli += $row['harga_pembelian'];

    $pdf->setX(70);
    $i++;
    $pdf->Cell($w[0], 6, $i, 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[1], 6, format_date($row['tgl_pembelian']), 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[2], 6, $row['nopol'], 'TLRB', 0, 'L', $fill);
    $pdf->Cell($w[3], 6, $row['nama_merk'], 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[4], 6, $row['jenis_motor'], 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[5], 6, format_money($row['harga_pembelian']), 'TLRB', 0, 'R', $fill);
    $pdf->Cell($w[6], 6, $row['penjual'], 'TLRB', 1, 'R', $fill);
    $fill = !$fill;
}
$r_thbeli = $thbeli / $num;

//Closure line
$pdf->setX(70);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($w[0] + $w[1] + $w[2] + $w[3] + $w[4], 6, 'Rata-rata', '', 0, 'C');
$pdf->Cell($w[5], 6, format_money($r_thbeli), 'TLR', 1, 'R');


$pdf->setX(70);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($w[0] + $w[1] + $w[2] + $w[3] + $w[4], 6, 'TOTAL', '', 0, 'C');
$pdf->Cell($w[5], 6, format_money($thbeli), 1, 1, 'R');

//footer selalu sama
$pdf->SetFont('Arial', '', 9);
$pdf->Ln();
$pdf->setX(120);
$pdf->Cell(5, 6, 'Sakrad Motor, ' . format_date(date('Y-m-d')), 0, 1, 'C', 0);
$pdf->Ln(-2);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Disiapkan Oleh,', 0, 0, 'C');
$pdf->Cell(163 / 2, 6, 'Diketahui Oleh,', 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 9);
$pdf->Ln(20);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, $_SESSION['nama'], 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'Sakrad.', 0, 1, 'C', 0);

$pdf->Ln(-2);
$pdf->SetFont('Arial', '', 9);
$pdf->setX(80);
$pdf->Cell(163 / 2, 6, 'Petugas', 0, 0, 'C', 0);
$pdf->Cell(163 / 2, 6, 'Pimpinan', 0, 0, 'C', 0);
$pdf->Output();
?>