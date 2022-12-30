<!-- Page header -->
 <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            <?= $title; ?>
          </h2>
        </div>

        <!-- Page title actions -->
        <div class="col-12 col-md-auto ms-auto d-print-none">
           
          </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">

        <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">

              <div class="form-group mb-3 row">
                <label class="col-3 col-form-label">Tahun Ajaran</label>
                <div class="col">
                  <input type="text" name="id_tahun" class="form-control" value="<?= $tahunajaran->tahun_ajaran; ?>" disabled >
                </div>
              </div>

            </div>

            <div class="col-6">

              <div class="form-group mb-3 row">
                <label class="col-3 col-form-label">Kelas</label>
                <div class="col">
                  <input type="text" name="id_kelas" class="form-control" value="<?= $kelas->kelas; ?>" disabled >
                </div>
              </div>
              
            </div>

          </div>
        </div>           
            <div class="card-body">
              <div  class="table-responsive read">
                <a href="" class="btn btn-success mb-2"  data-bs-toggle="modal" data-bs-target="#modal-add" ><i class="fas fa-user-plus"></i> Tambah Peserta Didik</a>
                <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($pd as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->nama_peserta; ?></td>
                           <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->kelas; ?></td>
                          <td>
                            <?php if ($row->status_siswa  == "Y"): ?>
                              <div class="fas fa-check-circle text-success"></div>
                              
                            <?php else : ?>
                              <div class="fas fa-window-close text-danger"></div>
                            <?php endif ?>  
                          </td>
                          <td>
                           <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_riwayat;?>" class="fas fa-trash text-danger"></a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>


              </div>
            </div>
        </div>

      <!-- end content -->
    </div>
  </div>

    <!-- add modal -->
  <div class="modal modal-blur fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Peserta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('sisfo/Rombel/addPeserta'); ?>" method="post">
          <div class="modal-body">

            <input type="hidden" name="id_kelas" value="<?= $kelas->id_kelas; ?>">

             <div class="table-responsive">
                <table class="table datatable" id="dt">
                 <thead>
                   <tr>
                     <td>#</td>
                     <th>Nama</th>
                     <th>JK</th>
                     <th>Tempat Lahir</th>
                     <th>Tgl Lahir</th>
                     <th>Asal Sekolah</th>
                   </tr>
                 </thead>
                  <tbody class="table-tbody">
                      <?php foreach ($siswa as $row): ?>
                        <tr>
                          <td><input type="checkbox" name="id_siswa[]"  value="<?= $row->id_siswa; ?>"></td>
                          <td><?= $row->nama_peserta; ?></td>
                          <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->asal_sekolah; ?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
               </table>
             </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit"  class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>

   <?php foreach ($pd as $row): ?>


  <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_riwayat;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <b><?= $row->nama_peserta; ?></b> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Rombel/hapusPeserta/'.encrypt_url($row->id_riwayat).'/'.encrypt_url($row->id_kelas)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>

