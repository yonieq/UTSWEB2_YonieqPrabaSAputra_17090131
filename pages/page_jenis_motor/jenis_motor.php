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
            <a href="index.php?pages=jenis_motor">Merk</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Merk</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?pages=tambah_jenis_motor"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
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
                        <th style="width: 25%;">
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
                            <td><?php echo $data['nama_merk']; ?></td>
                            <td><?php echo $data['jenis_motor']; ?></td>
                            <td>
                                <a href="index.php?pages=ubah_jenis_motor&&id=<?php echo $data['id_jenis_motor']; ?>" class="btn btn-info" ><i class="icon-edit icon-white"></i>Ubah</a>
                                <a href="<?php echo $aksi . '?pages=jenis_motor&&act=hapus&&id=' . $data['id_jenis_motor']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


