<!DOCTYPE html>
<html>
<head>
	<title>Data Presensi Guru</title>
	<style>
		body{
			margin: 20px;
		}
		#data{
			border-collapse: collapse;
			text-align: left;
			font-size: 14px;

		}
		#data th,td{
			border : 1px solid #000;
			padding: 8px;

		}
		#data th{
			background-color: #95a5a6;
		}

		#header{
			border-collapse: collapse;
			text-align: left;
		}
		#header td{
			border:none;
			padding: 1px;
		}

	</style>
</head>
<body>

	<h3 style="text-align: center;">Rekapitulasi Data Presensi Guru</h3><hr>
	<table width="30%" id="header">
		<tr>
			<td>Tahun Ajaran</td><td>:</td><td><?= $tahunajaran->tahun_ajaran;?></td>
		</tr>
		<tr>
			<td>Tanggal</td><td>:</td><td><?= date_indo($this->uri->segment(4));?></td>
		</tr>
		<tr>
			<td>Sampai</td><td>:</td><td><?= date_indo($this->uri->segment(5));?></td>
		</tr>
	</table>
	<br>
	<table width="100%" id="data">
        <tr>
          <th>No</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Hadir</th>
          <th>Izin</th>
          <th>Sakit</th>
          <th>Alfa</th>
        </tr>
       <?php $no=1; foreach ($phguru as $row): ?>
       	<tr>
       		<td><?= $no++;?></td>
       		<td><?= $row['nip'];?></td>
       		<td><?= $row['nama_lengkap'];?></td>
       		<td><?= $row['hadir'];?></td>
       		<td><?= $row['izin'];?></td>
       		<td><?= $row['sakit'];?></td>
       		<td><?= $row['alfa'];?></td>
       	</tr>
       <?php endforeach ?>
    </table>





</body>
</html>