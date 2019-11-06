<?php
$aksi = "pages/page_pembelian/aksi_pembelian.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=pembelian">Pembelian</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah Pembelian</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?pages=pembelian&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Merk</label>
                        <div class="controls">
                            <select name="id_merk" id="id_merk" class="form-field">
                                <?php
                                $tampil = mysqli_query($koneksi, "SELECT * FROM merk ORDER BY nama_merk");
                                if ($r['nip'] == 0) {
                                    echo "<option value='' selected>- Pilih Merk -</option>";
                                }

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_merk]> $w[nama_merk]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div><div class="control-group">
                        <label class="control-label">Jenis</label>
                        <div class="controls">
                            <select name='id_jenis_motor' id='id_jenis_motor' class="form-field">
           
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No. Polisi</label>
                        <div class="controls">
                            <input type="text" name="nopol" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal Pembelian</label>
                        <div class="controls">
                            <input type="text" name="tgl_pembelian" value="<?php echo date("d/m/Y");?>" class="form-field datepicker"">
                                   <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Harga Beli</label>
                        <div class="controls">
                            <input type="text" name="harga_pembelian" class="form-field formatCurrency">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Penjual</label>
                        <div class="controls">
                            <input type="text" name="penjual" class="form-field">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat</label>
                        <div class="controls">
                            <textarea rows="3" style="width: 210px; height: 100px;" name="alamat"></textarea>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <textarea rows="3" style="width: 210px; height: 100px;" name="keterangan"></textarea>
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
<script type="text/javascript">
$(document).ready(function() {
    
  });
</script>