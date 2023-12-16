<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Ulasan</h3>

  <form id="form-update-ulasan" method="POST">
    <input type="hidden" name="id_ulasan" value="<?php echo $dataUlasan->id_ulasan; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <!-- <input type="text" class="form-control" placeholder="Dokter ID" name="dokterid" aria-describedby="sizing-addon2"> -->
       <select class="form-control" name="id_destinasi">
        <?php foreach ($dataDestinasi as $data ) {
          ?>
        <option value="<?=$data->id_destinasi?>"><?=$data->nama_destinasi;?></option>
      <?php } ?> 
      </select> 
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Komentar" name="komentar" aria-describedby="sizing-addon2" value="<?php echo $dataUlasan->komentar; ?>">
    </div>
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Rating" name="rating" aria-describedby="sizing-addon2" value="<?php echo $dataUlasan->rating; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Waktu" name="waktu" aria-describedby="sizing-addon2" value="<?php echo $dataUlasan->waktu; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>