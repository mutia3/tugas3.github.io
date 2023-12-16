<?php
  $no = 1;
  foreach ($dataTransaksi as $transaksi) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $transaksi->id_destinasi; ?></td>
    <td><?php echo $transaksi->id_pengguna; ?></td>
    <td><?php echo $transaksi->tanggal_transaksi; ?></td>
    <td><?php echo $transaksi->total_bayar; ?></td>
    <td><?php echo $transaksi->metode_bayar; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataTransaksi" data-id="<?php echo $transaksi->id_transaksi; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-transaksi" data-id="<?php echo $transaksi->id_transaksi; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>