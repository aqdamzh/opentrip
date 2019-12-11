
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>assets/images/bg-Bali.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">START YOUR JOURNEY</h1>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>assets/images/bg-Rinjani.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">ENJOY YOUR LIFE</h1>
            </div>
          </div>
        </div>
      </div>  
    </div>
    

    <div class="site-section" id="destination">
      
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Destinations</h2>
            <p class="color-black-opacity-5">Choose Your Next Destination</p>
          </div>
        </div>

        <div class="row">

        <?php foreach ($destinations as $destination) : ?>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <a href="<?php echo base_url() ?>Welcome/detail/<?php echo $destination->destination_id ?>" class="unit-1 text-center">
              <img src="<?php echo base_url() ?>assets/images/<?php echo $destination->picture ?>" alt="Image" class="img-fluid">
              <div class="unit-1-text" style="min-height: 6rem;">
                <strong class="text-primary mb-2 d-block">from Jakarta(CGK)</strong>
                <h3 class="unit-1-heading"><?php echo $destination->name ?>, <?php echo $destination->country_name ?></h3>
              </div>
            </a>
          </div>
        <?php endforeach; ?>

        </div>
        <?= $this->pagination->create_links(); ?>
      </div>
    
    </div>
    <!-- <div class="site-section bg-light">
      
    </div> -->

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Our Services</h2>
            <p class="color-black-opacity-5">We Offer The Following Services</p>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-airplane"></span></div>
              <div>
                <h3>Air Ticketing</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ship"></span></div>
              <div>
                <h3>Cruises</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-route"></span></div>
              <div>
                <h3>Tour Packages</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-hotel"></span></div>
              <div>
                <h3>Hotel Accomodations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-sailboat"></span></div>
              <div>
                <h3>Sea Explorations</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary flaticon-ski"></span></div>
              <div>
                <h3>Ski Experiences</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

	<div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg); background-attachment: fixed;">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-7" data-aos="fade-up" data-aos-delay="400">
            <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
            <h2 class="text-white font-weight-light mb-5 h1">Experience Our Outstanding Services</h2>
            
          </div>
        </div>
      </div>
    </div>  

	<div class="site-section block-13 bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5">
			<div class="col-md-7">
				<h2 class="font-weight-light text-black text-center">Testimonials</h2>
			</div>
			</div>

			<div class="nonloop-block-13 owl-carousel">

			<div class="item">
				<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-5">
					<img src="<?php echo base_url() ?>assets/images/img_1.jpg" alt="Image" class="img-md-fluid">
					</div>
					<div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
					<p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
					<p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
					</div>
				</div>
				</div>
			</div>

			<div class="item">
				<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-5">
					<img src="<?php echo base_url() ?>assets/images/img_2.jpg" alt="Image" class="img-md-fluid">
					</div>
					<div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
					<p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
					<p class="">&mdash; <em>Clair Augustin</em>, <a href="#">Traveler</a></p>
					</div>
				</div>
				</div>
			</div>

			<div class="item">
				<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-5">
					<img src="<?php echo base_url() ?>assets/images/img_4.jpg" alt="Image" class="img-md-fluid">
					</div>
					<div class="overlap-left col-lg-6 bg-white p-md-5 align-self-center">
					<p class="text-black lead">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique dolorem quisquam laudantium, incidunt id laborum, tempora aliquid labore minus. Nemo maxime, veniam! Fugiat odio nam eveniet ipsam atque, corrupti porro&rdquo;</p>
					<p class="">&mdash; <em>James Martin</em>, <a href="#">Traveler</a></p>
					</div>
				</div>
				</div>
			</div>

			</div>
		</div>
    </div>
    
    <div class="site-section border-top">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <h2 class="mb-5 text-black">Want To Travel With Us?</h2>
            <p class="mb-0"><a href="#destination" class="btn btn-primary py-3 px-5 text-white">Book Now</a></p>
          </div>
        </div>
      </div>
    </div>