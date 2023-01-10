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

	<h3 style="text-align: center;"><?= $title; ?></h3>

	<table class="title" width="50%">
		<tr><th>Tahun Ajaran</th><th>:</th><th><?= $tahunajaran->tahun_ajaran;?></th></tr>
		<tr><th>Jurusan</th><th>:</th><th><?= $kelas->jurusan;?></th></tr>
		<tr><th>Kelas</th><th>:</th><th><?= $kelas->kelas;?></th></tr>
	</table>
	<br>

	<table class="demo-table" width="100%">
	  <thead style="background: #2d3436; color: #fff;">
	    <tr>
	      <th>No</th>
	      <th>NIS</th>
	      <th>Nama</th>
	      <th>JK</th>
	      <th>Tempat Lahir</th>
	      <th>Tgl Lahir</th>
	      <th>Kelas</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php $no=1; foreach ($peserta as $row): ?>
	  	<tr>
	  	  <td><?= $no++;?></td>
	  	  <td><?= $row->nis; ?></td>
	      <td><?= $row->nama_peserta; ?></td>
	      <td><?= $row->jenis_kelamin; ?></td>
	      <td><?= $row->tempat_lahir; ?></td>
	      <td><?= date_indo($row->tanggal_lahir); ?></td>
	      <td><?= $row->kelas; ?></td>
	     </tr>	    	
	  	<?php endforeach ?>	    
	  </tbody>
	</table>
</body>
</html>