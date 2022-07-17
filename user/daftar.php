<!doctype html>
<html class="no-js" lang="en">

<?php
include "../dbconnect.php";
include "../cek.php";
if ($role !== "User") {
    header("location:../index.php");
}

$userid = $_SESSION["userid"];

include "submit.php";

//cek dulu sudah pernah submit belum
$cekdulu = mysqli_query($conn, "select * from userdata where userid='$userid'");
$lihathasil = mysqli_num_rows($cekdulu);

//kalau udah pernah submit
if ($lihathasil > 0) {
    header("location:mydata.php");
} else {
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="../assets/select2-4.0.6-rc.1/dist/css/select2.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- page container area start -->
    <div class="page-container">
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left"><a href="index.php"><img style="height: 70px;" src="../logo.png" alt="logo" width="100%"></a>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h6><div class="date" style="color: white">
								<script type='text/javascript'>
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						</script></b></div></h6>

						</li>
                            <li>
                                <h6><a href="../logout.php" style="color: white"><i class="fa-solid fa-power-off"></i></a></h6>                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
			
            <!-- page title area end -->
            <div class="main-content-inner">
                <form method="post" enctype="multipart/form-data">
                <!-- formulir -->
                <div class="row freak mt-5 mb-2" style="display: flex; justify-content: center;">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Pribadi</h2>
                                    <p>* Data yang telah diinput tidak dapat diubah kembali, harap isi dengan teliti dan benar</p>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NISN*</label>
                                                <input name="nisn" type="text" class="form-control" placeholder="NISN" maxlength="12" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>AKTA*</label>
                                                <input name="akta" type="text" class="form-control" placeholder="AKTA" maxlength="12" required>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>KK*</label>
                                                <input name="kk" type="text" class="form-control" placeholder="Nomor KK" maxlength="16" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK*</label>
                                                <input name="nik" type="text" class="form-control" placeholder="NIK" maxlength="16" required>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Lengkap*</label>
                                                <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" maxlength="50" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Kelamin*</label>
                                                <select class="form-control" name="jeniskelamin">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tempat Lahir*</label>
                                                <input name="tempatlahir" type="text" class="form-control" placeholder="Tempat Lahir" maxlength="20">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tanggal Lahir*</label>
                                                <input name="tanggallahir" type="date" class="form-control">
                                            </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label>Alamat Lengkap</label>
                                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
                                            </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                            <label>Provinsi*:</label>
                                            <div class="col-sm-9">
                                            <?php $sql_provinsi = mysqli_query(
                                                $conn,
                                                "SELECT * FROM provinces ORDER BY name ASC"
                                            ); ?>
                                            <select class="form-control" name="provinsi" id="provinsi">
                                                <option></option>
                                                <?php while (
                                                    $rs_provinsi = mysqli_fetch_assoc(
                                                        $sql_provinsi
                                                    )
                                                ) {
                                                    echo '<option value="' .
                                                        $rs_provinsi["id"] .
                                                        '">' .
                                                        $rs_provinsi["name"] .
                                                        "</option>";
                                                } ?>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load1" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kota/Kabupaten*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kota" id="kota">
                                                <option></option>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load2" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kecamatan*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kecamatan" id="kecamatan">
                                                <option></option>
                                            </select>
                                            <img src="asset/img/loading.gif" width="35" id="load3" style="display:none;" />
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label>Kelurahan*:</label>
                                            <div class="col-sm-9">          
                                            <select class="form-control" name="kelurahan" id="kelurahan">
                                                <option></option>
                                            </select>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    
                                        
                                    <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>RT/RW*</label>
                                                <input name="rtrw" type="text" class="form-control" placeholder="RT/RW" maxlength="12" required>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Kode Pos*</label>
                                                <input name="kodepos" type="text" class="form-control" placeholder="Kode Pos" maxlength="16" required>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Moda Transportasi</label>
                                                <input name="modatransportasi" type="text" class="form-control" placeholder="Kendaraan ke sekolah" maxlength="99">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Anak Ke-</label>
                                                <input name="anakke" type="text" class="form-control" placeholder="Isi dengan angka" maxlength="1">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Agama*</label>
                                                <select class="form-control" name="agama">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input name="telepon" type="text" class="form-control" maxlength="15" required>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sesuai KIP</label>
                                                <input name="namakip" type="text" class="form-control" placeholder="Nama" maxlength="99">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>KIP</label>
                                                <input name="kip" type="text" class="form-control" placeholder="KIP" maxlength="99">
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <input name="bank" type="text" class="form-control" placeholder="Nama Bank" maxlength="99">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Sesuai Rekening</label>
                                                <input name="namarekening" type="text" class="form-control" placeholder="Nama Rekening" maxlength="99">
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No. Rekening</label>
                                                <input name="rekening" type="text" class="form-control" placeholder="Nomor Rekening" maxlength="32">
                                            </div>
                                            </div>
                                        </div>
                                            
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                <div class="row freak mt-2 mb-2" style="display: flex; justify-content: center;">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Orang Tua dan Wali</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ayah*</label>
                                                <input name="ayahnik" type="text" class="form-control" placeholder="NIK Ayah" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ayah*</label>
                                                <input name="ayahnama" type="text" class="form-control" placeholder="Nama Ayah" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tahun Lahir Ayah*</label>
                                                <input name="tahunayah" type="text" class="form-control" placeholder="Tahun Lahir" maxlength="4">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ayah</label>
                                                <select class="form-control" name="ayahpendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ayah</label>
                                                <select class="form-control" name="ayahpekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ayah per bulan</label>
                                                <select class="form-control" name="ayahpenghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ayah</label>
                                                <input name="ayahtelepon" type="text" class="form-control" maxlength="15">
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Ibu*</label>
                                                <input name="ibunik" type="text" class="form-control" placeholder="NIK Ibu" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Ibu*</label>
                                                <input name="ibunama" type="text" class="form-control" placeholder="Nama Ibu" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tahun Lahir Ibu*</label>
                                                <input name="tahunibu" type="text" class="form-control" placeholder="Tahun Lahir" maxlength="4">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Ibu</label>
                                                <select class="form-control" name="ibupendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Ibu</label>
                                                <select class="form-control" name="ibupekerjaan">
                                                    <option value="Tidak Bekerja">Ibu Rumah Tangga</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Ibu per bulan</label>
                                                <select class="form-control" name="ibupenghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Ibu</label>
                                                <input name="ibutelepon" type="text" class="form-control" maxlength="15">
                                            </div>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <br>


                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIK Wali</label>
                                                <input name="walinik" type="text" class="form-control" placeholder="NIK Wali" maxlength="16">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nama Wali</label>
                                                <input name="walinama" type="text" class="form-control" placeholder="Nama Wali" maxlength="40">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tahun Lahir Wali</label>
                                                <input name="tahunwali" type="text" class="form-control" placeholder="Tahun Lahir" maxlength="4">
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pendidikan Wali</label>
                                                <select class="form-control" name="walipendidikan">
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">SMP</option>
                                                    <option value="SMA">SMA/SMK/Sederajat</option>
                                                    <option value="S1">S1/Sederajat</option>
                                                    <option value="S2">S2</option>
                                                    <option value="S3">S3</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Pekerjaan Wali</label>
                                                <select class="form-control" name="walipekerjaan">
                                                    <option value="Tidak Bekerja">Tidak Bekerja</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                    <option value="PHL">Pekerja Harian Lepas</option>
                                                    <option value="TNI/Polri">TNI/Polri</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Pensiun">Pensiun</option>
                                                </select>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Penghasilan Wali per bulan</label>
                                                <select class="form-control" name="walipenghasilan">
                                                    <option value="<500.000">< Rp500.000</option>
                                                    <option value="500.000-1.000.000">Rp500.000-Rp1.500.000</option>
                                                    <option value="1.500.000-3.500.000">Rp1.500.000-Rp3.500.000</option>
                                                    <option value="3.000.000-5.000.000">Rp3.500.000-Rp5.000.000</option>
                                                    <option value="5.000.000-10.000.000">Rp5.000.000-Rp10.000.000</option>
                                                    <option value="10.000.000-20.000.000">Rp10.000.000-20.000.000</option>
                                                    <option value=">20.000.000">> Rp20.000.000</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No Telepon Wali</label>
                                                <input name="walitelepon" type="text" class="form-control" maxlength="15">
                                                <input type="hidden" value="<?= $userid ?>" name="id">
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row freak mt-2 mb-2" style="display: flex; justify-content: center;">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Data Rincian Peserta Didik</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                    <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Tinggi Badan</label>
                                                <input name="tinggibadan" type="text" class="form-control" placeholder="Tinggi Badan" maxlength="3">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Berat Badan</label>
                                                <input name="beratbadan" type="text" class="form-control" placeholder="Berat Badan" maxlength="3">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jarak Rumah ke Sekolah</label>
                                                <input name="jarakrumah" type="text" class="form-control" placeholder="Jarak Rumah dalam Kilometer" maxlength="3">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Waktu Tempuh ke Sekolah</label>
                                                <input name="waktutempuh" type="text" class="form-control" placeholder="Waktu Tempuh dalam Jam" maxlength="2">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jumlah Saudara Kandung</label>
                                                <input name="jumlahsaudara" type="text" class="form-control" placeholder="Sebutkan dalam Angka" maxlength="1">
                                            </div>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="row freak mt-2 mb-2" style="display: flex; justify-content: center;">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Registrasi Peserta Didik</h2>
                                </div>
                                <div class="market-status-table mt-4">
                                    <div class="table-responsive" style="overflow-x:hidden;">
                                        
                                    <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <input name="jurusan" type="text" class="form-control" placeholder="Jurusan yang DIpilih" maxlength="60">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Jenis Pendaftaran</label>
                                                <input name="jenispendaftaran" type="text" class="form-control" placeholder="Siswa Baru/Pindahan/Kembali Bersekolah" maxlength="66">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input name="nis" type="text" class="form-control" placeholder="Nomor Induk Peserta" maxlength="12">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Sekolah Asal</label>
                                                <input name="sekolahasal" type="text" class="form-control" placeholder="Nama Sekolah Asal" maxlength="40">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>Nomor Peserta Ujian</label>
                                                <input name="nopesertaujian" type="text" class="form-control" placeholder="Nomor Peserta Ujian" maxlength="12">
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No. Seri Ijazah</label>
                                                <input name="noijazah" type="text" class="form-control" placeholder="Nomor Seri Ijazah" maxlength="12">
                                            </div>
                                            </div>
                                            <div class="col">
                                            <div class="form-group">
                                                <label>No. Seri SKHUS</label>
                                                <input name="noskhus" type="text" class="form-control" placeholder="Nomor Seri SKHUS" maxlength="40">
                                            </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="modal-footer">
					                        <a class="btn btn-light text-dark text-align-right" style="float:right" href="index.php">Sebelumnya</a>
                                            <input type="submit" name="submit" class="btn btn-dark text-light " value="Simpan">
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                </div>         
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->

        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>Formulir - M Ilyas Arman S</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="../assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="../assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>   
    <script src="../assets/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>   
    <script src="../assets/js/app.js"></script>
</body>

</html>
