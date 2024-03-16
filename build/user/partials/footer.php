<footer class="bg-unique-black text-white sticky  z-10 py-2 ">
    <section class="max-w-8xl mx-auto text-center">
        <h1 class="text-3xl font-medium">
            <a href="#hero"><span class="text-yellow-300 font-serif">🌏Divine-</span>Online-Shop
            </a>
        </h1>
  
        <nav class=" space-x-3 text-xl " aria-label="main">
        <a href="contact.php" class="hover:text-font-color-hover font-sans">Contact Us </a>
            <a href="about.php" class="hover:text-font-color-hover font-sans">About Us </a>
        </nav>
        <h1 class="text-extrabold text-3xl">Follow us on</h1>
        <div class="flex justify-center py-1">
            <a href="https://github.com/Divinechukwuma"><img src="productimages/icons8-github-64.png" alt="" class="max-h-10 max-w-10 p-2"></a>
            <a href="https://m.facebook.com/profile.php/?id=100074787875914&name=xhp_nt__fb__action__open_user"><img src="../user/productimages/icons (2).png" alt="" class="max-h-10 max-w-10 p-2"></a>
            <a href="https://twitter.com/divinechuk22549"><img src="../user/productimages/icons (3).png" alt="" class="max-h-10 max-w-10 p-2"></a>
            <a href="https://www.linkedin.com/me?trk=p_mwlite_feed_updates-secondary_nav"><img src="productimages/icons8-linkedin-96.png" alt="" class="max-h-10 max-w-10 p-2"></a>
        </div>
        <h1 class="text-extrabold text-3xl">payment method</h1>
        <div class="flex justify-center py-1 ">
            <img src="../user/productimages/americanexpress.png" alt="" class="max-h-10 max-w-10 p-2">
            <img src="../user/productimages/egold.png" alt="" class="max-h-10 max-w-10 p-2">
            <img src="../user/productimages/paypal.png" alt="" class="max-h-10 max-w-10 p-2">
            <img src="../user/productimages/visa.png" alt="" class="max-h-10 max-w-10 p-2">
            <img src="../user/productimages/mastercard.png" alt="" class="max-h-10 max-w-10 p-2">
        </div>

        <div class="flex justify-center py-1">

            <p class="text-right">Copyright &copy;<span id="year">2024</span></p>
            <p class="text-right">Divine chukwuma</p>

        </div>





    </section>
</footer>



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