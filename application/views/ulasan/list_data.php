<?php
  $no = 1;
  foreach ($dataUlasan as $ulasan) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $ulasan->id_destinasi; ?></td>
    <td><?php echo $ulasan->komentar; ?></td>
    <td><?php echo $ulasan->rating; ?></td>
    <td><?php echo $ulasan->waktu; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataUlasan" data-id="<?php echo $ulasan->id_ulasan; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-ulasan" data-id="<?php echo $ulasan->id_ulasan; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>