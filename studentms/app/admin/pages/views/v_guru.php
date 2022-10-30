<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Data Guru
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //
                </script>
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Guru</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Guru</h3>
                        <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                            <button type="button" onclick="tambahGuru()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Guru</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Guru</th>
                                    <th>NIG</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Mapel</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            include "../../config/koneksi.php";

                            $no = 1;
                            $query = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'Guru'");
                            while ($row = mysqli_fetch_assoc($query)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['kode_user']; ?></td>
                                        <td><?php echo $row['nig']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['jabatan']; ?></td>
                                        <td><?php echo $row['mapel']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditGuru<?php echo $row['id_user']; ?>"><i class="fa fa-edit"></i></a>
                                            <a href="pages/function/Guru.php?aksi=hapus&id=<?= $row['id_user']; ?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <!-- Modal Edit Guru -->
                                    <div class="modal fade" id="modalEditGuru<?php echo $row['id_user']; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content" style="border-radius: 5px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                                                        Edit Guru ( <?= $row['kode_user']; ?> - <?= $row['fullname']; ?> )
                                                    </h4>
                                                </div>
                                                <form action="pages/function/Guru.php?aksi=edit" enctype="multipart/form-data" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" value="<?= $row['id_user']; ?>" name="idUser">
                                                        <div class="form-group">
                                                            <label>Kode Guru <small style="color: red;">* Otomatis Terisi ( Tidak dapat diubah )</small></label>
                                                            <input type="text" class="form-control" value="<?= $row['kode_user'] ?>" name="kodeGuru" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nomor Induk Guru </label>
                                                            <input type="number" class="form-control" value="<?= $row['nig']; ?>" name="nig">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Lengkap </label>
                                                            <input type="text" class="form-control" value="<?= $row['fullname']; ?>" name="namaLengkap">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Pengguna </label>
                                                            <input type="text" class="form-control" value="<?= $row['username']; ?>" name="uSername">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Kata Sandi </label>
                                                            <input type="password" class="form-control" value="<?= $row['password']; ?>" name="pAssword">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Jabatan <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="jAbatan">
                                                                <?php
                                                                if ($row['jabatan'] == null) {
                                                                    echo "<option selected disabled>Silahkan pilih jabatan dari [" . $row['fullname'] . "]</option>";
                                                                } else {
                                                                    echo "<option selected value='" . $row['jabatan'] . "'>" . $row['jabatan'] . " ( Dipilih Sebelumnya )</option>";
                                                                }
                                                                ?>
                                                                <option disabled>------------------------------------------</option>
                                                                <!-- X -->
                                                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                                                <option value="Koordinator">Koordinator</option>
                                                                <option value="Waka Kurikulum">Waka Kurikulum</option>
                                                                <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                                                                <option value="Kaprodi RPL">Kaprodi RPL</option>
                                                                <option value="Kaprodi TKJ">Kaprodi TKJ</option>
                                                                <option value="Kaprodi TP">Kaprodi TP</option>
                                                                <option value="Kaprodi TBSM">Kaprodi TBSM</option>
                                                                <option value="Kaprodi TKRO">Kaprodi TKRO</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mapel <small style="color: red;">* Wajib diisi</small></label>
                                                            <select class="form-control" name="mApel">
                                                                <?php
                                                                if ($row['mapel'] == null) {
                                                                    echo "<option selected disabled>Silahkan pilih mapel dari [" . $row['fullname'] . "]</option>";
                                                                } else {
                                                                    echo "<option selected value='" . $row['mapel'] . "'>" . $row['mapel'] . " ( Dipilih Sebelumnya )</option>";
                                                                }
                                                                ?>
                                                                <option disabled>------------------------------------------</option>
                                                                <!-- X -->
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option disabled>------------------------------------------</option>
                                                                <!-- XI -->
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option value="-">-</option>
                                                                <option disabled>------------------------------------------</option>
                                                                <!-- XII -->
                                                                <option value="PEMROGRAMAN BERORIENTASI OBJEK">PEMROGRAMAN BERORIENTASI OBJEK</option>
                                                                <option value="PKK MATERI">PKK [MATERI]</option>
                                                                <option value="PKK PRAKTIK">PKK [PRAKTIK]</option>
                                                                <option value="BASIS DATA">BASIS DATA</option>
                                                                <option value="MATEMATIKA">MATEMATIKA</option>
                                                                <option value="BAHASA INGGRIS">BAHASA INGGRIS</option>
                                                                <option value="PEMROGRAMAN WEB DAN PERANGKAT BERGERAK">PEMROGRAMAN WEB DAN PERANGKAT BERGERAK</option>
                                                                <option value="BAHASA JEPANG">BAHASA JEPANG</option>
                                                                <option value="PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN">PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN</option>
                                                                <option value="PENDIDIKAN AGAMA ISLAM DAN BUDI PEKERTI">PENDIDIKAN AGAMA ISLAM DAN BUDI PEKERTI</option>
                                                                <option value="BAHASA INDONESIA">BAHASA INDONESIA</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat </label>
                                                            <textarea class="form-control" style="resize: none; height: 70px;" name="aLamat"><?= $row['alamat']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /. Modal Edit Guru-->
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="modalTambahGuru">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 5px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Guru</h4>
            </div>
            <form action="pages/function/Guru.php?aksi=tambah" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Guru <small style="color: red;">* Otomatis Terisi</small></label>
                        <?php
                        include "../../config/koneksi.php";

                        $query = mysqli_query($koneksi, "SELECT max(kode_user) as kodeTerakhir FROM user");
                        $data = mysqli_fetch_array($query);
                        $kodeTerakhir = $data['kodeTerakhir'];

                        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                        // dan diubah ke integer dengan (int)
                        $urutan = (int) substr($kodeTerakhir, 3, 3);

                        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                        $urutan++;

                        // membentuk kode barang baru
                        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                        $huruf = "GR";
                        $Guru = $huruf . sprintf("%03s", $urutan);
                        ?>
                        <input type="text" class="form-control" value="<?php echo $Guru ?>" name="kodeGuru" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nomor Induk Guru <small style="color: red;">* Wajib diisi</small></label>
                        <input type="number" class="form-control" placeholder="Masukan NIG" name="nig" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="namaLengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pengguna <small style="color: red;">* Wajib diisi</small></label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Pengguna" name="username" required>
                    </div>
                    <div class="form-group">
                        <label>Kata Sandi <small style="color: red;">* Wajib diisi</small></label>
                        <input type="password" class="form-control" placeholder="Masukan Kata Sandi" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="jabatan">
                            <option disabled selected>-- Harap Pilih Jabatan --</option>
                            <!-- X -->
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Koordinator">Koordinator</option>
                            <option value="Waka Kurikulum">Waka Kurikulum</option>
                            <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                            <option value="Kaprodi RPL">Kaprodi RPL</option>
                            <option value="Kaprodi TKJ">Kaprodi TKJ</option>
                            <option value="Kaprodi TP">Kaprodi TP</option>
                            <option value="Kaprodi TBSM">Kaprodi TBSM</option>
                            <option value="Kaprodi TKRO">Kaprodi TKRO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mapel <small style="color: red;">* Wajib diisi</small></label>
                        <select class="form-control" name="mapel">
                            <option disabled selected>-- Harap Pilih Mapel --</option>
                            <!-- X -->
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option disabled>------------------------------------------</option>
                            <!-- XI -->
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option value="-">-</option>
                            <option disabled>------------------------------------------</option>
                            <!-- XII -->
                            <option value="-">PEMROGRAMAN BERORIENTASI OBJEK</option>
                            <option value="-">PKK [MATERI]</option>
                            <option value="-">PKK [PRAKTIK]</option>
                            <option value="-">BASIS DATA</option>
                            <option value="-">MATEMATIKA</option>
                            <option value="-">BAHASA INGGRIS</option>
                            <option value="-">PEMROGRAMAN WEB DAN PERANGKAT BERGERAK</option>
                            <option value="-">BAHASA JEPANG</option>
                            <option value="-">PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN</option>
                            <option value="-">PENDIDIKAN AGAMA ISLAM DAN BUDI PEKERTI</option>
                            <option value="-">BAHASA INDONESIA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat <small style="color: red;">* Wajib diisi</small></label>
                        <textarea class="form-control" style="resize: none; height: 70px;" name="alamat" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function tambahGuru() {
        $('#modalTambahGuru').modal('show');
    }
</script>
<!-- jQuery 3 -->
<script src="../../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dist/js/sweetalert.min.js"></script>
<!-- Pesan Berhasil Edit -->
<script>
    <?php
    if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] <> '') {
        echo "swal({
            icon: 'success',
            title: 'Berhasil',
            text: '$_SESSION[berhasil]'
        })";
    }
    $_SESSION['berhasil'] = '';
    ?>
</script>
<!-- Pesan Gagal Edit -->
<script>
    <?php
    if (isset($_SESSION['gagal']) && $_SESSION['gagal'] <> '') {
        echo "swal({
                icon: 'error',
                title: 'Gagal',
                text: '$_SESSION[gagal]'
              })";
    }
    $_SESSION['gagal'] = '';
    ?>
</script>
<!-- Swal Hapus Data -->
<script>
    $('.btn-del').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href')

        swal({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Apakah anda yakin ingin menghapus data Guru ini ?',
                buttons: true,
                dangerMode: true,
                buttons: ['Tidak, Batalkan !', 'Iya, Hapus']
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.location.href = href;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Dibatalkan',
                        text: 'Data Guru tersebut aman !'
                    })
                }
            });
    })
</script>