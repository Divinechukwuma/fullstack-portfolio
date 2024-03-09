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

<body class=" bg-font-color-hover ">
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
        <a href="index.php" class="hover:text-font-color-hover  font-sans">Home</a>
        <a href="category.php" class="hover:text-font-color-hover font-sans scroll-smooth">Category</a>
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