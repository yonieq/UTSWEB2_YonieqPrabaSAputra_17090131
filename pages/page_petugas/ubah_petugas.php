<?php
$aksi = "pages/page_petugas/aksi_petugas.php";

$id_petugas = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM petugas
                               WHERE id_petugas = $id_petugas")or die(mysqli_error($koneksi));
$hasil = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($data['hak_akses'] == 'admin'){
	$selected1 = 'checked';
	$selected2 = '';
}elseif($data['hak_akses'] == 'operator'){
	$selected1 = '';
	$selected2 = 'checked';
}else{
	$selected1 = '';
	$selected2 = '';
}
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=petugas">Petugas</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Ubah Petugas</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal"   method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=petugas&act=ubah">
                <input type="hidden" value="<?php echo $data['id_petugas']; ?>" name="id_petugas" id="id"/>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="nama_petugas" class="form-field" value="<?php echo $data['nama_petugas']; ?>">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" class="form-field" value="<?php echo $data['username']; ?>">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hak Akses</label>
                        <div class="controls">
                            <label class="radio">
                                <div class="radio" id="uniform-optionsRadios1"><input type="radio" name="hak_akses" id="optionsRadios1" value="admin" checked="<?php echo $selected1;?>" style="opacity: 0;"></div>
									Administrator
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <div class="radio" id="uniform-optionsRadios2"><input type="radio" name="hak_akses" id="optionsRadios2" value="operator" checked="<?php echo $selected2;?>" style="opacity: 0;"></div>
									Operator
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password_ubah" id="password_ubah" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Konfirmasi Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirm_ubah" id="password_confirm_ubah" class="form-field">
                            <span class="untuk_label_validasi"></span>
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