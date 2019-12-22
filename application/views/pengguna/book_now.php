
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
              <h2 class="font-weight-light text-black"><a href="<?php echo base_url('welcome/detail/').$trip->destination_id ?>"><- Kembali ke Destinasi</a></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              <div class="p-4 mb-3 bg-white">
                      <table class="table">
                      <thead class="thead-dark">
                          <tr>
                          <th scope="col">Destinasi</th>
                          <th scope="col">Keberangkatan</th>
                          <th scope="col">Durasi</th>
                          <th scope="col">Harga</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                          <td><?php echo $trip->name ?></td>
                          <td><?php echo $trip->departure_date ?></td>
                          <td><?php echo $trip->day ?> day, <?php echo $trip->night ?> night</td>
                          <td><?php echo $trip->price ?></td>
                          </tr>
                      </tbody>
                      </table>
                  </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">

            <form method="post" action="<?php echo base_url().'welcome/konfirmasi_pembayaran/' ?>" class="p-5 bg-white">
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="totpeople">Jumlah Orang</label> 
                  <input type="hidden" name="price" value="<?php echo $trip->price ?>" class="form-control px-2">
                  <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>" class="form-control px-2">
                  <input type="hidden" name="trip_id" value="<?php echo $trip->trip_id ?>" class="form-control px-2">
                  <input type="number" id="totpeople" name="totpeople" class="form-control px-2" placeholder="people">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="gateway_id">Transfer ke Rekening</label>
                  <select class="form-control px-2" name="gateway_id">
                        <?php foreach ($gateways as $gateway) : ?>
                            <option value="<?php echo $gateway->gateway_id ?>"
                            ><?php echo $gateway->tujuan_pembayaran ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Proses" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
    </div>