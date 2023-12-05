
<?php include 'layout/coon.php';
$isActive ="new_account.php";

if (isset($_POST['sing_out'])) { 
  session_destroy();
}

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function validateEmail($email) {
  // Regular expression for email validation
  $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

  // Check if the email matches the pattern
  if (preg_match($pattern, $email)) {
      return true; // Valid email format
  } else {
      return false; // Invalid email format
  }
}

if (isset($_POST['Sign_Up'])) {
  // Retrieve form data
$Name =sanitizeInput($_POST['Name']) ;
$email =sanitizeInput($_POST['email']) ;
$password =sanitizeInput($_POST['password']) ;

if (!empty($email) && !empty($password) && !empty($Name)) {

  if (validateEmail($email)) {
    
    $stmt = $conn->prepare("INSERT INTO `users`(`Name`, `Email`, `Password`) VALUES ('$Name','$email','$password')");
 
    if ( $stmt->execute()) {
      $color = "success" ;
      $error_Sign_Up = "Hello $Name, you registered successfully.";
        $Name = '';
        $email = '';
        $password = '';
    }else {
      $color = "danger" ;
        $error_Sign_Up = "error";
    }
} else {
  $color = "danger" ;
  $error_Sign_Up = "email is not correct ";
}


}else {
  $color = "danger" ;
  $error_Sign_Up = "entez Name et email et password ";
}

}
?>

<?php 


?>

<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>
     

    <body>
    

   <?php include 'layout/navbar.php' ;
   

   
   
   
   ?>


  
   <?php





      

   
   ?>


<div class="page-index" id="top">

</div>

<div class="page-index" id="top">

<!-- ***** form  ***** -->

<div class="container overflow-hidden ">

    <div class=" col-sm-6 ">
      <div class="p-3">

  <form class="row g-3" method="post" >

                <h4>Create a new account</h4>
         
       
       
          <!-- <div class="col-12">
            <label for="inputAddress" class="form-label">confirm password </label>
            <input type="password" class="form-control" id="inputAddress">
          </div> -->

      

          <div class="col-md-6">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" name="Name" class="form-control" value="<?php echo (isset($Name)) ? $Name : ''; ?>" id="inputName">
          </div>
          <div class="col-md-6">
            <label for="inputPrénom" class="form-label">Prénom</label>
            <input type="text" name="Prénom" class="form-control" value="<?php echo (isset($Prenom)) ? $Prenom : ''; ?>" id="inputPrénom">
          </div>
          <div class="col-12">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="text" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" class="form-control" id="inputEmail4">
          </div>
          <div class="col-12">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" value="<?php echo (isset($password)) ? $password : ''; ?>" name="password" class="form-control" id="inputPassword4">
          </div>
          <div class="col-12">
    <label for="inputAddress2" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-7">
    <label for="inputAddress" class="form-label">phone</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
 
  
  <div class="col-md-4">
    <label for="inputState" class="form-label">ville</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option value="Marrakech">Marrakech</option>
      <option value="Casablanca">Casablanca</option>
      <option value="Fès">Safi</option>
      <option value="Chefchaouen">Chefchaouen</option>
      <option value="Essaouira">Essaouira</option>
      <option value="Rabat">Rabat</option>
    </select>
  </div>

  
  <div class="col-12 mt-5">
            <button type="submit" name="Sign_Up" class="btn btn-primary">Sign Up</button>
          </div>






          <?php if (isset($error_Sign_Up , $_POST['Sign_Up'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_Sign_Up; ?>
                        </div> 
                   

                   
                    </form>
                  </div>
                  
                <?php    } ?> 
</form>
      </div>
    </div>
 
  </div>
</div>
 

    
   <?php include 'layout/footer.php' ; ?>

   <?php include 'layout/js.php' ; ?>



  </body>
</html>