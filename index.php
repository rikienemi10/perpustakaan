<?php

session_start();

include "function.php";

$koneksi = new mysqli("localhost", "root", "", "_absen");

if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {

?>




    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Absensi R7K </title>

        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Absensi R7K</a>

                </div>
                <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp;
                    <?php
                    $tanggal = mktime(date("m"), date("d"), date("Y"));
                    echo "Tanggal : <b>" . date("d-M-Y", $tanggal) . "</b> ";
                    date_default_timezone_set('Asia/Jakarta');
                    $jam = date("H:i:s");
                    echo "| Pukul : <b>" . $jam . " " . "</b>";
                    $a = date("H");
                    if (($a >= 6) && ($a <= 11)) {
                        echo "<b>, Selamat Pagi !!</b>";
                    } else if (($a > 11) && ($a <= 15)) {
                        echo ", Selamat Pagi !!";
                    } else if (($a > 15) && ($a <= 18)) {
                        echo ", Selamat Siang !!";
                    } else {
                        echo ", <b> Selamat Malam </b>";
                    }
                    ?>
                    <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>

                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/img/find_user.png" class="user-image img-responsive" />
                        </li>


                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="?page=anggota"><i class="fa fa-users fa-3x"></i> Data Anggota</a>
                        </li>

                        <li>
                            <a href="?page=buku"><i class="fa fa-table fa-3x"></i> Data Buku</a>
                        </li>

                        <li>
                            <a href="?page=transaksi"><i class="fa fa-edit fa-3x"></i>Transaksi</a>
                        </li>


                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $page = @$_GET['page'];
                            $aksi = @$_GET['aksi'];

                            if ($page == "buku") {
                                if ($aksi == "") {
                                    include "page/buku/buku.php";
                                } elseif ($aksi == "tambah") {

                                    include "page/buku/tambah.php";
                                } elseif ($aksi == "ubah") {

                                    include "page/buku/ubah.php";
                                } elseif ($aksi == "hapus") {

                                    include "page/buku/hapus.php";
                                }
                            } elseif ($page == "anggota") {
                                if ($aksi == "") {
                                    include  "page/anggota/anggota.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                }
                            } elseif ($page == "transaksi") {
                                if ($aksi == "") {

                                    include  "page/transaksi/transaksi.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/transaksi/tambah.php";
                                } elseif ($aksi == "kembali") {
                                    include "page/transaksi/kembali.php";
                                } elseif ($aksi == "perpanjangan") {
                                    include "page/transaksi/perpanjangan.php";
                                }
                            } elseif ($page == "") {
                                include "home.php";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->

        <!-- data table -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


    </body>

    </html>
    }
<?php

} else {
    header("location:login.php");
}



?>