
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
              <h2 class="font-weight-light text-black"><a href="<?php echo base_url('admin/booking') ?>">List Booking</a></h2>
            </div>
          </div>
          <div class="row justify-content-end mb-3">
            <div class="col-sm-2">
            <button class="btn btn-info py-2 px-4 text-white"
            data-toggle="modal" data-target="#filterModal">Filter</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="p-4 mb-3 bg-white">
                      <table class="table">
                      <thead class="thead-dark">
                          <tr>
                          <th scope="col">Nama Pelanggan</th>
                          <th scope="col">Destinasi</th>
                          <th scope="col">Jumlah Orang</th>
                          <th scope="col">Total Harga</th>
                          <th scope="col">Tanggal Pembayaran</th>
                          <th scope="col">Metode Pembayaran</th>
                          <th scope="col">Status Pembayaran</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($bookings as $booking) : ?>
                          <tr>
                          <td><?php echo $booking->first_name ?> <?php echo $booking->last_name ?> </td>
                          <td><?php echo $booking->name ?></td>
                          <td><?php echo $booking->amount_people ?></td>
                          <td><?php echo $booking->amount ?></td>
                          <td><?php echo $booking->payment_date ?></td>
                          <td><?php echo $booking->method ?> <?php echo $booking->tujuan_pembayaran ?></td>
                          <td><?php echo $booking->status ?></td>
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

       <!-- Modal Filter-->
  <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filter Destinasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="<?= base_url('admin/filter_booking'); ?>" method="post">
        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            <label class="text-black" for="filterDestinatio">Destination</label> 
            <input type="text" id="filterDestination" name="filterDestination" class="form-control px-2" placeholder="Destination Name" autocomplete="off">
          </div>
        </div>
          <div class="row justify-content-center mb-3 mt-3">
          <input type="submit" class="btn btn-primary" name="submit" placeholder="Filter">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>