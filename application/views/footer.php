    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Tentang Fams Traveller</h3>
              </div>
              <div class="col-md-6 col-lg-6 ">
                <ul class="list-unstyled">
                  <li><a target="_blank" href="https://www.instagram.com/famstraveller/">Tentang Kami</a></li>
                  <li><a target="_blank" href="https://www.instagram.com/famstraveller/">Kontak Kami</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
        <div class="row pt-1 mt-1 text-center">
          <div class="col-md-12">
            <div class="mb-1">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="https://www.instagram.com/famstraveller/" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            </div>
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
  <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.stellar.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.countdown.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/aos.js"></script>

  <script src="<?php echo base_url() ?>assets/js/main.js"></script>
  <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("departure").setAttribute("min", today);
  </script>
    
  </body>
</html>