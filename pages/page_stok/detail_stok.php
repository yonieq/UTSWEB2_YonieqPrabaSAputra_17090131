<?php
$aksi = "pages/page_pembelian/aksi_pembelian.php";

$query = mysqli_query($koneksi, "SELECT * FROM pembelian p 
                        JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor 
                        JOIN merk m ON m.id_merk = jm.id_merk
                        WHERE p.id_jenis_motor = '$_GET[id]'
                        ORDER BY tgl_pembelian DESC");
$hasil = mysqli_num_rows($query);

$query_jm = mysqli_query($koneksi, "SELECT * FROM jenis_motor jm JOIN merk m ON m.id_merk = jm.id_merk WHERE id_jenis_motor = '$_GET[id]'");
$data_jm = mysqli_fetch_array($query_jm);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?modul=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=stok">Stok</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Detail Stok : <?php echo $data_jm['nama_merk'].' '.$data_jm['jenis_motor'];?></h2>
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
                            <td><?php echo $data['nopol']; ?></td>
                            <td><?php echo indo_number($data['harga_pembelian']); ?></td>
                            <td><?php echo $data['penjual']; ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


