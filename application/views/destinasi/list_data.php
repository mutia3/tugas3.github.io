<?php
  $no = 1;
  foreach ($dataDestinasi as $destinasi) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $destinasi->nama_destinasi; ?></td>
    <td><?php echo $destinasi->deskripsi; ?></td>
    <td><?php echo $destinasi->latitude; ?></td>
    <td><?php echo $destinasi->longitude; ?></td>
    <td><?php echo $destinasi->lokasi; ?></td>
    <td><?php echo $destinasi->foto; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataDestinasi" data-id="<?php echo $destinasi->id_destinasi; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-destinasi" data-id="<?php echo $destinasi->id_destinasi; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>