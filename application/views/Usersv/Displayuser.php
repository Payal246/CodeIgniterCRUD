<?php include "header.php";?>

<table class="table table-hover table-primary">
  <thead>
   
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>User Name</th>
    <th>Actions</th>
  </thead>
  <tbody>
    <?php
    foreach($row as $r){?>
     
      <tr class="table-primary">
       
        <td><?= $r['Firstname'];?></td>
        <td><?= $r['Lastname'];?></td>
        <td><?= $r['Email'];?></td>
        <td><?= $r['Username'];?></td>
        <td><a class="btn btn-primary" href="<?php echo site_url('Userc/edit') ?>/<?php echo $r['Reg_id']; ?>">Edit</a>
        <a  class="btn btn-danger" href="<?php echo site_url('Userc/delete')?>?id=<?php echo $r['Reg_id']; ?>">Delete</a></td>
      </tr>
   <?php }?>
  </tbody>
</table>
<?php include "footer.php" ;?>