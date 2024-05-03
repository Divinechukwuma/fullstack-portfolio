<?php require view('partials/header.php') ?>
<?php require view('partials/hero.php') ?>


<!--- || CATEGORIES-->
<section class="w-[80%] my-10 mx-auto" id="category">

  <div class="bg-project-bg-2 md:md:block w-full font-sans text-center text-white p-5 ">
    <h1 class="text-center text-3xl font-extrabold">Categories</h1>
  </div>
</section>

<!-- || CATEGORY-->


<section class="w-[80%] my-10 mx-auto">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

    <div class="relative overflow-hidden rounded-xl my-10">
      <?php
      if ($imageName == "") {
        // Image not available
        echo "Image not found";
      } else {
        // Image available
        $imagePath = "./admin/images/goods" . $imageName;

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
        <a href="category-products.php?categoryId=<?php echo htmlspecialchars($id); ?>" class="text-decoration-none"><?php echo htmlspecialchars($title) ?></a>
      </div>
    </div>
  </div>
</section>

<?php require view('landingpage/products.view.php') ?>
