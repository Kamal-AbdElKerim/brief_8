




<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #f9f9f9;">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand ms-5" >
                        <img src="assets\images\logo_1.png">
                    </a>
  
      <button class="navbar-toggler" style="margin-right:5px !important;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
                </button>
      <div class="collapse navbar-collapse top_nav" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
   
        </ul>
        <ul class="navbar navbar-nav navbar-right" style="display:flex;">
       
    
        <?php if ( !empty($_SESSION["user"]) || !empty($_SESSION["admin"])) {  ?>
                                                       
          <li class="nav-item me-4"><a class="nav-link <?php if ($isActive === "products.php") echo ' activee'; ?>" href="products.php" >Products</a></li>

          <?php }else {      ?>
            
            <li class="nav-item me-4"><a class="nav-link <?php if ($isActive === "index.php") echo ' activee"'; ?>" href="index.php" >Log in</a></li>
        <li class="nav-item me-4"><a class="nav-link <?php if ($isActive === "new_account.php") echo ' activee"'; ?>" href="new_account.php" >Create a new account</a></li>
          <?php } ?>
          <?php if ( !empty($_SESSION["admin"])) {  ?>

<li class="nav-item me-4"><a class="nav-link " href="Home.php" >Settings</a></li>
<form action="index.php" method="post">
      

           </form>

<?php } ?>

<?php if ( !empty($_SESSION["user"]) ||  !empty($_SESSION["admin"])) {  ?>
  <form action="index.php" method="post">
    
          <li class="nav-item me-4">  <button name="sing_out" class="nav-link ">sing out</button> </li>
             

           </form>
  
<?php } 




?>




        
       
                    </ul>
        </ul>
      </div>
    </div>
  </nav>

