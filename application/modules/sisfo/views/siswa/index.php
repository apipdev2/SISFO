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
            <div class="btn-list">

                <a href="<?= base_url('sisfo/Siswa/tambah'); ?>" class="btn btn-success d-none d-sm-inline-block"><i class="fas fa-user-plus"></i>
                    Tambah
                </a>
                 <a href="#" class="btn btn-info d-none d-sm-inline-block"><i class="fas fa-download"></i>
                    Import
                </a>
                <a href="#" class="btn btn-secondary d-none d-sm-inline-block"><i class="fas fa-print"></i>
                    Cetak
                </a>

            </div>
          </div>
      </div>
    </div>
  </div>
  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">

        <div class="card">
            <div class="card-body">
              <div  class="table-responsive read">

                <table class="table datatable" id="dt">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tgl Lahir</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-tbody">
                      <?php $no=1; foreach ($siswa as $row): ?>
                        <tr>
                          <td><?= $no++;?></td>
                          <td><?= $row->nama_peserta; ?></td>
                           <td><?= $row->jenis_kelamin; ?></td>
                          <td><?= $row->tempat_lahir; ?></td>
                          <td><?= date('d-m-Y',strtotime($row->tanggal_lahir)); ?></td>
                          <td><?= $row->asal_sekolah; ?></td>
                          <td>
                            <?php if ($row->status  == "Y"): ?>
                              <div class="fas fa-check-circle text-success"></div>
                              
                            <?php else : ?>
                              <div class="fas fa-window-close text-danger"></div>
                            <?php endif ?>  
                          </td>
                          <td>
                            <a href="" class="fas fa-search text-secondary"></a>
                            <a href="<?= base_url('sisfo/Siswa/edit/'.encrypt_url($row->id_siswa)); ?>" class="fas fa-edit text-info"></a>
                           <a href="#" data-bs-toggle="modal" data-bs-target="#modal-del<?= $row->id_siswa;?>" class="fas fa-trash text-danger"></a>
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


   <?php foreach ($siswa as $row): ?>


  <!-- modal del -->
  <div class="modal modal-blur fade" id="modal-del<?= $row->id_siswa;?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Anda yakin?</div>
            <div>Jika anda tekan yes, maka data <b><?= $row->nama_peserta; ?></b> akan terhapus dari system.!</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="<?= base_url('sisfo/Siswa/hapus/'.encrypt_url($row->id_siswa)); ?>" class="btn btn-danger" >Yes, Delete data</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach ?>
