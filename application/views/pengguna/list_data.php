<?php
  $no = 1;
  foreach ($dataPengguna as $pengguna) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $pengguna->nama_pengguna; ?></td>
    <td><?php echo $pengguna->password; ?></td>
    <td><?php echo $pengguna->email; ?></td>
    <td><?php echo $pengguna->tanggal_lahir; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPengguna" data-id="<?php echo $pengguna->id_pengguna; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-pengguna" data-id="<?php echo $pengguna->id_pengguna; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>