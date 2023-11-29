<?php
  $no = 1;
  foreach ($dataCategory as $category) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $category->CategoryName; ?></td>
    <td><?php echo $category->Description; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataCategory" data-id="<?php echo $category->CategoryID; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-category" data-id="<?php echo $category->CategoryID; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>          
      </td>
    </tr>
    <?php
    $no++;
  }
?>