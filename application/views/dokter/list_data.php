<?php
  $no = 1;
  foreach ($dataDokter as $dokter) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $dokter->nama_dokter; ?></td>
    <td><?php echo $dokter->spesialis; ?></td>
    <td><?php echo $dokter->alamat; ?></td>
    <td><?php echo $dokter->no_tlp; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataDokter" data-id="<?php echo $dokter->id_dokter; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-dokter" data-id="<?php echo $dokter->id_dokter; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>