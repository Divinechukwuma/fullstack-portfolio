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
        <a href="#testimonials" class="hover:text-font-color-hover font-sans">Category</a>
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

    <div class="bg-unique-black md:ml-[30rem] ml-20 hidden md:block">
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


    <!--- || PRODCUTS-->
    <section class="w-[80%] " id="products">

      <div class="bg-project-bg-2 md:ml-[30rem] ml-20">
        <h1 class="font-sans text-3xl font-bold text-center text-white p-4">Buy And Order</h1>
      </div>

    </section>
    <!-- || CATEGORY-->


    <section>
      <div class=" bg-font-color p-10  md:mx-[30rem] mx-10 my-10">
        
      <ul
          class="list-none ml-10 mx-auto my-12 flex flex-wrap items-center gap-8"
        >
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[30%]">
            <img
              src="img/pexels-pixabay-532826.jpg"
              alt="pexels-flo-dahm-699466"
              class="mb-6 h-40 rounded-3xl"
            />
            <h3
              class="text-2xl sm:text-3xl text-left mt-2 text-white font-extrabold before:font-serif before:absolute before:top-50 before:center-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              EIFFLE TOWER:
            </h3>
            <p
              class="text-2xl sm:text-3xl text-left mt-2 text-white before:font-serif before:absolute before:top-0 before:left-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              We take you too the most popular tourist attraction in france
            </p>
          </li>
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[30%]">
            <img
              src="img/pexels-pixabay-532826.jpg"
              alt="pexels-flo-dahm-699466"
              class="mb-6 h-40 rounded-3xl"
            />
            <h3
              class="text-2xl sm:text-3xl text-left mt-2 text-white font-extrabold before:font-serif before:absolute before:top-50 before:center-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              EIFFLE TOWER:
            </h3>
            <p
              class="text-2xl sm:text-3xl text-left mt-2 text-white before:font-serif before:absolute before:top-0 before:left-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              We take you too the most popular tourist attraction in france
            </p>
          </li>
  
          <li class="bg-font-color-hover py-1 px-4 rounded-3xl shadow-xl w-[30%]">
            <img
              src="img/pexels-pixabay-532826.jpg"
              alt="pexels-flo-dahm-699466"
              class="mb-6 h-40 rounded-3xl"
            />
            <h3
              class="text-2xl sm:text-3xl text-left mt-2 text-white font-extrabold before:font-serif before:absolute before:top-50 before:center-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              EIFFLE TOWER:
            </h3>
            <p
              class="text-2xl sm:text-3xl text-left mt-2 text-white before:font-serif before:absolute before:top-0 before:left-0 before:text-9xl before:text-white before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-9xl after:text-white after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"
            >
              We take you too the most popular tourist attraction in france
            </p>
          </li>
  
          
        </ul>
        
      </div>

    </section>


  </Main>

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