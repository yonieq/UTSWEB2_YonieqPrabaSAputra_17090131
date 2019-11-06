<?php
$aksi = "pages/page_penjualan/aksi_penjualan.php";

$query = mysqli_query($koneksi, "SELECT pj.id_pembelian, pj.keterangan, id_penjualan, nama_merk, jenis_motor, nopol, pembeli, tgl_penjualan, harga_pembelian, harga_penjualan
                                        FROM penjualan pj 
					JOIN pembelian p ON p.id_pembelian = pj.id_pembelian
					JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor
					JOIN merk m ON m.id_merk = jm.id_merk 
					ORDER BY tgl_pembelian DESC");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?pages=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=penjualan">Penjualan Motor</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Penjualan Motor</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?pages=tambah_penjualan"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 5%;">
                            No.
                        </th>
                        <th style="width: 15%;">
                            Tanggal Jual
                        </th>
                        <th style="width: 15%;">
                            Merk/ Jenis Motor
                        </th>
                        <th style="width: 10%;">
                            Nopol
                        </th>
                        <th style="width: 10%;">
                            Harga Beli
                        </th>
                        <th style="width: 10%;">
                            Harga Jual
                        </th>
                        <th style="width: 5%;">
                            Ket.
                        </th>
                        <th style="width: 15%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo format_date($data['tgl_penjualan']); ?></td>
                            <td><?php echo $data['nama_merk']. ' ' .$data['jenis_motor']; ?></td>
                            <td><?php echo $data['nopol']; ?></td>
                            <td><?php echo $data['harga_pembelian']; ?></td>
                            <td><?php echo $data['harga_penjualan']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td>
								<a href="modul/mod_penjualan/faktur_penjualan.php<?php echo '?id=' . $data['id_penjualan']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <a href="<?php echo $aksi . '?pages=penjualan&&act=hapus&&id=' . $data['id_penjualan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


