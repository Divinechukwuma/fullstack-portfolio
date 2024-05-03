<!-- Categories-->

<section class="w-[80%] my-10 mx-auto">

  <div class="bg-project-bg-2 md:md:block w-full font-sans text-center text-white p-5 ">
    <h1 class="text-center text-3xl font-extrabold">BUY And Order</h1>
  </div>
</section>

<div class=" bg-font-color-hover w-[80%] my-10 mx-auto " id="products">
  <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Available for sale</h1>
  <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

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
          $imagePath = "./admin/images/goods" . $imageName;

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

  </ul>
</div>

</section>
</Main>

<?php require view('partials/footer.php') ?>