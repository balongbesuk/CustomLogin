<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * File ini:
 *
 * View Masuk Layanan Mandiri
 *
 * donjo-app/views/layanan_mandiri/masuk.php
 *
 */

/**
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package	OpenSID
 * @author	Tim Pengembang OpenDesa
 * @copyright	Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright	Hak Cipta 2016 - 2020 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license	http://www.gnu.org/licenses/gpl.html	GPL V3
 * @link 	https://github.com/OpenSID/OpenSID
 */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		<?=$this->setting->login_title
			. ' ' . ucwords($this->setting->sebutan_desa)
			. (($header['nama_desa']) ? ' ' . $header['nama_desa']: '')
			. get_dynamic_title_page_from_path();
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<?php if (is_file(LOKASI_LOGO_DESA . "favicon.ico")): ?>
		<link rel="shortcut icon" href="<?= base_url()?><?= LOKASI_LOGO_DESA?>favicon.ico" />
	<?php else: ?>
		<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url()?>rss.xml" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/siteman_mandiri.css" media="screen" type="text/css"/>
	<?php if (is_file("desa/pengaturan/siteman/siteman_mandiri.css")): ?>
		<link type='text/css' href="<?= base_url()?>desa/pengaturan/siteman/siteman_mandiri.css" rel='Stylesheet' />
	<?php endif; ?>
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>

	<?php if ($cek_anjungan): ?>
		<!-- Keyboard Default (Ganti dengan keyboard-dark.min.css untuk tampilan lain)-->
		<link rel="stylesheet" href="<?= base_url("assets/css/keyboard.min.css")?>">
		<link rel="stylesheet" href="<?= base_url("assets/front/css/mandiri-keyboard.css")?>">
	<?php endif; ?>

	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
	<?php $this->load->view('head_tags'); ?>
</head>
<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form class="sign-in-form" id="validasi" action="<?= $form_action; ?>" method="post">
				    <a href="<?=site_url(); ?>" style="text-align: center"><img src="<?=gambar_desa($header['logo']);?>" alt="<?=$header['nama_desa']?>"
						class="img-responsive" style="margin: auto" /></a>
					<h2 class="title" style="text-align:center">Layanan Mandiri</h2>
					<?php if ($this->session->mandiri_wait == 1): ?>
						<div class="error login-footer-top">
							<p id="countdown"></p>
						</div>
						<?php else: ?>
							<?php $data = $this->session->flashdata('notif'); ?>
							<?php if (! $this->session->login_ektp): ?>
								<?php if ($this->session->mandiri_try < 4): ?>
									<div class="error" id="notif">
										<p>NIK atau PIN salah.<br/>Kesempatan mencoba <?= ($this->session->mandiri_try - 1); ?> kali lagi.</p>
									</div>
								<?php endif; ?>
								<div class="input-field">
									<i class="fas fa-user"></i>
									<input type="text" autocomplete="off" class="form-control required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvnumber'); ?>" name="nik" placeholder="NIK">
								</div>
								<div class="input-field">
									<i class="fas fa-lock"></i>
									<input type="password" autocomplete="off" class="form-control required <?= jecho($cek_anjungan['keyboard'] == 1, TRUE, 'kbvnumber'); ?>" name="pin" placeholder="PIN" id="pin">
								</div>
								<label class="form-group">
									<input type="checkbox" id="checkbox"> Tampilkan PIN
								</label>
								<button type="submit" class="btn solid">Masuk</button>
								<a href="<?= site_url("layanan_mandiri/masuk_ektp")?>" class="btn solid link">Masuk dengan e-KTP</a>
						<?php else: ?>
							<?php if ($this->session->mandiri_try < 4): ?>
								<div class="error" id="notif">
									<p>PIN ATAU ID E-KTP salah.<br/>Kesempatan mencoba <?= ($this->session->mandiri_try - 1); ?> kali lagi.</p>
								</div>
							<?php endif; ?>
							<div class="login-footer-top">
								<?php if ($cek_anjungan): ?>
									Tempel E-KTP di CardReader
								<?php endif; ?>
								<div class="thumbnail">
									<img src="<?= base_url('assets/images/camera-scan.gif')?>" alt="scanner" class="center" style="width:100%">
								</div>
							</div>
							<?php if (! $cek_anjungan): ?>
								<div class="input-field">
									<i class="fas fa-lock"></i>
									<input type="password" class="form-control required number" name="pin" placeholder="Masukan PIN" id="pin" autocomplete="off">
								</div>
							<?php endif; ?>
							<div class="input-field" style="<?= jecho($cek_anjungan == 0 || ENVIRONMENT == 'development', FALSE, 'width: 0; overflow: hidden;'); ?>">
								<i class="fas fa-user"></i>
								<input name="tag" id="tag" autocomplete="off" placeholder="Tempel E-KTP di CardReader" class="form-control required number" type="password" onkeypress="if (event.keyCode == 13){$('#'+'validasi').attr('action', '<?= $form_action; ?>');$('#'+'validasi').submit();}">
							</div>
							<a href="<?= site_url("layanan_mandiri/masuk")?>" class="btn solid link">MASUK DENGAN NIK
							</a>

						<?php endif; ?>
					<?php endif ?>
				</form>
			</div>
		</div>

		<div class="panels-container">
			<div class="panel left-panel">
				<img src="<?= base_url()?>desa/pengaturan/siteman/images/log.svg" class="image">
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>One of us ?</h3>
					<p>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
						laboriosam ad deleniti.
					</p>
					<button class="btn transparent" id="sign-in-btn">
						Sign in
					</button>
				</div>
				<img src="img/register.svg" class="image" alt="" />
			</div>
		</div>
	</div>
	<!-- jQuery 3 -->
	<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?= base_url()?>assets/bootstrap/js/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url()?>assets/bootstrap/js/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url()?>assets/js/adminlte.min.js"></script>
	<!-- Validasi -->
	<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
	<script src="<?= base_url()?>assets/js/validasi.js"></script>
	<script src="<?= base_url()?>assets/js/localization/messages_id.js"></script>

	<?php if ($cek_anjungan): ?>
		<!-- keyboard widget css & script -->
		<script src="<?= base_url("assets/js/jquery.keyboard.min.js")?>"></script>
		<script src="<?= base_url("assets/js/jquery.mousewheel.min.js")?>"></script>
		<script src="<?= base_url("assets/js/jquery.keyboard.extension-all.min.js")?>"></script>
		<script src="<?= base_url("assets/front/js/mandiri-keyboard.js")?>"></script>
	<?php endif; ?>
	<script type="text/javascript">
	$('document').ready(function() {

		<?php if ($this->session->login_ektp): ?>
			<?php if (! $cek_anjungan): ?>
			$('#pin').focus();
			<?php else: ?>
			$('#tag').focus();
			<?php endif; ?>
		<?php endif; ?>

		var pass = $("#pin");
		$('#checkbox').click(function() {
			if (pass.attr('type') === "password") {
				pass.attr('type', 'text');
			} else {
				pass.attr('type', 'password')
			}
		});

		if ($('#countdown').length) {
			start_countdown();
		}

		window.setTimeout(function() {
			$("#notif").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 5000);
	});

	function start_countdown() {
		var times = eval(<?= json_encode($this->session->mandiri_timeout)?>) - eval(<?= json_encode(time())?>);
		var menit = Math.floor(times / 60);
		var detik = times % 60;

		timer = setInterval(function() {
			detik--;
			if (detik <= 0 && menit >=1) {
				detik = 60;
				menit--;
			}
			if (menit <= 0 && detik <= 0) {
				clearInterval(timer);
				location.reload();
			} else {
				document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
			}
		}, 500);
	}
	</script>
</body>
</html>
