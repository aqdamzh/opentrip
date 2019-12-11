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
                        <?php foreach ($destinations as $destination) : ?>
                        <tr>
                        <td><?php echo $destination->name ?></td>
                        <td><?php echo $destination->country_id ?></td>
                        <td>test</td>
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