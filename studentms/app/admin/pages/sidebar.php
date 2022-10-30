<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $_SESSION['fullname']; ?></p>
                <?php
                include "../../config/koneksi.php";

                $id = $_SESSION['id_user'];

                $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id'");
                $row = mysqli_fetch_array($query);
                ?>

                <?php

                if ($row['verif'] == "Iya") {
                    echo "<a><i class='fa fa-check-circle text-info'></i> Akun Terverifikasi</a>";
                } else {
                    echo "<a><i class='fa fa-exclamation text-danger'></i> Tidak Diketahui </a>";
                }

                ?>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li><a href="dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="siswa"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
                    <li><a href="guru"><i class="fa fa-circle-o"></i> Data Guru</a></li>
                    <li><a href="petugas"><i class="fa fa-circle-o"></i> Data Petugas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Katalog Website App</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> E-Perpus</a></li>
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> E-Absensi</a></li>
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> E-Ekstrakurikuler</a></li>
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> E-Repository</a></li>
                    <li><a href="data-buku"><i class="fa fa-circle-o"></i> E-Inventory</a></li>
                    <li><a href="kategori-buku"><i class="fa fa-circle-o"></i> E-Voting</a></li>
                </ul>
            </li>
            <li class="header">LAIN LAIN</li>
            <li><a href="identitas-app"><i class="fa fa-info"></i> <span>Identitas Aplikasi</span></a></li>
            <span class="pull-right-container" id="jumlahPesan">
                <?php
                include "../../config/koneksi.php";

                $nama_saya = $_SESSION['fullname'];
                $default = "Belum dibaca";
                $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                $jumlah_pesan = mysqli_num_rows($query_pesan);

                $nama_saya = $_SESSION['fullname'];
                $default = "Belum dibaca";
                $query_pesan  = mysqli_query($koneksi, "SELECT * FROM pesan WHERE penerima = '$nama_saya' AND status = '$default'");
                $row_pesan = mysqli_fetch_array($query_pesan);

                if ($jumlah_pesan == null) {
                    // Hilangkan badge pesan
                } else {
                    echo "<span class='label label-danger pull-right'>" . $jumlah_pesan . "</span>";
                }
                ?>
            </span>
            </a></li>
            <li class="header">LANJUTAN</li>
            <li><a href="#Logout" data-toggle="modal" data-target="#modalLogoutConfirm"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div class="modal fade" id="modalLogoutConfirm">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Peringatan</h4>
            </div>
            <div class="modal-body">
                <?php
                include "../../config/koneksi.php";

                $sql = mysqli_query($koneksi, "SELECT * FROM identitas");
                $row = mysqli_fetch_assoc($sql);
                ?>
                <span>Apa anda yakin ingin keluar dari Aplikasi ? <br>
                    Anda harus login kembali jika ingin masuk Aplikasi <?= $row['nama_app']; ?></span>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                <a href="keluar" class="btn btn-primary">Iya, Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
    var refreshId = setInterval(function() {
        $('#jumlahPesan').load('./pages/function/Pesan.php?aksi=jumlahPesan');
    }, 500);
</script>