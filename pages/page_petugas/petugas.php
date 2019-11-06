<?php
$aksi = "pages/pages_petugas/aksi_petugas.php";

$query = mysqli_query($koneksi, "select * from petugas");
$hasil = mysqli_num_rows($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="index.php?pages=home">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=petugas">Petugas</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-user"></i> Petugas</h2>
            <div class="box-icon">
                <a class="btn btn-success" href="index.php?pages=tambah_petugas"><i class="icon-plus icon-white"></i> Tambah</a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th style="width: 10%;">
                            No.
                        </th>
                        <th style="width: 30%;">
                            Nama Petugas
                        </th>
                        <th style="width: 20%;">
                            Username
                        </th>
                        <th style="width: 15%;">
                            Hak Akses
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
                            <td><?php echo $data['nama_petugas']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['hak_akses']; ?></td>
                            <td>
                                <a href="index.php?pages=ubah_petugas&&id=<?php echo $data['id_petugas']; ?>" class="btn btn-info" ><i class="icon-edit icon-white"></i>Ubah</a>
                                <a href="<?php echo $aksi . '?pages=petugas&&act=hapus&&id=' . $data['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><i class="icon-trash icon-white"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>


