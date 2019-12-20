
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
          </div>
        </div>
      </div>  


    <div class="site-section bg-light " id="trip">
        <div class="container">

          <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
              <h2 class="font-weight-light text-black">Jadwal Perjalanan</h2>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
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
                          <a href="<?php echo base_url() ?>admin\delete_perjalanan\<?php echo $trip->trip_id ?>" 
                          class="badge badge-warning" onclick="javascript: return confirm('Anda yakin hapus?')">Delete</a>
                          </td>
                          </tr>
                          <?php endforeach; ?>
                      </tbody>
                      </table>
                      <?= $this->pagination->create_links(); ?>
                  </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-5">

            <form method="post" action="<?php echo base_url().'admin/add_trip'; ?>" class="p-5 bg-white">
              
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
                  <input type="date" min="2000-02-22" id="departure" name="departure" class="form-control px-2" placeholder="Departure">
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
                  <label class="text-black" for="price">Harga</label> 
                  <input type="number" id="price" name="price" class="form-control px-2" placeholder="Price">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="guide1">Nama Guide</label> 
                    <select class="form-control px-2" name="guide1">
                          <?php foreach ($guides as $guide) : ?>
                              <option value="<?php echo $guide->guide_id ?>"
                              ><?php echo $guide->nama ?></option>
                          <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-6">
                <label class="text-black" for="guide2">Nama Guide</label> 
                    <select class="form-control px-2" name="guide2">
                          <?php foreach ($guides as $guide) : ?>
                              <option value="<?php echo $guide->guide_id ?>"
                              ><?php echo $guide->nama ?></option>
                          <?php endforeach; ?>
                    </select>
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