<div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
    </div>
  </div>
</div>

<div class="site-section bg-light " id="">
<div class="container">
<div class="row justify-content-center mb-5">
  <div class="col-md-7 text-center">
    <h2 class="font-weight-light text-black"><a href="<?php echo base_url('Welcome/index') ?>"><- Kembali ke Destinasi</a></h2>
  </div>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-12 mb-5">

<form method="post" action="<?php echo base_url().'customer/update_profil' ?>" class="p-5 bg-white ml-5 mr-5 mb-10">
<h4>PROFILE</h4>
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="" value="<?php echo $nama_profile->first_name ?>">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="" value="<?php echo $nama_profile->last_name ?>">
  </div>
  <!-- <div class="form-group">
    <label for="exampleFormControlSelect2">ASAL KOTA</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
    <?php foreach ($nama_kota as $kota) : ?>
        <option><?php echo $kota->nama; ?></option>
    <?php endforeach; ?>
    </select>
  </div> -->
  <div class ="form-group">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</div>
</div>