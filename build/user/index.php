<?php include('./partials/header.php') ?>
<section class="w-[80%] mt-10" id="products">

  <div class="bg-unique-black md:mx-[15rem]  sm:hidden md:block w-full mx-10 ">
    <div class="font-sans text-center text-black p-5">
      <input class=" bg-white p-3 rounded pl-10 w-[60%]" type="text" placeholder="Search For Products">
      <button class="bg-project-bg-2 p-3 rounded ml-2 text-white">Search</button>
    </div>

  </div>

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
  <section class="w-[80%] " id="category">

    <div class="bg-project-bg-2 w-full mx-10  md:mx-[15rem]">
      <h1 class="font-sans text-3xl font-bold text-center  text-white p-4">Categories</h1>
    </div>

  </section>
  <!-- || CATEGORY-->

  <!--|| GADGETS-->

  <div class="bg-font-color ">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Gadgets</h1>
    <ul class="list-none grid grid-cols-1 items-center">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products WHERE active=? AND featured=? LIMIT 4";
      $stmt = $conn->prepare($sql);

      // Bind parameters
      $activeValue = 'yes';      // Replace this with the actual value from your application
      $featuredValue = 'yes';    // Replace this with the actual value from your application

      // Bind the above parameters
      $stmt->bind_param("ss", $activeValue, $featuredValue);
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
          <li class="bg-font-color-hover py-1 px-10  rounded-3xl shadow-xl w-[20%] ">
            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?> ᐳ</p>
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
                  <img src="<?php echo $imagePath; ?>" alt="iphone" class="rounded-xl  max-h-32 max-w-32">
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
      ?>
    </ul>
  </div>

  <!--|| CLOTHES-->

  <div class="bg-font-color p-2 md:mx-[30rem] mx-10 my-10">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Clothes</h1>
    <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center gap-8">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products WHERE active=? AND featured=? LIMIT 4";
      $stmt = $conn->prepare($sql);

      // Bind parameters
      $activeValue = 'no';      // Replace this with the actual value from your application
      $featuredValue = 'yes';    // Replace this with the actual value from your application

      // Bind the above parameters
      $stmt->bind_param("ss", $activeValue, $featuredValue);
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
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[20%]">
            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?> ᐳ</p>
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
                  <img src="<?php echo $imagePath; ?>" alt="iphone" class="rounded-xl  max-h-32 max-w-32">
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
      ?>
    </ul>
  </div>

  <!--|| Electronics-->

  <div class="bg-font-color p-2 md:mx-[30rem] mx-10 my-10">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Electronics</h1>
    <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center gap-8">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products WHERE active=? AND featured=? LIMIT 4";
      $stmt = $conn->prepare($sql);

      // Bind parameters
      $activeValue = 'yes';      // Replace this with the actual value from your application
      $featuredValue = 'no';    // Replace this with the actual value from your application

      // Bind the above parameters
      $stmt->bind_param("ss", $activeValue, $featuredValue);
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
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[20%]">
            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?> ᐳ</p>
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
                  <img src="<?php echo $imagePath; ?>" alt="iphone" class="rounded-xl  max-h-32 max-w-32">
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
      ?>
    </ul>
  </div>

  <!--|| APPLIANCES-->

  <div class="bg-font-color p-2 md:mx-[30rem] mx-10 my-10">
    <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Appliances</h1>
    <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center gap-8">

      <?php

      //Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products WHERE active=? AND featured=? LIMIT 4";
      $stmt = $conn->prepare($sql);

      // Bind parameters
      $activeValue = 'no';      // Replace this with the actual value from your application
      $featuredValue = 'no';    // Replace this with the actual value from your application

      // Bind the above parameters
      $stmt->bind_param("ss", $activeValue, $featuredValue);
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
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[20%]">
            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?> ᐳ</p>
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
      ?>
    </ul>
  </div>

  </section>

  <section class="w-[80%] " id="Products">

    <div class="bg-project-bg-2 md:mx-[15rem]  w-full justify-center flex ">
      <h1 class="font-sans text-3xl font-bold text-center text-white p-4">Buy Or Order</h1>
    </div>

    <div class="bg-font-color p-2 md:ml-[10rem] mx-10 my-10 justify-center">
      <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Available for sale</h1>
      <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap flex-row items-center gap-8">

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
            <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[20%]">
              <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5"> $<?php echo htmlspecialchars($price) ?> ᐳ</p>
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
        ?>
      </ul>
    </div>

  </section>
</Main>

<?php include ('./partials/footer.php') ?>