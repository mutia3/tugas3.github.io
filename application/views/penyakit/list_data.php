<?php
  $no = 1;
  foreach ($dataPenyakit as $penyakit) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $penyakit->nama_penyakit; ?></td>
    <td><?php echo $penyakit->tingkat_penyakit; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPenyakit" data-id="<?php echo $penyakit->id_penyakit; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-penyakit" data-id="<?php echo $penyakit->id_penyakit; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>