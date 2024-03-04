<?php include('./config/database.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIVINE-ONLINE-SHOP</title>
  <script src="./jquery/jquery (2).js"> </script>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- <script src="./javascript/slider.js" defer></script> -->
</head>

<body class="min-h-screen bg-font-color-hover">
  <header class="bg-project-bg text-white sticky top-0 z-10">
    <section class="max-w-8xl mx-auto p-4 flex justify-between items-center">
      <h1 class="text-3xl font-medium">
        <a href="#hero"><span class="text-yellow-300 font-serif">🌏Divine-</span>Online-Shop
        </a>
      </h1>

      <button id="hamburger-button" class="text-3xl sm:block md:hidden cursor-pointer">
        &#9776;
      </button>

      <nav class="hidden md:block space-x-3 text-xl" aria-label="main">
        <a href="#place" class="hover:text-font-color-hover  font-sans">Home</a>
        <a href="#category" class="hover:text-font-color-hover font-sans scroll-smooth">Category</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Cart 🛒</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Order</a>
        <a href="#contact" class="hover:text-font-color-hover font-sans">Contact Us </a>
        <a href="#contact" class="hover:text-font-color-hover font-sans md:hidden sm:block">🔍search </a>
      </nav>
      <!-- <section
          id="mobile-menu"
          class="absolute top-0 bg-[#733a26] w-full text-5xl flex-col h-[88rem] origin-top animate-open-menu hidden"
        >
          this is the first variation of the hamburger icon buton 
          <button class="text-8xl self-end px6">&times;</button>
          <nav
            class="flex flex-col min-h-screen items-center py-8"
            aria-label="mobile"
          >
            <a
              href="#hero"
              class="w-full text-center hover:opacity-90 py-6 text-white"
              >Home</a
            >
            <a
              href="#place"
              class="w-full text-center hover:opacity-90 py-6 text-white"
              >Places</a
            >
            <a
              href="#testimonials"
              class="w-full text-center hover:opacity-90 py-6 text-white"
              >Testimonials</a
            >
            <a
              href="#contact"
              class="w-full text-center hover:opacity-90 py-6 text-white"
              >Contact</a
            >
            <a
              href="#footer"
              class="w-full text-center hover:opacity-90 py-6 text-white"
              >Legal</a
            >
          </nav>
        </section> -->
    </section>
  </header>
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
      <div class="container mx-auto my-6">
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

    </section class="w-full md:w-[80%]">
    <!-- || CATEGORY-->

    <!--|| GADGETS-->

    <div class="bg-font-color p-2 md:mx-[30rem] mx-10 ">
      <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Gadgets</h1>
      <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center ">

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
            <li class="bg-font-color-hover py-1 px-4  rounded-3xl shadow-xl w-[20%] ">
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
        <ul class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center gap-8">

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

  <header class="bg-unique-black text-white sticky  z-10 py-2">
    <section class="max-w-8xl mx-auto text-center">
      <h1 class="text-3xl font-medium">
        <a href="#hero"><span class="text-yellow-300 font-serif">🌏Divine-</span>Online-Shop
        </a>
      </h1>

      <nav class="hidden md:block space-x-3 text-xl" aria-label="main">
        <a href="#place" class="hover:text-font-color-hover  font-sans">Home</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Category</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Cart 🛒</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Order</a>
        <a href="#contact" class="hover:text-font-color-hover font-sans">Contact Us </a>
        <a href="#contact" class="hover:text-font-color-hover font-sans md:hidden sm:block">🔍search </a>
      </nav>
      <h1 class="text-extrabold text-3xl">Follow us on</h1>
      <div class="flex justify-center py-4 ">
        <img src="../user/productimages/icons (1).png" alt="" class="max-h-10 max-w-10 p-2">
        <img src="../user/productimages/icons (2).png" alt="" class="max-h-10 max-w-10 p-2">
        <img src="../user/productimages/icons (3).png" alt="" class="max-h-10 max-w-10 p-2">
        <img src="../user/productimages/icons (4).png" alt="" class="max-h-10 max-w-10 p-2">
      </div>

    </section>
  </header>



  <script>
    $('.responsive').slick({
      dots: true,
      infinite: true,
      autoplay: true,
      nav: true,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  </script>
</body>

</html>