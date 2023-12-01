
<?php 

include 'layout/coon.php';
if ( !empty($_SESSION["user"]) || !empty($_SESSION["admin"])) {  ?>
<?php



$isActive = "products.php";
  
?>



<!DOCTYPE html>
<html lang="en">

     <head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<title>Pc Gamer</title>


<!-- Additional CSS Files -->

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/hexashop.css">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
  *{
    margin: 0;
  padding: 0;
  font-family: 'Arvo', serif;
  }
  /* Custom CSS for the borderless checkbox */
  .form-check-input.big-checkbox {
    width: 0px; /* Set the width */
    height: 0px; /* Set the height */
    background: none;

    appearance: none; /* Remove default appearance for other browsers */
    border: none; /* Remove border */
    outline: none; /* Remove outline */
    vertical-align: middle; /* Align vertically */
    position: relative;
    left: 55px;
    cursor: pointer; /* Show cursor on hover */
    border-radius: 0; /* Optional: Remove border-radius */
    pointer-events: none;
  }



  /* Hide the default checkbox checkmark */
  .form-check-input.big-checkbox::before {
    content: ''; /* Empty content */
    display: block;
    width: 60px; /* Adjust the size of the checkmark */
    height: 60px; /* Adjust the size of the checkmark */
    cursor: pointer;
    transform: translate(8%, -50%);
    background-image: url('chekk.png'); /* Optional: Use a custom checkmark image */
    background-size: cover; /* Ensure the checkmark image covers the area */
    background-repeat: no-repeat; /* Prevent checkmark image repetition */
    visibility: visible; /* Show the checkmark */
  }

  /* Hide the checkmark when the checkbox is unchecked */
  .form-check-input.big-checkbox:not(:checked)::before {
    visibility: hidden;
  }
  .active-page {
  background-color: #007bff;
  color: #fff;
  /* Add any other styles for the active state */
}
</style>
<script src="https://cdn.tailwindcss.com"></script>
</head>

    <body>

  
    <!-- ***** Header Area Start ***** -->
    <?php include 'layout/navbar.php' ;
?>


      <!-- ***** Main Banner Area Start ***** -->
      <div class="page-heading" id="top">
           <div class="subscribe" >
       
       <div class="container " style="width: 84%;  ">
      
       <div  id="myCarousel" class="carousel slide" data-bs-ride="carousel">
       <!-- Indicators -->
 
     
       <!-- Slides -->
       <div class="carousel-inner" style="border-radius: 20px !important;">
         <div class="carousel-item active">
           <img src="assets/images/slide-img-114-1-1.png" class="d-block w-100 img-fluid" alt="Slide 1">
         </div>
         <div class="carousel-item">
           <img src="assets/images/slide-img-116-1-1.png" class="d-block w-100 img-fluid" alt="Slide 2">
         </div>
         <div class="carousel-item">
           <img src="assets/images/slide-img-119-1-1.png" class="d-block w-100 img-fluid" alt="Slide 3">
         </div>
         <div class="carousel-item">
           <img src="assets/images/slide-img-128-1-1.png" class="d-block w-100 img-fluid" alt="Slide 4">
         </div>
         <!-- Add more slides as needed -->
       </div>
     
       <!-- Controls -->
       <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
         <span style="color: #000000;" class="fa-solid fa-forward fa-rotate-180 fa-2xl" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
         <span  style="color: #000000;" class="fa-solid fa-forward fa-2xl" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
     
       
     </div>
        </div>
          </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <section class="section " id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                    </div>
                </div>
            </div>

            <form id="filterForm">
                <label for="category">Search:</label>
                <input type="text" name="search" id="search" onkeyup="filterProducts(this.value)">
            </form>



            <form method="post" action="#">
            <div class="grid-container">

            <div class="item1 d-flex justify-content-end align-items-center">
                <span> Trier par : <span class="invisible">l</span> </span>
                <select onchange="handleSelectionChange()" id="mySelect" name="quantity" class="form-select w-25 " aria-label="Default select example" style="width:17% !important;">
                       
                        <option selected   value="0">All</option>
                        <option    value="1">Quantité, croissant </option>
                        <option    value="2">Quantité, décroissant </option>
                        <option    value="3">Prix, croissant </option>
                        <option    value="4">Prix, décroissant </option>

                        </select>
    
  

    
</div>
  <div class="item2 ">
    
  <div class="col-lg-12">
              
     <h5>Catégories</h5>
    <!-- Checkbox inputs -->
    <ul class="list-group " id="data_Catégories"  style="   word-wrap: break-word;  white-space: normal;">
 
     


    </ul>
    <br>

    
  
    <br>
    <button id="bu" type="submit" name="submit_checkbox" class="btn btn-info btn-lg invisible">
          <span class="glyphicon glyphicon-filter"><i class="fas fa-filter"></i></span> Filter </button>

</form>
                </div>
                </div>
                   <!-- card -->
                <div class="item3 row justify-content-center " id="data" >

            </div>  
                <div class="item5  " >
                <nav aria-label="..." class=" d-flex  justify-content-center  w-100 ">
  <ul class="pagination " id="paginate">
 
   
  </ul>
</nav>
            </div>  
             <!-- end card -->



                </div>
             


                        </div>
    </section>



 
    
   
   
    
    <!-- ***** Footer Start ***** -->
    <?php include 'layout/footer.php' ; ?>
   



<?php include 'layout/js.php' ; ?>

<script src="js/categories.js"></script>
<script src="js/products.js"></script>

              
<script>


  
    // Activate the carousel
    document.addEventListener("DOMContentLoaded", function () {
      var myCarousel = document.getElementById('myCarousel');
      var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2200 // Adjust the interval (in milliseconds) for auto sliding
      });
    });
  </script>

















  </body>

</html>

<?php }  ?>
