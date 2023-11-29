<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pasien</h3>

  <form id="form-update-pasien" method="POST">
    <input type="hidden" name="id_pasien" value="<?php echo $dataPasien->id_pasien; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="No Identitas" name="no_identitas" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->no_identitas; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->nama_pasien; ?>">
    </div>
	<div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Kelamin" name="jenis_kelamin" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->jenis_kelamin; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->alamat; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="No Telpon" name="no_telp" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->no_telp; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="No Telpon" name="no_telp" aria-describedby="sizing-addon2" value="<?php echo $dataPasien->no_telp; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <!-- <input type="text" class="form-control" placeholder="Dokter ID" name="dokterid" aria-describedby="sizing-addon2"> -->
       <select class="form-control" name="id_dokter">
        <?php foreach ($dataDokter as $data ) {
          ?>
        <option value="<?=$data->id_dokter?>"><?=$data->nama_dokter;?></option>
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