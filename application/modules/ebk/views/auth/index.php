
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>EBK | <?= $title;?></title>
     <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/menu/logo-sisfo.png'); ?>">
    <!-- CSS files -->
    <link href="<?= base_url('assets/dist/css/tabler.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-flags.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-payments.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/tabler-vendors.min.css');?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/dist/css/demo.min.css');?>" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>
  </head>
  <body  class=" d-flex flex-column bg-white">
    <script src="<?= base_url('assets/dist/js/demo-theme.min.js');?>"></script>
    <div class="row g-0 flex-fill">
      <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
        <div class="container container-tight my-5 px-lg-5">
          <div class="text-center mb-4">
            <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('assets/img/instansi/'.$sekolah->logo);?>" height="80" alt=""></a>
            <h2><?= $sekolah->nama_sekolah; ?></h2>
          </div>
          <?= $this->session->flashdata('message'); ?>
         
          <form action="<?= base_url('ebk/Auth'); ?>" method="post">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="your@email.com"  value="<?= set_value('email'); ?>">
              <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-2">
              <label class="form-label">Password </label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control" id="password"  placeholder="Your password"  value="<?= set_value('email'); ?>">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                <span class="input-group-text">
                  <a href="#" onclick="show()" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                  </a>
                </span>
              </div>
            </div>
             <div class="mb-2">
              <label class="form-label">Tahun Ajaran</label>
              <div class="input-group input-group-flat">
                <select name="id_tahun" class="form-control">
                  <option value="" selected disabled>::Tahun Ajaran::</option>
                <?php foreach ($tahun_ajaran as $ta): ?>
                  <option value="<?= $ta->id_tahun; ?>"><?= $ta->tahun_ajaran; ?></option>
                <?php endforeach ?>
                </select>
              </div>
            </div>
           
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Login</button>
              <a href="<?= base_url('Home'); ?>" class="btn btn-info w-100 mt-2">Home</a>
            </div>
          </form>
          
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
        <div class="bg-cover h-50 min-vh-100" style="background-image: url(<?= base_url('assets/img/konseling.jpg');?>);"></div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/dist/js/tabler.min.js'); ?>" defer></script>
    <script src="<?= base_url('assets/dist/js/demo.min.js'); ?>" defer></script>
    <script>
    	function show()
    	{	
    		document.getElementById('password').type = 'text';
    	}
    </script>
  </body>
</html>