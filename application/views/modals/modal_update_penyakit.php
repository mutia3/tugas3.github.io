<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Penyakit</h3>

  <form id="form-update-penyakit" method="POST">
    <input type="hidden" name="id_penyakit" value="<?php echo $dataPenyakit->id_penyakit; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Penyakit" name="nama_penyakit" aria-describedby="sizing-addon2" value="<?php echo $dataPenyakit->nama_penyakit; ?>">
    </div>
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Tingkat Penyakit" name="tingkat_penyakit" aria-describedby="sizing-addon2" value="<?php echo $dataPenyakit->tingkat_penyakit; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>