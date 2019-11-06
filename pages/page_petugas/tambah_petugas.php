<?php
$aksi = "pages/page_petugas/aksi_petugas.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=petugas">Petugas</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Petugas</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?pages=petugas&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Nama</label>
                        <div class="controls">
                            <input type="text" name="nama_petugas" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Hak Akses</label>
                        <div class="controls">
                            <label class="radio">
                                <div class="radio" id="uniform-optionsRadios1"><span class="checked"><input type="radio" name="hak_akses" id="optionsRadios1" value="admin" checked="" style="opacity: 0;"></span></div>
									Administrator
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <div class="radio" id="uniform-optionsRadios2"><span><input type="radio" name="hak_akses" id="optionsRadios2" value="operator" style="opacity: 0;"></span></div>
									Operator
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input type="text" name="username" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Konfirmasi Password</label>
                        <div class="controls">
                            <input type="password" name="password_confirm" class="form-field" id="password">
                            <span class="untuk_label_validasi"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="fileInput">Foto</label>
                        <div class="controls">
                            <div class="uploader" id="uniform-fileInput"><input name="foto" class="input-file uniform_on" id="fileInput" type="file" size="19" style="opacity: 0;"><span class="filename">Foto belum dipilih</span><span class="action">Pilih File</span></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button id="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->