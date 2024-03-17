<?php

include('./partials/header.php');

?>

<div class="bg-font-color-hover w-[80%] my-10 mx-auto ">
  <h1 class="font-sans text-3xl font-bold  text-black p-1 text-center">🛒 Cart</h1>
  <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

    <?php

    // Check if a product should be added to the cart
    if (isset($_GET['cartId'])) {
      $cartId = $_GET['cartId'];

      // Check if the cart session variable exists
      if (isset($_SESSION['cart'])) {
        // Check if the product ID already exists in the cart
        if (!in_array($cartId, $_SESSION['cart'])) {
          // Append the new product ID to the existing cart
          $_SESSION['cart'][] = $cartId;
        }
      } else {
        // Create a new cart session variable
        $_SESSION['cart'] = array($cartId);
      }
    }

    // Function to remove item from cart
    function removeFromCart($productId)
    {
      if (isset($_SESSION['cart'])) {
        // Find the index of the product ID in the cart array
        $index = array_search($productId, $_SESSION['cart']);
        // If found, remove it from the cart
        if ($index !== false) {
          unset($_SESSION['cart'][$index]);
        }
      }
    }

    // Check if the cart is not empty and display cart items
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
      $cartIds = $_SESSION['cart'];

      // Fetch product details based on the cart IDs and display them
      foreach ($cartIds as $cartId) {
        // Fetch product details from the database using $cartId
        // Replace the below query with your actual database query to fetch product details
        $sql = "SELECT * FROM tbl_products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $cartId);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
          $row = $res->fetch_assoc();
          // Display product details
          $price = $row['price'];
          $title = $row['title'];
          $description = $row['description'];
    ?>
         <li class=" py-2 px-7 rounded-3xl shadow-xl w-[230px] mx-auto my-5 lg:[400px] bg-font-color">
          
            <p class="text-unique-black font-extrabold  mb-5 text-xl"> <img src="./productimages/icons8-naira-24.png" alt="" class="inline"><?php echo htmlspecialchars($price); ?> </p>

            <form action="cart.php" method="POST" >
              <input type="hidden" name="removeCartId" value="<?php echo htmlspecialchars($cartId); ?>">
              <button type="submit" name="removeFromCart" class="border rounded-xl p-2 text-2xl text-white"><img src="./productimages/icons8-trash-24.png"  alt="" class="w-['50px']"></button>
            </form>
           
            <div>
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
            <h3 class="text-2xl sm:text-3xl text-left mt-2 text-project-bg font-bold  before:font-serif before:absolute before:top-50 before:center-0 before:text-2xl before:text-project-bg before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-project-bg after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($title); ?>
            </h3>
            <p class="text-xl sm:text-xl text-left mt-2 text-black before:font-serif before:absolute before:top-0 before:left-0 before:text-xl before:text-black before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-black after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($description); ?>
            </p>
           
              
          </li>
    <?php
        }
      }
    } else {
      // Cart is empty
      echo "Your cart is empty.";
    }

    ?>

  </ul>

  <button type="submit" class=" rounded-xl p-2 text-2xl text-white bg-project-bg-2 my-5 "><a href="order.php?orderId=<?php echo htmlspecialchars($cartId) ?>">Order Here</a></button>

</div>



<?php
// Check if the Remove from Cart button is clicked
if (isset($_POST['removeFromCart']) && isset($_POST['removeCartId'])) {
  // Call the removeFromCart function with the product ID to remove it from the cart
  removeFromCart($_POST['removeCartId']);
  // Redirect to the cart page to refresh the displayed items
  header("Location: cart.php");
  exit;
}
?>

<div class="bg-font-color-hover w-[80%] my-10 mx-auto ">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">On sale</h1>
    <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products LIMIT 8";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $res = $stmt->get_result();

      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $id = $row['id'];
          $title = $row['title'];
          $description = $row['description'];
          $price = $row['price'];
          $imageName = $row['imageName']; // Fixed variable name
          $categoryId = $row['categoryId'];
      ?>
          <li class=" py-2 px-7 rounded-3xl shadow-xl w-[230px] mx-auto my-5 lg:[400px] bg-font-color">
            <p class="text-unique-black font-extrabold  mb-5 text-xl"> <img src="./productimages/icons8-naira-24.png" alt="" class="inline"><?php echo htmlspecialchars($price) ?>
          </p>
            <div>
              <?php
              if ($imageName == "") {
                // Image not available
                echo "Image not available";
              } else {
                // Image available
                $imagePath = "../admin/images/goods" . $imageName;

                if (file_exists($imagePath)) {
              ?>
                  <img src="<?php echo $imagePath; ?>" alt="iphone" class="rounded-xl max-h-32 max-w-32">
              <?php
                } else {
                  echo "Image not found";
                }
              }
              ?>
            </div>
            <h3 class="text-2xl sm:text-3xl text-left mt-2 text-project-bg font-bold  before:font-serif before:absolute before:top-50 before:center-0 before:text-2xl before:text-project-bg before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-project-bg after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($title); ?>
            </h3>
            <p class="text-xl sm:text-xl text-left mt-2 text-black before:font-serif before:absolute before:top-0 before:left-0 before:text-xl before:text-black before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-black after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($description) ?>
            </p>
            <button class="border rounded-xl bg-project-bg-2 p-2 text-2xl text-white"> <a href="cart.php?cartId=<?php echo htmlspecialchars($id); ?>"> Add To 🛒 </a> </button>

          </li>
          
          

      <?php
        }
      }
      ?>
    </ul>
  </div>


<?php include('./partials/footer.php');?>
