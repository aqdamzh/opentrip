
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">Book A Tour</h1>
              <div><a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <span class="text-white">Booking</span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form method="post" action="<?php echo base_url().'admin/add_price'; ?>" class="p-5 bg-white">
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="destination">Nama Destinasi</label> 
                  <select class="form-control px-2" name="destination_id">
                        <?php foreach ($destinations as $destination) : ?>
                            <option value="<?php echo $destination->destination_id ?>"
                            ><?php echo $destination->name ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="departure">Jadwal Keberangkatan</label> 
                  <input type="date" id="departure" name="departure" class="form-control px-2" placeholder="Departure">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black">Durasi - Siang</label>
                  <input type="number" name="day" class="form-control" placeholder="Day">
                </div>
                <div class="col-md-6">
                <label class="text-black">Malam</label>
                  <input type="number" name="night" class="form-control" placeholder="Night">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="pricee">Harga</label> 
                  <input type="number" id="price" name="price" class="form-control px-2" placeholder="Price">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Tambah" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
    </div>