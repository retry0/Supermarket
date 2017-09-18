<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Title-->
    <title>Aplikasi Kasir</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url() ?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   <!-- Google Fonts-->
        <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>/assets/css/custom-styles.css" rel="stylesheet" />

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Aplikasi Kasir</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                        <li>
						<!-- Tombol Logout merupakan controller dari masuk fungsi logout-->
                            <a href="<?php echo base_url().'masuk/logout'?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php if ($this->session->userdata('LEVEL') =='admin'){ ?>
		<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
<!--/. NAV barr -->
<li>
                        <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
					<li>
					<!--/. tombol tambah kategori barang diambil dari controller pesanan   -->
                        <a href="<?php echo base_url().'pesanan'?>"><i class="fa fa-edit"></i> Kasir </a>
                    </li>
					 <li>
					<!--/. tombol tambah kategori barang diambil dari controller pesan fungsi pdf   -->
                        <a href="<?php echo base_url().'pesanan/pdf'?>" target="_blank"><i class="fa fa-sitemap"></i>Cetak</a>
                    </li>
                    <li>
					<!--/. tombol tambah kategori barang diambil dari controller kategori   -->
                        <a href="<?php echo base_url().'kategori'?>"><i class="fa fa-desktop"></i>Kategori Barang</a>
                    </li>
					<li>
					<!--/. tombol tambah kategori barang diambil dari controller barang   -->
                        <a href="<?php echo base_url().'barang'?>"><i class="fa fa-bar-chart-o"></i> Barang</a>
                    </li>
                    <li>
					<!--/. tombol tambah kategori barang diambil dari controller pegawai  -->
                        <a href="<?php echo base_url().'pegawai'?>"><i class="fa fa-qrcode"></i> Pegawai</a>
                    </li>
                </ul>

            </div>

        </nav>
		<br>
    <?php } else { ?>
	<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				
<li>
                        <a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
					<!--/. tombol tambah kategori barang diambil dari controller pesanan   -->
                        <a href="<?php echo base_url().'pesanan'?>"><i class="fa fa-edit"></i> Kasir </a>
                    </li>
					<li>
					<!--/. tombol tambah kategori barang diambil dari controller pesan fungsi pdf   -->
                        <a href="<?php echo base_url().'pesanan/pdf'?>" target="_blank"><i class="fa fa-sitemap"></i>Cetak</a>
                    </li>
					</ul>

            </div>

        </nav>
		 <br>

<?php } ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    <?php echo $contents; ?>
            </div>
            <!-- /. Footer  -->
<center><font face="Consolas" size="1">&copy; 2016 Copyright Politeknik Negeri Batam</font></center>        </div
        <!-- /. PAGE WRAPPER  -->
    </div>


        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</body>
</html>
