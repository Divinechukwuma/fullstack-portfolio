<?php
include('./partials/header.php');

?>

<div class="bg-font-color w-[80%] my-10 mx-auto ">
  <h1 class="font-sans text-3xl font-bold  text-black p-1">🛒 Cart</h1>
  <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

    <?php

    if (isset($_GET['cartId'])) {
      $cartId = $_GET['cartId'];

      // Check if the cart session variable exists
      if (isset($_SESSION['cart'])) {
        // Append the new product ID to the existing cart
        $_SESSION['cart'][] = $cartId;
      } else {
        // Create a new cart session variable
        $_SESSION['cart'] = array($cartId);
      }
    }

    // Display the cart items
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
    ?>
          <li class="= py-2 px-7 rounded-3xl shadow-xl w-[300px]  my-5 lg:[400px]">
            <p class="text-unique-black font-extrabold  mb-5 text-xl"> <img src="./productimages/icons8-naira-24.png" alt="" class="inline"><?php echo htmlspecialchars($row['price']); ?>
            </p>
            <div>
              <?php
              $imagePath = "../admin/images/goods" . $row['imageName'];
              if ($row['imageName'] == "" || !file_exists($imagePath)) {
                echo "Image not available";
              } else {
              ?>
                <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['title']; ?>" class="rounded-xl max-h-32 max-w-32">
              <?php
              }
              ?>
            </div>
            <h3 class="text-2xl sm:text-3xl text-left mt-2 text-project-bg font-bold  before:font-serif before:absolute before:top-50 before:center-0 before:text-2xl before:text-project-bg before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-project-bg after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($row['title']); ?>
            </h3>
            <p class="text-xl sm:text-xl text-left mt-2 text-black before:font-serif before:absolute before:top-0 before:left-0 before:text-xl before:text-black before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-black after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2">
              <?php echo htmlspecialchars($row['description']); ?>
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
</div>


<?php include('./partials/footer.php'); ?>
