<?php include('./partials/header.php') ?>

<section class="w-[80%] my-10 mx-auto" id="products">

  <div class="bg-unique-black md:md:block w-full font-sans text-center text-black p-5 ">
    <input class=" bg-white p-3 rounded pl-10 w-[60%]" type="text" placeholder="Search For Products">
    <button class="bg-project-bg-2 p-3 rounded ml-2 text-white">Search</button>
  </div>
</section>

<!-- || CATEGORY-->

<section class=" w-[80%] my-10 mx-auto">
  <div class="grid md:grid-rows-2 grid-flow-col gap-4 grid-rows-4">

    <?php

    //Sql query to fetch data from database

    $sql = "SELECT * FROM tbl_category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $imageName = $row['imageName'];

    ?>

        <div class="w-[300px] h-[300px] md:w-[500px] md:[500px] place-items-center">
          <?php
          if ($imageName == "") {
            //Image not available
            echo "image not found";
          } else {
            // Image available
            $imagePath = "../admin/images/goods" . $imageName;

            if (file_exists($imagePath)) {
          ?>
              <img src="<?php echo $imagePath; ?>" class="rounded-xl my-10" alt="">
          <?php
            } else {
              echo "Image not found";
            }
          }
          ?>
          <p class="absolute top-0 left-0 right-0 bottom-0 text-center text-white  flex items-center justify-center opacity-100  transition-opacity z-2 text-3xl font-extrabold">
            <a href="#" class="text-decoration-none "><?php echo htmlspecialchars($title) ?></a>
          </p>
        </div>





    <?php


      }
    }


    ?>
  </div>
</section>







<?php include('./partials/footer.php') ?>