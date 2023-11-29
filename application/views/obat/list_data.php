<?php
  $no = 1;
  foreach ($dataObat as $obat) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $obat->nama_obat; ?></td>
    <td><?php echo $obat->keterangan; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataObat" data-id="<?php echo $obat->id_obat; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-obat" data-id="<?php echo $obat->id_obat; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>