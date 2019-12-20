
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
          </div>
        </div>
      </div>  


    <div class="site-section bg-light " id="guide">
        <div class="container">

          <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
              <h2 class="font-weight-light text-black">Jadwal Guide</h2>
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
                          <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($schedules as $schedule) : ?>
                          <tr>
                          <td><?php echo $schedule->nama ?></td>
                          <td><?php echo $schedule->name?></td>
                          <td><?php echo $schedule->date?></td>
                          <td><?php echo $schedule->return?></td>
                          <td>
                          <a href="<?php echo base_url() ?>admin\detail_edit\<?php echo $schedule->guideschedule_id ?>" class="badge badge-success">Edit</a>
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
      </div>
    </div>