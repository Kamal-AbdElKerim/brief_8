

<?php 
include 'layout/coon.php';

$Users_result = $conn->query("SELECT * FROM `users` WHERE is_Active = 1 ORDER BY id DESC");
$UsersData = $Users_result->fetchAll(PDO::FETCH_ASSOC);
$num = count($UsersData);


?>
       <div id="num_Utilisateurs" class="alert alert-success  mb-0 " role="alert">
                   Liste des Utilisateurs (<?= $num ?>)
                  </div>
                <table class="table table-striped table-hover " >
                <thead >
                <tr >
                    <th ><div style=" width: 140px;  word-wrap: break-word;  white-space: normal;">Email</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Password</div></th>
                    <th ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;">Opérations</div></th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider" >
                
               
              
              
               
<?php
                  if (!empty($UsersData)) {
                   
                
                  foreach ($UsersData as  $value) {
                    # code...
                 ?>
                    <tr>
                    <th  scope="row"><div style=" width: 190px;  word-wrap: break-word;  white-space: normal;"><?= $value["Email"] ?></div></th>
                    <td ><div style=" width: 100px;  word-wrap: break-word;  white-space: normal;"><?= $value["Password"] ?></div></td>
                    
                    <td ><div style=" width: 120px;  word-wrap: break-word;  white-space: normal;">
                    <button  onclick="makeRequest(<?= $value['id'] ?>,'Dashboard/Accept_userAdmin.php?id=')" type="button" class="btn btn-success mb-2 ms-2">is admin</button>
                    <button onclick="makeRequest(<?= $value['id'] ?>,'Dashboard/delete_Visiteurs.php?id=')" class="btn btn-danger mb-2 ms-2" type="button" >delete</button>

                    </div>

                    </td>
                   

                    </tr>
                    <?php    }   }?>

                    </tbody>
                </table>