
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
              <h2 class="font-weight-light text-black"><a href="<?php echo base_url('admin/guide') ?>"><- Kembali ke Jadwal Guide</a></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="p-4 mb-3 bg-white">
                      <table class="table">
                      <thead class="thead-dark">
                          <tr>
                          <th scope="col">Nama</th>
                          <th scope="col">Destinasi</th>
                          <th scope="col">Berangkat</th>
                          <th scope="col">Pulang</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td><?php echo $guideschedule->nama ?></td>
                          <td><?php echo $guideschedule->name ?></td>
                          <td><?php echo $guideschedule->date ?></td>
                          <td><?php echo $guideschedule->return ?></td>
                          </tr>
                      </tbody>
                      </table>
                  </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">

            <form method="post" action="<?php echo base_url().'admin/editJadwalGuide/'.$guideschedule->guideschedule_id ; ?>" class="p-5 bg-white">
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="guide">Nama Guide</label> 
                    <select class="form-control px-2" name="guide">
                          <?php foreach ($guides as $guide) : ?>
                              <option value="<?php echo $guide->guide_id ?>"
                              ><?php echo $guide->nama ?></option>
                          <?php endforeach; ?>
                    </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Ganti" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
    </div>