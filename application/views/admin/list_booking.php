
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
              <h2 class="font-weight-light text-black">List Booking</h2>
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