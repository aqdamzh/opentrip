

<form class="ml-5 mr-5 mb-10">
<h4>PROFILE</h4>
  <div class="form-group">
    <label for="exampleFormControlInput1">First Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $nama_profile->first_name ?>">
    <label for="exampleFormControlInput1">Last Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?php echo $nama_profile->last_name ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">ASAL KOTA</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
    <?php foreach ($nama_kota as $kota) : ?>
        <option><?php echo $kota->nama; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class ="form-group">
    <button type="submit" class="btn btn-dark">Update</button>
  </div>

</form>