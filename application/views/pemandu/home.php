<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pemandu"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('pemandu/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-pemandu"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pemandu</th>
      <th>Deskripsi</th>
      <th>No_Tlp</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-pemandu">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pemandu; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPemandu', 'Delete this data?', 'Yes, Delete this data'); ?>
<?php
  $data['judul'] = 'Pemandu';
  $data['url'] = 'Pemandu/import';
  echo show_my_modal('modals/modal_import', 'import-pemandu', $data);
?>