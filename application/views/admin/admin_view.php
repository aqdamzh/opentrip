
    <div class="site-blocks-cover inner-page-cover" style="background-image: url(<?php echo base_url() ?>assets/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
              <h1 class="text-white font-weight-light">Add and Edit</h1>
              <div><a href="#destination" class="mx-2 text-white"><strong>Destination</strong></a> <span class="mx-2 text-white">&bullet;</span> <a href="#price" class="text-white">Price</a></div>
              
            </div>
          </div>
        </div>
      </div>  


    <div class="site-section" id="destination">
      
      <div class="container">

        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="font-weight-light text-black">Destinations List</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7">
          <button class="btn btn-primary py-2 px-4 text-white"
          data-toggle="modal" data-target="#exampleModal">Tambah Destinasi</button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="p-4 mb-3 bg-white">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Coutry_ID</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($destinations_p as $destination) : ?>
                        <tr>
                        <td><?php echo $destination->name ?></td>
                        <td><?php echo $destination->country_id ?></td>
                        <td>
                        <a href="<?php echo base_url() ?>admin\detail_edit\<?php echo $destination->destination_id ?>" class="badge badge-success">Edit</a>
                        <a href="<?php echo base_url() ?>admin\delete\<?php echo $destination->destination_id ?>" 
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
    
    </div>
    
    <div class="site-section bg-light " id="price">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form method="post" action="<?php echo base_url().'admin/add_price'; ?>" class="p-5 bg-white">
              
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
                  <input type="date" id="departure" name="departure" class="form-control px-2" placeholder="Departure">
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
                  <label class="text-black" for="pricee">Harga</label> 
                  <input type="number" id="price" name="price" class="form-control px-2" placeholder="Price">
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Destinasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php echo form_open_multipart('admin/add_destination'); ?>
        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            <label class="text-black" for="name">Destination</label> 
            <input type="text" id="name" name="name" class="form-control px-2" placeholder="Destination Name">
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12 mb-3 mb-md-0">
            <label class="text-black" for="deskripsi">Deskripsi</label> 
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" 
            placeholder="Description"></textarea> 
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-5 mb-3 mb-md-0">
            <label class="text-black" for="country_id">Country ID</label> 
            <input type="text" id="country_id" name="country_id" class="form-control px-2" placeholder="Example: EN">
          </div>
        </div>
        <div class="row form-group">
            <label class="text-black col-sm-2 col-form-label mb-3 mb-md-0" for="picture">Picture</label>
            <div class="col-sm-10 mb-3 mb-md-0"> 
            <input type="file" name="picture" id="picture" class="form-control">
            </div>
        </div>
          <div class="row justify-content-center mb-3 mt-3">
          <button type="submit" class="btn btn-primary">Add</button>
          </div>
        <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>