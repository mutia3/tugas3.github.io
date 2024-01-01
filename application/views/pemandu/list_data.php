<?php
  $no = 1;
  foreach ($dataPemandu as $pemandu) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $pemandu->nama_pemandu; ?></td>
    <td><?php echo $pemandu->deskripsi; ?></td>
    <td><?php echo $pemandu->no_tlp; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPemandu" data-id="<?php echo $pemandu->id_pemandu; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-pemandu" data-id="<?php echo $pemandu->id_pemandu; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>