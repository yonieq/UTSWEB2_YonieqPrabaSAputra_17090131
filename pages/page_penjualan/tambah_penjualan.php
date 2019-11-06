<?php
$aksi = "pages/page_penjualan/aksi_penjualan.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?modul=penjualan">Penjualan</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i> Tambah penjualan</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="<?php echo $aksi; ?>?pages=penjualan&act=tambah" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Motor</label>
                        <div class="controls">
                            <select name="id_pembelian" id="id_pembelian" class="form-field">
                                <?php
                                $tampil = mysqli_query($koneksi, "SELECT * FROM pembelian p 
                                                        JOIN jenis_motor jm ON jm.id_jenis_motor = p.id_jenis_motor 
                                                        JOIN merk m ON m.id_merk = jm.id_merk
                                                        WHERE status = 0 ORDER BY nama_merk");
                                if ($r['nip'] == 0) {
                                    echo "<option value='' selected>- Pilih Motor -</option>";
                                }

                                while ($w = mysqli_fetch_array($tampil)) {
                                    echo "<option value=$w[id_pembelian]> $w[nama_merk] $w[jenis_motor] - $w[nopol]</option>";
                                }
                                ?>
                            </select>
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal penjualan</label>
                        <div class="controls">
                            <input type="text" name="tgl_penjualan" value="<?php echo date("d/m/Y");?>"  class="form-field datepicker">
                                   <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Harga Jual</label>
                        <div class="controls">
                            <input type="text" name="harga_penjualan" id="harga_penjualan" value="" class="form-field formatCurrency">
                            <span></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Pembeli</label>
                        <div class="controls">
                            <input type="text" name="pembeli" class="form-field"">
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
<script  type="text/javascript">

</script>