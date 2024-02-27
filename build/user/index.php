<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIVINE-ONLINE-SHOP</title>
  <link rel="stylesheet" href="../css/style.css">

  <script src="./javascript/slider.js" defer></script>
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
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Category</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Cart</a>
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Order</a>
        <a href="#contact" class="hover:text-font-color-hover font-sans">Contact Us</a>
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
  <Main class="max-w-4xl">
    <section id="home">

      <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4"></h1>
        <div id="slider" class="relative overflow-hidden">
          <div class="carousel-inner">
            <!-- Images will be dynamically added here -->
          </div>
          <button id="prevBtn" class="prev-btn" onclick="prevSlide()">Previous</button>
          <button id="nextBtn" class="next-btn" onclick="nextSlide()">Next</button>
        </div>
      </div>

    </section>
  </Main>

</body>

</html>