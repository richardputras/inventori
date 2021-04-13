<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Form Pengajuan</title>
	<!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets/bundles/slider/css/slider.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bundles/pretty-checkbox/pretty-checkbox.min.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
	<style>
        .breadcrumb {
            margin: -60px -30px 40px -30px;
            background: #f6f6f6;
            border: 0px;
            box-shadow: none;
            border-radius: 0px;
            padding: 8px 15px;
            list-style: none;
        }

        .breadcrumb>li {
            display: inline-block;
            text-shadow: 0 1px 0 #fff;
        }

        .breadcrumb a {
            color: #aaa;
            text-shadow: 0px 1px 1px #fff;
        }
		.canvas{
			background: #fff;border: 1px solid #000
		}
		.wrapper{
			background: #fff;width: 280px;padding: 10px;
		}
	</style>
</head>

<body>
<div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="dashboard.php">
                            <span class="logo-name">Inventaris</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="database"></i>
                                <span>Data Master</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/user.php">Data Pengguna</a></li>
                                <li><a class="nav-link" href="admin/karyawan.php">Data Karyawan</a></li>
                                <!-- <li><a class="nav-link" href="admin/jabatan.php">Data Jabatan</a></li> -->
                                <li><a class="nav-link" href="admin/barang.php">Data Barang</a></li>
                                <li><a class="nav-link" href="admin/konsumsi.php">Data Konsumsi</a></li>
                                <li><a class="nav-link" href="admin/supplier.php">Data Supplier</a></li>
                                <li><a class="nav-link" href="admin/rpp.php">Data RPP</a></li>
                                <li><a class="nav-link" href="admin/kelas.php">Data Kelas</a></li>
                                <li><a class="nav-link" href="admin/murid.php">Data Murid</a></li>
                                <li><a class="nav-link" href="admin/tuton.php">Data Tuton</a></li>
                                <!-- <li><a class="nav-link" href="admin/banksoal.php">Data Soal</a></li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i>
                                <span>Transaksi</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/perbaikan.php">Perbaikan</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="flag"></i>
                                <span>Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="admin/laporanbrg.php">Laporan Data Barang</a></li>
                                <li><a class="nav-link" href="admin/laporankrywn.php">Laporan Data Karyawan</a></li>
                            </ul>
                        </li>
                        <li class="dropdowm">
                            <a class="nav-link" href="admin/history.php"><i data-feather="rotate-ccw"></i>History</a>
                        </li>
                        <li class="dropdowm">
                            <a class="nav-link" href="form_pengajuan.php"><i data-feather="file-text"></i>Form Pengajuan</a>
                        </li>
                        <li class="menu-header">Settings</li>
                        <li class="dropdown">
                            <a href="change_password.php" class="nav-link"><i data-feather="lock"></i><span>Change Password</span></a>
                            <a href="logout.php" class="nav-link"><i data-feather="log-out"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </aside>
            </div>	

			<!-- Main Content -->
            <div class="main-content">
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="dashboard.php">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>Dashboard</li>
                </ul>
                <section class="section">
					<div class="section-body">
            			<div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                <div class="card-header">
                                    <h4>Permintaan Karyawan</h4>
                                </div>
                                <div class="card-body">
                                    <form id="wizard_with_validation" method="POST">
                                    <h3>Kebutuhan Jabatan</h3>
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Jabatan yang dibutuhkan</label>
                                                <input type="text" class="form-control" name="jabatan">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Divisi</label>
                                                <input type="text" class="form-control" name="divisi">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Jumlah yang diperlukan</label>
                                                <input type="number" class="form-control" name="jumlah">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Tanggal Permintaan</label>
                                                <input type="text" class="form-control datepicker" name="permintaan">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Tanggal/Bulan Diperlukan</label>
                                                <input type="text" class="form-control datepicker" name="keperluan">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Range Gaji</label> <br />
                                                <b>1000000</b> <input id="ex2" type="text" class="span2" value="" data-slider-min="1000000" data-slider-max="10000000" data-slider-step="5" data-slider-value="[2500000,4500000]"/> <b>10000000</b>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Tingkat</label>
                                                <select class="form-control select2" name="tingkat">
                                                    <option value="">Non Staff</option>
                                                    <option value="">Staff</option>
                                                    <option value="">Supervisor</option>
                                                    <option value="">Asisten Manajer</option>
                                                    <option value="">Manajer</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Kualifikasi</h3>
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Gender</label> <br />
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="gender[]" class="form-control" value="L" />
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>Laki-Laki</label>        
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="gender[]" class="form-control" value="P" />
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>Perempuan</label>        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label" for="usia">Range Usia</label>
                                                <input type="range" class="form-control" min="18" max="40" value="" id="usia" oninput="nilai(value)">
                                                <output for="usia" id="age">29</output>
                                                <script>
                                                    function nilai(usia) {
                                                        document.querySelector('#age').value = usia;
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Pendidikan</label> <br />
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="jenjang[]" class="form-control">
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>SMA/K</label>        
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="jenjang[]" class="form-control">
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>Diploma</label>        
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="jenjang[]" class="form-control">
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>S1</label>        
                                                    </div>
                                                </div>
                                                <div class="pretty p-icon p-smooth">
                                                    <input type="checkbox" name="jenjang[]" class="form-control">
                                                    <div class="state p-success">
                                                        <i class="icon fa fa-check"></i>
                                                        <label>S2</label>        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">IPK Minimal</label>
                                                <input type="text" name="ipk" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Pengalaman Bekerja</label>
                                                <textarea name="exp" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Keahlian Khusus</label>
                                                <textarea name="special" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Main Skill</label>
                                                <textarea name="main" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Secondary Skill</label>
                                                <textarea name="secondary" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Soft Skill</label>
                                                <textarea name="soft" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Additional Requirement</label>
                                                <textarea name="additional" class="form-control" placeholder="Cth: Menikah/Berhijab/Agama tertentu"></textarea>
                                            </div>
                                        </div>  
                                    </fieldset>
                                    <h3>Terms &amp; Conditions - Finish</h3>
                                    <fieldset>
                                        <canvas class="canvas"></canvas>
							            <div class="wrapper">
								            <center><button class="btn">Simpan</button></center>
							            </div>
                                    </fieldset>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="assets/bundles/jquery-steps/jquery.steps.min.js"></script>
<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bundles/slider/js/bootstrap-slider.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/form-wizard.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>

<script>
    $("#ex2").slider({});
</script>
<script type="text/javascript">

	var canvas = document.querySelector("canvas");

    var signaturePad = new SignaturePad(canvas);
	
	$(document).on('click','.btn',function(){
		var signature =	signaturePad.toDataURL(); 

		$.ajax({
			url: "simpan.php",
			data :{
				foto: signature,
			},
			method: "POST",
			success:function(){

				location.reload();
			}

		})
	})
</script>

</body>
</html>