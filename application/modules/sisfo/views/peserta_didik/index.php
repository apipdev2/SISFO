<!-- Page header -->
 <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            <?= $title; ?>
          </h2>
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
                        <th>Kelas</th>
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
                          <td><?= $row->kelas; ?></td>
                          <td>
                            <?php if ($row->status_siswa  == "Y"): ?>
                              <div class="fas fa-check-circle text-success"></div>
                              
                            <?php else : ?>
                              <div class="fas fa-window-close text-danger"></div>
                            <?php endif ?>  
                          </td>
                          <td>
                            <a href="" class="fas fa-search text-secondary"></a>
                            
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