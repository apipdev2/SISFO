<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/menu/logo-sisfo.png'); ?>">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SISFO | Akademik</title>
    <style>
    	.gradient{
    		background: rgb(0,176,255);
			background: linear-gradient(90deg, rgba(0,176,255,1) 0%, rgba(229,5,244,1) 97%);
			
    	}
    	.col-md-2{
    		padding: 10px;
    		opacity: 70%;
    	}
    	.col-md-2:hover{
		    opacity: 100%;
    	}

    </style>
  </head>
  <body class="gradient">

  	<div class="container">
  	<!-- header -->
  	<div class="header mt-4">
  		<div class="text-center text-white">
  			
		  	<img src="<?= base_url('assets/img/menu/logo-sisfo.png'); ?>" width="100" alt="...">
		    <!-- <h1>SISFO AKADEMIK</h1> -->
		    <h2><?= $sekolah->nama_sekolah; ?></h2>

  		</div>
  	</div>

  	<!-- menu -->
  	<div class="col-md-12 mt-3">
  		<div class="row">
  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="<?= base_url('sisfo/auth'); ?>" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/academic-cap.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Akademik
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="<?= base_url('infoguru/auth'); ?>" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/guru.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Info Guru
  					</p>
  				</a>
  			</div>

        <div class="col-md-2 d-flex justify-content-center">
          <a href="#" style="text-decoration: none;">
            <img src="<?= base_url('assets/img/menu/student.png'); ?>" width="120" class="rounded" alt="...">
            <p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
              Info Siswa
            </p>
          </a>
        </div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/money.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Keuangan
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/presensi.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Presensi
  					</p>
  				</a>
  			</div>
  			

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/graduates.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						PPDB
  					</p>
  				</a>
  			</div>

  		</div>

  		<div class="row">
  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/perpus.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Perpustakaan
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/konseling.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						E-BK
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/bkk.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						BKK
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/elearning.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Elearning
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/arsip-surat.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						Arsip Surat
  					</p>
  				</a>
  			</div>

  			<div class="col-md-2 d-flex justify-content-center">
  				<a href="#" style="text-decoration: none;">
  					<img src="<?= base_url('assets/img/menu/rapor.png'); ?>" width="120" class="rounded" alt="...">
  					<p class="text-white text-center mt-3 " style="border:2px solid #fff; border-radius:10px;">
  						E-Rapor
  					</p>
  				</a>
  			</div>
  		</div>
  	</div>

  	</div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>