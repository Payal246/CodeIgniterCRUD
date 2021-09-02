<!DOCTYPE html>
<html lang="en">
  <?php include "header1.php"; ?>
  <body>
    <div class="container-scroller">
      <?php include "sidebar.php"; ?>
      <div class="container-fluid page-body-wrapper">
        <?php include "headertop.php" ?>
        <div class="main-panel">
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Registered Users</h4>
                    
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>User name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach($row as $r){?>
                          
                            <tr>
                              <td><?= $r['Firstname'];?></td>
                              <td><?= $r['Lastname'];?></td>
                              <td><?= $r['Email'];?></td>
                              <td><?= $r['Username'];?></td>
                              <td><?= $r['Gender'];?></td>
                              <td><?= $r['Contact'];?></td>
                              <td><a class="btn btn-primary" href="<?php echo site_url('Userc/edit') ?>/<?php echo $r['Reg_id']; ?>">Edit</a>
                              <a  class="btn btn-danger" href="<?php echo site_url('Userc/delete')?>?id=<?php echo $r['Reg_id']; ?>">Delete</a></td>
                            </tr>
                        <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
         <?php include "footer1.php"; ?>
        </div>
      </div>
    </div>
   <?php include "footerlast.php"; ?>
  </body>
</html>