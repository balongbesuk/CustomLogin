<?php
/**
 * File ini:
 *
 * Form setting password modul Admin
 *
 * donjo-app/views/setting_pwd.php
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
	<meta charset="UTF-8">
	<title>
		<?=$this->setting->login_title
				. ' ' . ucwords($this->setting->sebutan_desa)
				. (($header['nama_desa']) ? ' ' . $header['nama_desa']: '')
				. get_dynamic_title_page_from_path();
			?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<?php if (is_file("desa/pengaturan/siteman/siteman.css")): ?>
	<link type='text/css' href="<?= base_url()?>desa/pengaturan/siteman/siteman.css" rel='Stylesheet' />
	<?php endif; ?>
	<?php if (is_file(LOKASI_LOGO_DESA ."favicon.ico")): ?>
	<link rel="shortcut icon" href="<?= base_url()?><?=LOKASI_LOGO_DESA?>favicon.ico" />
	<?php else: ?>
	<link rel="shortcut icon" href="<?= base_url()?>favicon.ico" />
	<?php endif; ?>
	<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
	<?php require __DIR__ .'/head_tags.php' ?>
</head>

<body class="login">
	<img class="wave" src="<?= base_url()?>desa/pengaturan/siteman/images/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?= base_url()?>desa/pengaturan/siteman/images/bg.svg">
		</div>
		<div class="login-content">
			<form action="<?=site_url("user_setting/update_password/$main[id]")?>" method="POST" id="validasi" enctype="multipart/form-data" style="text-align: center"><img src="<?=gambar_desa($header['logo']);?>" alt="<?=$header['nama_desa']?>"
						class="img-responsive" style="margin: auto" /></a>
				<h2 class="title">Ubah Sandi</h2>
				<div class="error">
					<?php if ($this->session->success == -1): ?>
						<?= $this->session->error_msg ?>
					<?php else: ?>
						Kata sandi anda tidak memenuhi syarat keamanan dan harus diganti
					<?php endif; ?>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Kata sandi lama</h5>
						<input name="pass_lama" type="password"
							<?php jecho($this->session->siteman_wait, 1, "disabled") ?> class="input" required>
						<button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Kata sandi baru</h5>
						<input name="pass_baru" id="pass_baru" type="password"
							<?php jecho($this->session->siteman_wait, 1, "disabled") ?> class="input" required>
							<button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Kata sandi baru (ulangi)</h5>
						<input name="pass_baru1" id="pass_baru1" type="password"
							<?php jecho($this->session->siteman_wait, 1, "disabled") ?> class="input" required>
							<button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
					</div>
				</div>
				<button type="submit" class="btn">Simpan</button>
				<a href="https://github.com/OpenSID/OpenSID" target="_blank" style="text-align:center">OpenSID <?= substr(AmbilVersi(), 0, 11)?></a>
			</form>
		</div>
	</div>
	<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script>
	<script src="<?= base_url()?>assets/js/jquery.validate.min.js"></script>
	<script src="<?= base_url()?>assets/js/validasi.js"></script>
	<script src="<?= base_url()?>assets/js/localization/messages_id.js"></script>
	<script>
		$('document').ready(function()
		{

			$(".reveal").on('click',function() {
				var $pwd = $(this).parent('.div').find(".input");
				var eye = $(this).parent('.div').find("i");
				if ($pwd.attr('type') === 'password') {
					$pwd.attr('type', 'text');
					eye.removeClass('fa-eye');
					eye.addClass('fa-eye-slash');
				} else {
					$pwd.attr('type', 'password');
					eye.removeClass('fa-eye-slash');
					eye.addClass('fa-eye');
				}
			});

			setTimeout(function() {
				$('#pass_baru1').rules('add', {
					equalTo: '#pass_baru'
				})
			}, 500);

		});

		const inputs = document.querySelectorAll(".input");

		function addcl() {
			let parent = this.parentNode.parentNode;
			parent.classList.add("focus");
		}

		function remcl() {
			let parent = this.parentNode.parentNode;
			if (this.value == "") {
				parent.classList.remove("focus");
			}
		}

		inputs.forEach(input => {
			input.addEventListener("focus", addcl);
			input.addEventListener("blur", remcl);
		});
	</script>
</body>

</html>