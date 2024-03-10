<?php include('./partials/header.php') ?>

<section class="w-[80%] my-10 mx-auto" id="products">

  <div class="bg-unique-black md:md:block w-full font-sans text-center text-black p-5 ">
    <input class="bg-white p-3 rounded pl-10 w-[60%]" type="text" placeholder="Search For Products">
    <button class="bg-project-bg-2 p-3 rounded ml-2 text-white">Search</button>
  </div>
</section>

<!-- || CATEGORY-->

<section class="w-[80%] my-10 mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <?php

    // Sql query to fetch data from database

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
          <div class="absolute inset-0 flex items-center justify-center text-black text-3xl font-extrabold bg-white hover:underline bg-opacity-50 transition-opacity opacity-0 hover:opacity-100">
            <a href="#" class="text-decoration-none"><?php echo htmlspecialchars($title) ?></a>
          </div>
        </div>

    <?php
      }
    }
    ?>
  </div>
</section>

<?php include('./partials/footer.php') ?>
