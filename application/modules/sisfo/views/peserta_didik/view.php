<div class="row">

  <div class="col-md-3">
    <img src="" alt="ini foto" width="300">
  </div>

  <div class="col-md-7">
    <table width="100%">
      <tr><th>NIS</th><td>:</td><td><?= $siswa->nis;?></td></tr>
      <tr><th>Nama</th><td>:</td><td><?= $siswa->nama_peserta;?></td></tr>
      <tr><th>Jenis Kelamin</th><td>:</td><td><?= $siswa->jenis_kelamin;?></td></tr>
      <tr><th>Tempat, Tanggal Lahir</th><td>:</td><td><?= $siswa->tempat_lahir.', '.date_indo($siswa->tanggal_lahir);?></td></tr>
      <tr><th>Kelas</th><td>:</td><td><?= $siswa->kelas;?></td></tr>
      <tr><th>Jurusan</th><td>:</td><td><?= $siswa->jurusan;?></td></tr>
      <tr><th>Agama</th><td>:</td><td><?= $siswa->agama;?></td></tr>
      <tr><th>Alamat</th><td>:</td><td><?= $siswa->alamat;?></td></tr>
    </table>
  </div>
</div>