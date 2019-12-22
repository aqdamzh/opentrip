
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/<?php echo $destination->background ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light"><?php echo $destination->name ?></h1>
            </div>
          </div>
          <?php echo form_open_multipart('admin/update_bg'); ?>
                <div class="form-group row mt-1">
                    <label for="background" class="col-sm-2 col-form-label text-primary"><strong>Update Background</strong></label>
                    <div class="col-sm-6">
                      <input type="hidden" name="destination_id" class="form-control" 
                      value="<?php echo $destination->destination_id ?>">
                      <input type="file" name="background" id="background" class="form-control">
                    </div>
                    <div class="col-sm-4">
                      <button type="submit" class="btn btn-primary">Edit Background</button>
                    </div>
                </div>
          <?php echo form_close(); ?>
        </div>
    </div>  


    
      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-7 mb-5">

              
              <?php echo form_open_multipart('admin/update_destination'); ?>
              <div class="p-5 bg-white">
                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="description">Dekripsi</label>
                    <input type="hidden" name="destination_id" class="form-control" 
                      value="<?php echo $destination->destination_id ?>"> 
                    <textarea name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Write your destination description"><?php echo $destination->description ?></textarea>
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <label class="text-black" for="picture">Update Picture</label> 
                    <input type="file" name="picture" id="picture" class="form-control">
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" value="Send" class="btn btn-primary py-2 px-4 text-white">
                  </div>
                </div>
    
              </div>
              <?php echo form_close(); ?>
            </div>
            <div class="col-md-5">
              
              
              
              <div class="p-4 mb-3 bg-white">
                <img src="<?php echo base_url() ?>assets/images/<?php echo $destination->picture ?>" alt="Image" class="img-fluid mb-4 rounded">
                <h3 class="h5 text-black mb-3">Deskripsi</h3>
                <p><?php echo $destination->description ?></p>
              </div>

            </div>
          </div>
        </div>
      </div>