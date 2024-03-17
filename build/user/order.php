<?php include('./partials/header.php') ?>
<div id="order">

   <?php if (isset($_GET['orderId'])) {

      $orderId = $_GET['orderId'];
      //  echo "im too good";

      if (isset($_SESSION['order'])) {

         if (!in_array($orderId, $_SESSION['order'])) {
            $_SESSION['order'][] = $orderId;
         }
      } else {
         //create a new order session variable 
         $_SESSION['order'] = array($orderId);
      }

      //funtion to remove item from order

      function removeFromCart($productId)
      {
         if (isset($_SESSION['order'])) {
            $index = array_search($productId, $_SESSION['order']);

            if ($index !== false) {
               unset($_SESSION['order'][$index]);
            }
         }
      }

      //Check if the order is not empty and display cart items

      if (isset($_SESSION['order']) && !empty($_SESSION['order'])) {

         $orderIds = $_SESSION['order'];

         foreach ($orderIds as $orderId) {

            //sql query to get the data from the product

            $sql = "SELECT * FROM tbl_products WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('d', $orderId);
            $stmt->execute();
            $res = $stmt->get_result();

            if ($res->num_rows > 0) {

               $row = $res->fetch_assoc();
               $price = $row['price'];
               $title = $row['title'];
               $description = $row['description'];
   ?>

               <section class='bg-project-bg-2'>
                  <div>
                     <h2 class='text-center text-white text-2xl font-extrabold'>Fill this form to confirm your order </h2>
                     <form action="" class="order" method="POST">
                        <fieldset class="border">
                           <legend>Selected Food</legend>

                           <div class="food-menu-img">

                              <?php
                              $imagePath = "../admin/images/goods" . $row['imageName'];
                              if ($row['imageName'] == "" || !file_exists($imagePath)) {
                                 echo "Image not available";
                              } else {
                              ?>
                                 <img src="<?php echo $imagePath; ?>" alt="<?php echo $title; ?>" class="rounded-xl max-h-32 max-w-32">
                              <?php
                              }
                              ?>


                           </div>

                           <div class="food-menu-desc">
                              <h3><?php echo htmlspecialchars($title) ?></h3>

                              <input type="hidden" name="food" value="<?php echo htmlspecialchars($title)  ?>">

                              <p class="food-price"><?php echo htmlspecialchars($price) ?></p>

                              <input type="hidden" name="price" value="<?php echo htmlspecialchars($price) ?>">

                              <div class="order-label">Quantity</div>
                              <input type="number" name="qty" class="input-responsive" value="1" required>

                           </div>

                        </fieldset>
                  </div>
               </section>



   <?php
            }
         }
      }
   }


   ?>


</div>





<?php include('./partials/footer.php') ?>