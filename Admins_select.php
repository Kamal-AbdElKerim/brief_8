

<?php 
include 'layout/coon.php';

$Admins_result = $conn->query("SELECT * FROM `admin` ORDER BY id ASC ");
$AdminData = $Admins_result->fetchAll(PDO::FETCH_ASSOC);
$num = count($AdminData);


?>
    <div id="num_Admins" class="alert alert-primary  mb-0 " role="alert">
              Liste des Admins (<?= $num ?>)
              </div>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr >
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Email</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Password</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Opérations</div></th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider" >
                
               
              
             
<?php
                  if (!empty($AdminData)) {
                   
                
                  foreach ($AdminData as  $value) {
                   if ( $value["super_admin"] === 1) { ?>
                     <tr>
                     <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value["Email"] ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["Password"] ?></div></td>
                    
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">SUPER Admin

                    </div>

                    </td>
                    </tr>
                  
          <?php    }else {      ?>
            
       
                    <tr>
                    <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value["Email"] ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["Password"] ?></div></td>
                    
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">
                    <button  onclick="makeRequest(<?= $value['id'] ?>,'Dashboard/back_userAdmin.php?id=')" class="btn btn-danger mb-2 ms-2" type="button" >Reject</button>

                    </div>

                    </td>
                    </tr>
                    <?php    }   ?>
                    <?php    } }  ?>


                     
                </tbody>
                </table>