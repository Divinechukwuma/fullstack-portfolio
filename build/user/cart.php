<?php include('./partials/header.php'); ?>
 
<div class="bg-font-color w-[80%] my-10 mx-auto ">
    <h1 class="font-sans text-3xl font-bold  text-black p-1">🛒Cart</h1>
    <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

      <?php

      if(isset($_GET['cartId'])){

        //get the id 
        $cartId = $_GET['cartId'];

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('d',$cartId);
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
          <li class="bg-font-color-hover py-2 px-7 rounded-3xl shadow-xl w-[300px]  my-5 lg:[400px]">
            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?>
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
          </li>
          
          

      <?php
        }
      }
    }
      ?>
    </ul>
  </div>


<?php include('./partials/footer.php'); ?>