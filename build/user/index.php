<?php include('./partials/header.php') ?>

<section class="w-[80%] my-10 mx-auto" id="products">

  <div class="bg-unique-black md:md:block w-full font-sans text-center text-black p-5 ">
    <input class=" bg-white p-3 rounded pl-10 w-[60%]" type="text" placeholder="Search For Products">
    <button class="bg-project-bg-2 p-3 rounded ml-2 text-white">Search</button>
  </div>
</section>

</section>
<Main class="max-w-8xl ">
  <section id="home">
    <div class="max-w-[70%] mx-auto my-6">
      <div class=" responsive ">

        <img class="p-3" src="./productimages/image (1).jpg" alt="">
        <img class="p-3" src="./productimages/image (2).jpg" alt="">
        <img class="p-3" src="./productimages/image (3).jpg" alt="">
        <img class="p-3" src="./productimages/image (4).jpg" alt="">
        <img class="p-3" src="./productimages/image (5).jpg" alt="">
        <img class="p-3" src="./productimages/freestocks-_3Q3tsJ01nc-unsplash.jpg" alt="">
        <img class="p-3" src="./productimages/image (7).jpg" alt="">
        <img class="p-3" src="./productimages/image (8).jpg" alt="">

      </div>
    </div>

  </section>


  <!--- || CATEGORIES-->
  <section class="w-[80%] my-10 mx-auto" id="category">

    <div class="bg-project-bg-2 md:md:block w-full font-sans text-center text-white p-5 ">
      <h1 class="text-center text-3xl font-extrabold">Categories</h1>
    </div>
  </section>

  <!-- || CATEGORY-->

 

  <section class="w-[80%] my-10 mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <?php

    // Sql query to fetch data from database

    $sql = "SELECT * FROM tbl_category LIMIT 6";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $imageName = $row['imageName'];

    ?>

        <div class="relative overflow-hidden rounded-xl my-10">
          <?php
          if ($imageName == "") {
            // Image not available
            echo "Image not found";
          } else {
            // Image available
            $imagePath = "../admin/images/goods" . $imageName;

            if (file_exists($imagePath)) {
          ?>
              <img src="<?php echo $imagePath; ?>" class="w-full h-[300px] object-cover rounded-xl" alt="">
          <?php
            } else {
              echo "Image not found";
            }
          }
          ?>
          <div class="absolute inset-0 flex items-center justify-center text-white text-3xl font-extrabold bg-black hover:underline bg-opacity-50 transition-opacity opacity-0 hover:opacity-100">
          <a href="category-products.php?categoryId=<?php echo htmlspecialchars($id);?>" class="text-decoration-none"><?php echo htmlspecialchars($title) ?></a>
          </div>
        </div>

    <?php
      }
    }
    ?>
  </div>
</section>


  <!-- Categories-->

  <section class="w-[80%] my-10 mx-auto" >

    <div class="bg-project-bg-2 md:md:block w-full font-sans text-center text-white p-5 ">
      <h1 class="text-center text-3xl font-extrabold">BUY And Order</h1>
    </div>
  </section>

  <div class=" bg-font-color-hover w-[80%] my-10 mx-auto " id="products">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Available for sale</h1>
    <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products ORDER BY imageName DESC";
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

  </section>
</Main>

<?php include('./partials/footer.php') ?>