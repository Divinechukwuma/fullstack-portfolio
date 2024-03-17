<?php include('./partials/header.php') ?>
<div id="order">

<?php if(isset($_GET['orderId']))   {

      $orderId = $_GET['orderId'];
      //  echo "im too good";
      //sql query to get the data from the product

      $sql = "SELECT * FROM tbl_products WHERE id=?";
      $stmt = $conn->prepare($sql);
     $stmt->bind_param('d', $orderId);
      $stmt->execute();
      $res = $stmt->get_result();

       $count = $res->num_rows ;
       if ($Count > 0) {
         //We have data
          $row = $res->fetch_assoc();
          $title  = $row['title'];
         $price = $row['price'];
         $imageName = $row['imageName'];
      } else {
         //Food not available
   //Redirect to homepage
         header('location: index.php' );
      }
   } else {
      //Redirect to homepage
      header('location: index.php');
    }


   ?> 

</div>

<section class='bg-project-bg-2'>
   <div>
      <h2 class='text-center text-white text-2xl font-extrabold'>Fill this form to confirm your order </h2>
      <form action="" class="order" method="POST" >
         <fieldset class="border">
            <legend  >Selected Food</legend>

            <div class="food-menu-img">
              
            </div>

            <div class="food-menu-desc">
               <h3></h3>

               <input type="hidden" name="food" value="">

               <p class="food-price"></p>

               <input type="hidden" name="price" value="">

               <div class="order-label">Quantity</div>
               <input type="number" name="qty" class="input-responsive" value="1" required>

            </div>

         </fieldset>
   </div>
</section>



<?php include('./partials/footer.php') ?>