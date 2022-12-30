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

             <!-- col -->
              <div class="col-12">
                <div class="row row-cards">

                  <?php foreach ($rombel as $rombel): ?>
                    
                    <!-- card -->
                  <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                              <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?= $rombel->kelas; ?>
                            </div>
                            <div class="text-muted">
                              <?php
                               $jml = $this->db->get_where('riwayatkelas',['id_kelas'=>$rombel->id_kelas])->num_rows();
                               echo $jml.' Peserta';
                              ?>
                            </div>
                              <a href="<?= base_url('sisfo/Rombel/view/'.encrypt_url($rombel->id_kelas)); ?>" ><i class="fas fa-search"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- end card -->

                  <?php endforeach ?>
                


                </div>
              </div>
              <!-- end col -->

             
            </div>
        </div>

      <!-- end content -->
    </div>
  </div>