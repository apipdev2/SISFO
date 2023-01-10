<!DOCTYPE html>
<html>
<head>
	<title><?= $title; ?></title>
	<style type="text/css">
		/* Table */
		body {
			font-family: "lucida Sans Unicode", "Lucida Grande", "Segoe UI", vardana;

			margin:0;
			padding: 10px;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 12px;
			color: #444;
		}


		.demo-table ,th ,td{
			border:1px solid #95a5a6;
			padding: 7px 17px;
		}
		.demo-table tr:nth-child(even) {
		    background-color: #f2f2f2;
		}

	
		.header{
			width:100%;
			margin: 0px;
		}
		.logo{
			width:100px;
			display: inline-block;
			/*background: yellow;*/
		}
		.sekolah{
			width: 550px;
			display: inline-block;	
			/*background: red;*/
		}

		hr{
			border:double;
		}

		.title th{
			border:none;
			padding:1px;
			text-align: left;
			font-size: 13px;
		}


		.foto{
			border:1px solid #000;
			width: 15%;
			height: 100px;
			display: inline-flex;
		}
		.bio{
			/*background: blue;*/
			width: 79%;
			height: 100px;
			display: inline-flex;
		}

		.bio td{
			padding: 3px;
		}
		

		
	</style>
</head>
<body>

	<div class="header" >

			<div class="logo">
				<img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" width="100">
			</div>
		
			<div class="sekolah" style="justify-content: center;" >
				<center>
					
				<h3 style="line-height: 2px;">YAYASAN PEMBINA LEMBAGA PENDIDIKAN (YPLP-PGRI)</h3>
				<h3 style="line-height: 2px;">SMK PGRI 1 BALARAJA</h3>
				<p style="line-height: 1px;">Jl.Raya Balaraja-Cikupa No.2 Balaraja Kabupaten Tangerang 15730 </p>
				<p style="line-height: 1px;">Email : smkpgri1balaraja@gmail.com Website : smkpgri1balara.sch.id </p>
				</center>
			</div>
			<hr style="margin-top: 0px;">
	</div>

	<h3 style="text-align: center;"><?= $title; ?></h3><br>

	<div class="foto">
		<img src="<?= base_url('assets/img/default.jpg'); ?>" alt="logo" width="100">
	</div>
	<div class="bio">
		<table style="width: 100%; border-collapse: collapse;">
			<tr>
				<td width="10">A.</td>
				<td colspan="3">Data Pribadi</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td><?= $peserta->nis; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td><?= $peserta->nama_peserta; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">3.</td>
				<td>Jenis Kelamin</td>
				<td><?= $peserta->jenis_kelamin; ?></td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">4.</td>
				<td>Tempat, Tanggal Lahir</td>
				<td><?= $peserta->tempat_lahir.', '.date_indo($peserta->tanggal_lahir); ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">5.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">6.</td>
				<td>Kelas</td>
				<td><?= $peserta->kelas; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">7.</td>
				<td>Jurusan</td>
				<td><?= $peserta->jurusan; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">8.</td>
				<td>Agama</td>
				<td><?= $peserta->agama; ?></td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">9.</td>
				<td>Alamat</td>
				<td><?= $peserta->alamat; ?></td>
			</tr>

			<tr>
				<td width="10">B.</td>
				<td colspan="3">Data Orang Tua</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
			<tr>
				<td width="10">B.</td>
				<td colspan="3">Data Wali</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
			<tr>
				<td width="5"></td>
				<td width="5">1.</td>
				<td>NIS</td>
				<td>423423</td>
			</tr>

			<tr>
				<td width="5"></td>
				<td width="5">2.</td>
				<td>Nama</td>
				<td>asdfasdfasdfs</td>
			</tr>
		</table>
	</div>


	
</body>
</html>