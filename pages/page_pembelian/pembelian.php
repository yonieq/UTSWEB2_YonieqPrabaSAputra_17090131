<?php
$aksi = "pages/page_pembelian/aksi_pembelian.php";

$query = mysqli_query($koneksi, "SELECT * FROM pembelian p 
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
            <a href="index.php?pages=pembelian">Pembelian Motor</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Pembelian Motor</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?pages=tambah_pembelian"><i class="icon-plus icon-white"></i> Tambah</a>
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
                            Tanggal Beli
                        </th>
                        <th style="width: 15%;">
                            Merk / Jenis Motor
                        </th>
                        <th style="width: 10%;">
                            No. Polisi
                        </th>
                        <th style="width: 10%;">
                            Harga Beli
                        </th>
                        <th style="width: 10%;">
                            Penjual
                        </th>
                        <th style="width: 15%;">
                            Keterangan
                        </th>
                        <th style="width: 10%;">
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
                            <td><?php echo format_date($data['tgl_pembelian']); ?></td>
                            <td><?php echo $data['nama_merk'] . ' ' . $data['jenis_motor']; ?></td>
                            <td><?php echo $data['nopol']; ?></td>
                            <td><?php echo indo_number($data['harga_pembelian']); ?></td>
                            <td><?php echo $data['penjual']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td>
                                <a href="pages/page_pembelian/faktur_pembelian.php<?php echo '?id=' . $data['id_pembelian']; ?>" class="btn btn-info">Cetak Faktur</a>
                                <?php if ($data['status'] == 0) { ?>
                                    <a href="<?php echo $aksi . '?pages=pembelian&&act=hapus&&id=' . $data['id_pembelian']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">Hapus</a>
                                <?php } else { ?>
                                    <span class="label label-inverse">Terjual</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


