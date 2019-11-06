<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
        </a>

        <!-- theme selector ends -->

        <!-- user dropdown starts -->
        
        <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                <?php if ($_SESSION['hak_akses'] == 'admin') { ?>
                    <li class="active"><a href="index.php?pages=home">Home</a></li>
                    <li><a href="index.php?pages=petugas">User</a></li>
                    <li><a href="index.php?pages=stok">Stok Motor</a></li>
                    <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
                    <li><a href="pages/page_stok/cetak_stok.php">Laporan Stok</a></li>
                    <li><a href="index.php?pages=laporan_pembelian">Laporan pembelian</a></li>
                    <li><a href="index.php?pages=laporan_penjualan">Laporan penjualan</a></li>
			</ul>
		</li>
                    <li><a href="logout.php" class="">Log out</a></li>
                    <?php } else { ?>
                    <li class="active"><a href="index.php?pages=home">Home</a></li>
                    <li><a href="index.php?pages=merk">Merk Motor</a></li>
                    <li><a href="index.php?pages=jenis_motor">Jenis Motor</a></li>
                    <li><a href="index.php?pages=stok">Stok Motor</a></li>
                    <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
                <li><a href="index.php?pages=pembelian">Pembelian Motor</a></li>
                <li><a href="index.php?pages=penjualan">Penjualan Motor</a></li>
			</ul>
        </li>
        <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
                    <li><a href="pages/page_stok/cetak_stok.php">Laporan Stok</a></li>
                    <li><a href="index.php?pages=laporan_pembelian">Laporan pembelian</a></li>
                    <li><a href="index.php?pages=laporan_penjualan">Laporan penjualan</a></li>
			</ul>
		</li>
                    <li><a href="logout.php" class="">Log out</a></li>
                    <?php } ?>
        </div>
        </ul>
        </nav>
        <!-- user dropdown ends -->
    </div>
</div>