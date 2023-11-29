<?php
  $no = 1;
  foreach ($dataPasien as $pasien) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $pasien->no_identitas; ?></td>
    <td><?php echo $pasien->nama_pasien; ?></td>
    <td><?php echo $pasien->jenis_kelamin; ?></td>
    <td><?php echo $pasien->alamat; ?></td>
    <td><?php echo $pasien->no_telp; ?></td>
    <td><?php echo $pasien->id_dokter; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataPasien" data-id="<?php echo $pasien->id_pasien; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-pasien" data-id="<?php echo $pasien->id_pasien; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>