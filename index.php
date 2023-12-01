
<?php include 'layout/coon.php';
$isActive = 'index.php';

if (isset($_POST['sing_out'])) { 
  session_destroy();
  header("Location: index.php");
  
}

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])) {
  // Retrieve form data
$email =sanitizeInput($_POST['email']) ;
$password =sanitizeInput($_POST['password']) ;

if (isset($_POST['email']) && isset($_POST['password'])) {
 


// Check against admin table
$admin_query = "SELECT * FROM admin WHERE  Email = '$email' AND Password = '$password'";
$admin_result = $conn->query($admin_query);
$AdminData = $admin_result->fetch();


// Check against user table
$user_query = "SELECT * FROM users WHERE  Email = '$email' AND Password = '$password'";
$user_result = $conn->query($user_query);
$userData = $user_result->fetch();




if (!empty($AdminData)) {
  
    header("Location: Home.php");
    $_SESSION["admin"] = $AdminData["Email"];
    exit();
} else {
  // Invalid credentials
  $error_message = "Invalid email or password. Please try again.";
}

if (!empty($userData) && $userData["is_Active"] === 1) {
    
    header("Location: products.php");
    $_SESSION["user"] = $userData["Email"];
    exit();
}else if (!empty($userData) && $userData["is_Active"] === 0) {

  $color = "warning" ;

  $error_message = "Hello " . $userData['name'] . " You must wait for your acceptance by the admin.";
}




else {
    // Invalid credentials
    $color = "danger" ;
    $error_message = "Invalid email or password. Please try again.";
}
} else{
  $color = "danger" ;
$error_message = "Email and password are required.";
}


}












?>

<?php 


?>

<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>
     

    <body>
    

   <?php
   

   
   
   include 'layout/navbar.php' ;
   


   
   
   ?>


  
   <?php





      

   
   ?>


<div class="page-index" id="top">

</div>

<div class="page-index" id="top">

<!-- ***** form  ***** -->

<div class="container overflow-hidden ">
  <div class="row gy-3">
    <div class=" col-sm-6 ">
      <div class="p-3">

      
      <form  method="post"  >
        <h4>Log in :</h4>
                        <div class="col-12">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" class="form-control" id="inputEmail4">
                          </div>
                      <div class="form-group mb-5 ">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password"  class="form-control rounded-pill" id="exampleInputPassword1">
                      </div>
                      <button  name="submit" type="submit" class="btn btn-primary mb-5">Submit</button>
                 
                  <div id="error">
                  <?php if (isset($error_message , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-2" role="alert">
                            <?php echo $error_message; ?>
                        </div> 
                        <?php    } ?> 
                  </div>

                   
                    </form>
                  </div>
                  
               
      </div>
    </div>
    <div class=" col-sm-6 ">
     

      </div>
    </div>
 
  </div>
</div>
 

    
   <?php include 'layout/footer.php' ; ?>

   <?php include 'layout/js.php' ; ?>



  </body>
</html>