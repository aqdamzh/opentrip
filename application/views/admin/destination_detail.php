
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/<?php echo $destination->background ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light"><?php echo $destination->name ?></h1>
              <div></span> <span class="text-white"><?php echo $destination->description ?></span></div>
              <?php echo form_open_multipart('admin/update_bg'); ?>
                <div class="form-group row">
                    <label for="background" class="col-sm-2 col-form-label text-white">Update Background</label>
                    <div class="col-sm-10">
                    <input type="file" name="background" id="background" class="form-control">
                    </div>
                </div>
            <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>  


    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">

          </div>
        </div>
      </div>
    </div>