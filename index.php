<?php
include "database.php";
$que = mysqli_query($db_conn, "SELECT * FROM un_konfigurasi");
$hsl = mysqli_fetch_array($que);
$timestamp = strtotime($hsl['tgl_pengumuman']);
//echo $timestamp;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="aplikasi untuk menampilkan pengumuman kelulusan peserta didik dan cetak SKL secara online">
    <meta name="author" content="#">
	<link rel="shortcut icon" href="images/logo_tut_wuri.png">	
    <title>Pengumuman Kelulusan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/kelulusan.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="./">Info <?=$hsl['sekolah'] ?></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="./">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
	<br />
    <div class="container">
	<div align="center"> <img src="images/logo-smk.png" alt="" witdh ="150" height="150"></div>
    <h2><center><b>PENGUMUMAN KELULUSAN <?=$hsl['tahun'] ?></b></center></h2>
	<br />
	<!-- countdown -->
		
		<div id="clock" class="lead"></div>
		
		<div id="xpengumuman">
		<?php
		if(isset($_REQUEST['submit'])){
			//tampilkan hasil queri jika ada
			$no_ujian = $_REQUEST['nomor'];
			
			$hasil = mysqli_query($db_conn,"SELECT * FROM un_siswa WHERE no_ujian='$no_ujian'");
			if(mysqli_num_rows($hasil) > 0){
				$data = mysqli_fetch_array($hasil);
				
		?>
			<div align='center'><b>Berdasarkan Hasil Rapat Dewan Guru SMK Negeri 1 Binuang yang dilaksanakan hari Jumat, tanggal 01 Mei 2020  diputuskan bahwa :</b></div>
			<br />
			<table class="table table-bordered">
				<tr><td>Nomor Peserta Ujian</td><td><?php echo $data['no_ujian']; ?></td></tr>
				<tr><td>Nama Siswa</td><td><?php echo $data['nama']; ?></td></tr>
				<tr><td>Kompetensi Keahlian</td><td><?php echo $data['komli']; ?></td></tr>
			</table>
			
			<?php
			if( $data['status'] == 1 ){
				echo '<div class="alert alert-success" role="alert"><strong><center>SELAMAT ! Anda dinyatakan :</strong><b><p style="font-size:30px">" L U L U S "</p></center></b></div>';
				echo '<div align="center"><b>Dalam Menempuh Pendidikan di SMK Negeri 1 Binuang, Tahun Pelajaran 2019/2020</b></div><br />';?>
				<div align="center"><a href="cetakpdf.php?no_ujian=<?= $no_ujian; ?> " class="btn btn-success">Cetak Surat Keterangan Lulus</a></div><?php
				} else {
				echo '<div class="alert alert-danger" role="alert"><strong><center>M A A F ! Anda dinyatakan :</strong><b><p style="font-size:30px">" TIDAK LULUS "</p></center></b></div>';
				echo '<div align="center"><b>Dalam Menempuh Pendidikan di SMK Negeri 1 Binuang, Tahun Pelajaran 2019/2020</b></div><br />';
				}	
			?>
			
<!--			<div align='center'><b>Dalam Menempuh Pendidikan di SMK Negeri 1 Binuang, Tahun Pelajaran 2019/2020</b></div>
			<br />
			<div align='center'><a href='cetakpdf.php?no_ujian=<?= $no_ujian; ?> ' class='btn btn-success'>Cetak Surat Keterangan Lulus</a></div> -->
		<?php
			} else {
				echo 'Nomor peserta ujian yang Anda inputkan tidak ditemukan! Mohon periksa kembali nomor peserta ujian Anda.';
				//tampilkan pop-up dan kembali tampilkan form
			}
		} else {
			//tampilkan form input nomor ujian
		?>
        <p><center>Silahkan Masukkan Nomor Peserta Ujian (contoh : 06-0003-0001-x) :</center></p>
        <form method="post">
            <div class="input-group">
                <input type="text" name="nomor" class="form-control" data-mask="06-0003-9999-9" placeholder="Contoh : 06-0003-0001-x" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit">Periksa!</button>
                </span>
            </div>
        </form>
		<?php
		}
		?>
		</div>
    </div><!-- /.container -->
	
	<footer class="footer">
		<div class="container">
			<p class="text-muted">&copy; <?=$hsl['tahun'] ?> &middot; Tim IT <?=$hsl['sekolah'] ?></p>
		</div>
	</footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript">
	var skrg = Date.now();
	$('#clock').countdown("<?=$hsl['tgl_pengumuman'] ?>", {elapse: true})
	.on('update.countdown', function(event) {
	var $this = $(this);
	if (event.elapsed) {
		$( "#xpengumuman" ).show();
		$( "#clock" ).hide();
	} else {
		$this.html(event.strftime('<h3><center><p style="color:red"><b>Pengumuman dapat dilihat : <span><br>%D Hari %H Jam %M Menit %S Detik lagi.</span>'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
</body>
</html>