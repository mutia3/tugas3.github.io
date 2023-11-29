<?php
  $no = 1;
  foreach ($dataPoli as $poli) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $poli->nama_poli; ?></td>
    <td><?php echo $poli->gedung; ?></td>
    <td><?php echo $poli->id_penyakit; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPoli" data-id="<?php echo $poli->id_poli; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-poli" data-id="<?php echo $poli->id_poli; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>