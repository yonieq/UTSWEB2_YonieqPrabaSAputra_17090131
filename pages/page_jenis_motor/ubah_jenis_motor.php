<?php
$aksi = "pages/page_jenis_motor/aksi_jenis_motor.php";

$id_jenis_motor = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM jenis_motor
                               WHERE id_jenis_motor = $id_jenis_motor")or die(mysqli_error($koneksi));
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=jenis_motor">Merk</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah jenis_motor</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?pages=jenis_motor&act=ubah">
                <input type="hidden" value="<?php echo $data['id_jenis_motor']; ?>" name="id_jenis_motor" id="id"/>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Merk</label>
                        <div class="controls">
                            <select name="id_merk" id="id_merk" class="form-field">
                                <?php
                                $tampil = mysqli_query($koneksi, "SELECT * FROM merk ORDER BY nama_merk");
                                if ($data['id_merk'] == 0) {
                                    echo "<option value='' selected>- Pilih Merk -</option>";
                                }
                                echo "<option value='' selected>- Pilih Merk -</option>";

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_merk]> $w[nama_merk]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jenis Motor</label>
                        <div class="controls">
                            <input type="text" name="jenis_motor" value="<?php echo $data['jenis_motor'];?>" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->