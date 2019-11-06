<?php
$aksi = "pages/page_penjualan/aksi_penjualan.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Beranda</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="index.php?pages=stok_barang">Stok Barang</a>
        </li>
    </ul>
</div>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Form Stok Barang</h2>
        </div>
        <div class="box-content">
            <form id="formtest" class="form-horizontal" action="pages/mod_stok/cetak_stok.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label">Bulan</label>
                        <div class="controls">
                            <input type="text" name="bulan" class="form-field yearmonth_datepicker"">
                            <span></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Cetak</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-warning" onClick="javascript:history.back()">Batal</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->