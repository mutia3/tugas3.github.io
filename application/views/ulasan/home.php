<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-ulasan"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('ulasan/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-ulasan"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>ID Destinasi</th>
      <th>Komentar</th>
      <th>Rating</th>
      <th>Waktu</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-ulasan">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_ulasan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUlasan', 'Delete this data?', 'Yes, Delete this data'); ?>
<?php
  $data['judul'] = 'Ulasan';
  $data['url'] = 'Ulasan/import';
  echo show_my_modal('modals/modal_import', 'import-ulasan', $data);
?>