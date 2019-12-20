
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/<?php echo $destination->background ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light"><?php echo $destination->name ?></h1>
              <div></span> <span class="text-white"><?php echo $destination->description ?></span></div>
              
            </div>
          </div>
        </div>
      </div>  


    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form method="post" action="<?php echo base_url().'welcome/trip_detail'; ?>" class="p-5 bg-white">
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="date">Date of Travel</label> 
                  <input type="hidden" name="destination_id" class="form-control" value="<?php echo $destination->destination_id ?>">
                  <input type="date" id="date" name="date" class="form-control px-2" placeholder="Date of visit">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Search" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>

            <div class="p-4 mb-3 bg-white">
                <table class="table">
                  <thead class="thead-dark">
                      <tr>
                      <th scope="col">Keberangkatan</th>
                      <th scope="col">Durasi</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($trips as $trip) : ?>
                      <tr>
                      <td><?php echo $trip->departure_date ?></td>
                      <td><?php echo $trip->day ?> day, <?php echo $trip->night ?> night</td>
                      <td><?php echo $trip->price ?></td>
                      <td>
                      <a href="#" class="badge badge-danger">Book Sekarang!</a>
                      </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
            </div>

          </div>
        </div>
      </div>
    </div>