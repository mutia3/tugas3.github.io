<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pengguna"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('pengguna/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-pengguna"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pengguna</th>
      <th>Password</th>
      <th>Email</th>
      <th>Tanggal Lahir</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-pengguna">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pengguna; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPengguna', 'Delete this data?', 'Yes, Delete this data'); ?>
<?php
  $data['judul'] = 'Pengguna';
  $data['url'] = 'Pengguna/import';
  echo show_my_modal('modals/modal_import', 'import-pengguna', $data);
?>