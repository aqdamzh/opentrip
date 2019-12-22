
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
          </div>
        </div>
      </div>  


    <div class="site-section bg-light " id="trip">
        <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5 bg-white">
            <p class="text-black lead mt-3">Silahkan Lanjutkan Pembayaran dengan Total</p>
            <p class=""><strong>Rp. <?php echo $amount_price ?></strong>, ke <em><?php echo $gateway->tujuan_pembayaran ?></em></p>
            <form method="post" action="<?php echo base_url().'welcome/membayar/' ?>" class="p-5 bg-white">
              
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <input type="hidden" name="amount_price" value="<?php echo $amount_price ?>" class="form-control px-2">
                  <input type="hidden" name="customer_id" value="<?php echo $customer_id ?>" class="form-control px-2">
                  <input type="hidden" name="trip_id" value="<?php echo $trip_id ?>" class="form-control px-2">
                  <input type="hidden" name="amount_people" value="<?php echo $amount_people ?>" class="form-control px-2">
                  <input type="hidden" name="gateway_id" value="<?php echo $gateway->gateway_id ?>" class="form-control px-2">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Bayar" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
    </div>