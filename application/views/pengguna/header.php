
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fams Traveller</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/aos.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-1" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <a href="<?php echo base_url() ?>" class="d-block">
              <img src="<?php echo base_url() ?>assets/images/logo.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active">
                  <a href="<?php echo base_url() ?>">Home</a>
                </li>
                <li class="">
                  <a href="<?php echo base_url() ?>">Destinasi</a>
                </li>
                <li><a target="_blank" href="https://www.instagram.com/famstraveller/">Tentang Kami</a></li>               
                <li><a target="_blank" href="https://www.instagram.com/famstraveller/">Kontak</a></li>
                <!-- <li><a href="booking.html">Book Online</a></li> -->
              </ul>
            </nav>
          </div>

          <div class="col-8 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <?php if($this->session->userdata('email')) { ?>
                    <!--Disini buat header profil setelah login-->
                    <li class="dropdown user user-menu ">
                      <a href="#" class="dropdown-toggle text-dark" data-toggle="dropdown">   
                        <span><?php echo $nama_profile->full_name ?></span> 
                               
                      </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <a class="dropdown-item" href="<?php echo base_url('customer/profil') ?>"><!--gambar dari table-->
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-200"></i>
                             Profile
                          </a>               
                          <div class="dropdown-divider"></div>
                          <?php echo anchor('auth/logout_pengguna','<span class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-200"></i>
                          Logout</span>') ?>
                            
                        </div> 
                    </li>
                <?php } else{  ?>
                  
                  <li class="active">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login_akun">Login</button>
                  </li>
                  <?php } ?>
              </ul>
            </div>
            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>
<!-- Modal -->
<div class="modal fade" id="login_akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url('auth/login') ?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Email" name="email">
          <?php echo form_error('email','<div class="text-danger small ml-2">','</div>'); ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
          <?php echo form_error('password','<div class="text-danger small ml-2">','</div>'); ?>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#daftar_akun"
        data-dismiss="modal">Buat Akun</button>
      </form>
      </div>
    </div>
  </div>
</div>     

<!-- Modal Register -->

<div class="modal fade" id="daftar_akun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url('registrasi/index') ?>">
        <div class="form-group">
          <label for="nama_depan">Nama Depan</label>
          <input type="text" class="form-control" id="nama_depan" name="first_name" placeholder="Nama Depan">
        </div>
        <div class="form-group">
          <label for="nama_belakang">Nama Belakang</label>
          <input type="text" class="form-control" id="nama_belakang" name="last_name" placeholder="Nama Belakang">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          placeholder="Email" name="email">
          <?php echo form_error('email','<div class="text-danger small ml-2">','</div>'); ?>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name ="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#login_akun"
        data-dismiss="modal">Login Disini</button>
      </form>
      </div>
    </div>
  </div>
</div> 
       
</header>
