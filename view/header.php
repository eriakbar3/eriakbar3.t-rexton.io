<header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
    <ul class="header-inner">

        <!-- Logo -->
        <li class="logo">
            <a href=""><img src="img/logo.png" alt=""></a>
            <div id="menu-trigger"><i class="zmdi zmdi-menu"></i></div>
        </li>

        <!-- Notifications -->


        <!-- Settings -->
        <li class="pull-right dropdown hidden-xs">
            <a href="" data-toggle="dropdown">
                <i class="zmdi zmdi-more-vert"></i>
            </a>
            <ul class="dropdown-menu">
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </li>


        <!-- Time -->

    </ul>
</header>
<?php
$segment = explode('/',$_SERVER['REQUEST_URI']);
$menu = explode('-',$segment[3]);
session_start();
?>
<aside id="sidebar">
    <!--| MAIN MENU |-->
    <ul class="side-menu">
        <li class="sm-sub sms-profile">
            <a class="clearfix" href="">
                <img src="img/profile-pic.jpg" alt="">

                <span class="f-11">
                    <span class="d-block"><font style="text-color:white;" size="3px"><?php echo strtoupper($_SESSION['nama_user']); ?></font></span>
                </span>
            </a>

        </li>

        <li class="<?php echo ($menu[1] == 'index.php') ? 'active' : ''; ?>">
            <a href="index.php">
                <i class="zmdi zmdi-home"></i>
                <span>Home</span>
            </a>
        </li>

        <?php if( $_SESSION['role'] != 3 ){ ?>

        <li class="<?php echo ($menu[1] == 'barang.php') ? 'active' : ''; ?>">
            <a href="data-barang.php">
                <i class="zmdi zmdi-collection-item"></i>
                <span>Data Barang</span>
            </a>
        </li>

        <?php
        if ($_SESSION['role'] == "2"){
        ?>
        <li class="<?php echo ($menu[1] == 'mekanik.php') ? 'active' : ''; ?>">
            <a href="data-mekanik.php">
                <i class="zmdi zmdi-play-for-work"></i>
                <span>Data Mekanik</span>
            </a>
        </li>
        <li class="<?php echo ($menu[1] == 'layanan.php') ? 'active' : ''; ?>">
            <a href="data-layanan.php">
                <i class="zmdi zmdi-settings"></i>
                <span>Data Layanan</span>
            </a>
        </li>
        <li class="<?php echo ($menu[1] == 'motor.php') ? 'active' : ''; ?>">
            <a href="data-motor.php">
                <i class="zmdi zmdi-bike"></i>
                <span>Data Motor</span>
            </a>
        </li>
        <li class="<?php echo ($menu[1] == 'petugas.php') ? 'active' : ''; ?>">
            <a href="data-petugas.php">
                <i class="zmdi zmdi-account"></i>
                <span>Data Petugas</span>
            </a>
        </li>
        <?php
        }
        ?>
        <li class="sm-sub sms-bottom <?php echo ($menu[0] == 'servis.php' || $menu[0] == 'pembelian.php' || $menu[1] == 'spk.php' || $menu[1] == 'pembelian.php' || $menu[1] == 'penjualan.php' || $menu[0] == 'penjualan.php') ? 'active' : ''; ?>">
            <a href="">
                <i class="zmdi zmdi-spellcheck"></i>
                <span>Transaksi</span>
            </a>
            <ul>
                <li class="<?php echo ($menu[0] == 'servis.php' || $menu[1] == 'spk.php') ? 'active' : ''; ?>"><a href="servis.php">Servis</a></li>
                <?php if($_SESSION['role'] == 2 ){ 
                ?>
                <li class="<?php echo (($menu[1] == 'pembelian.php' || $menu[0] == 'pembelian.php') && $menu[0] != 'laporan') ? 'active' : ''; ?>"><a href="pembelian.php">Pembelian</a></li>
                <?php
                }
                ?>
                <?php if( $_SESSION['role'] == 1 ){ ?>
                <li class="<?php echo (($menu[1] == 'penjualan.php' || $menu[0] == 'penjualan.php') && $menu[0] != 'laporan') ? 'active' : ''; ?>"><a href="penjualan.php">Penjualan</a></li>
                <?php } ?>
            </ul>
        </li>

        <?php } ?>

        <li class="sm-sub sms-bottom <?php echo ($menu[0] == 'laporan') ? 'active' : ''; ?>">
            <a href="">
                <i class="zmdi zmdi-receipt"></i>
                <span>Laporan</span>
            </a>
            <ul>
                <li class="<?php echo ($menu[0] == 'laporan' && $menu[1] == 'servis.php') ? 'active' : ''; ?>"><a href="laporan-servis.php">Laporan Servis</a></li>
                <?php if($_SESSION['role'] == 2 ){ 
                ?>
                <li class="<?php echo ($menu[0] == 'laporan' && $menu[1] == 'pembelian.php') ? 'active' : ''; ?>"><a href="laporan-pembelian.php">Laporan Pembelian</a></li>
                <?php
                }
                ?>
                <?php if( $_SESSION['role'] != 2 ){ ?>
                    <li class="<?php echo ($menu[0] == 'laporan' && $menu[1] == 'penjualan.php') ? 'active' : ''; ?>"><a href="laporan-penjualan.php">Laporan Penjualan</a></li>
                    <li class="<?php echo ($menu[0] == 'laporan' && $menu[1] == 'pendapatan') ? 'active' : ''; ?>"><a href="laporan-pendapatan.php">Laporan Pendapatan</a></li>
                <?php } ?>
                <li class="<?php echo ($menu[0] == 'laporan' && $menu[1] == 'stok') ? 'active' : ''; ?>"><a href="laporan-stok-barang.php">Laporan Stok Barang</a></li>
            </ul>
        </li>

    </ul>
</aside>