<?php
$aksi = "pages/page_jenis_motor/aksi_jenis_motor.php";

$query = mysqli_query($koneksi, "select * from jenis_motor jm JOIN merk m ON m.id_merk = jm.id_merk");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?pages=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=stok">Stok</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Data Stok</h2>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 10%;">
                            No.
                        </th>
                        <th style="width: 20%;">
                            Nama Merk
                        </th>
                        <th style="width: 20%;">
                            Jenis Motor
                        </th>
                        <th style="width: 20%;">
                            Stok
                        </th>
                        <th style="width: 20%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($query)) {
                        $query_stok = mysqli_query($koneksi, "SELECT * FROM pembelian p 
                            JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor 
                            WHERE p.id_jenis_motor = '$data[id_jenis_motor]'
                            AND status = 0");
                        $jlh_stok = mysqli_num_rows($query_stok);
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_merk']; ?></td>
                            <td><?php echo $data['jenis_motor']; ?></td>
                            <td>
                                <?php echo $jlh_stok; ?> Unit
                            </td>
                            <td>
                                <a href="index.php?pages=detail_stok&id=<?php echo $data['id_jenis_motor'];?>" class="btn btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


