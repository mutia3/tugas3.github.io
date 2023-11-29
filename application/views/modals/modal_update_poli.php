<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Poli</h3>

  <form id="form-update-poli" method="POST">
    <input type="hidden" name="id_poli" value="<?php echo $dataPoli->id_poli; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Poli" name="nama_poli" aria-describedby="sizing-addon2" value="<?php echo $dataPoli->nama_poli; ?>">
    </div>
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Gedung" name="gedung" aria-describedby="sizing-addon2" value="<?php echo $dataPoli->gedung; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <!--<input type="text" class="form-control" placeholder="Gedung" name="gedung" aria-describedby="sizing-addon2">-->
      <select class="form-control" name="id_penyakit">
        <?php foreach ($dataPenyakit as $data ) {
          ?>
        <option value="<?=$data->id_penyakit?>"><?=$data->nama_penyakit;?></option>
      <?php } ?>     
      </select>
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>