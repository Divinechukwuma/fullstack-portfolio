<?php
include('./partials/header.php');

// Check if the cart session variable exists
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cartIds = $_SESSION['cart'];

    // Display the products in the cart
    echo '<div class="bg-font-color w-[80%] my-10 mx-auto">';
    echo '<h2 class="font-sans text-3xl font-bold text-black p-1">Products in Cart:</h2>';
    echo '<ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">';
    foreach ($cartIds as $cartId) {
        // Fetch product details from the database
        $sql = "SELECT * FROM tbl_products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $cartId);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            // Display product details
            ?>
            <li class="py-2 px-7 rounded-3xl shadow-xl w-[300px] my-5 lg:[400px]">
                <p class="text-unique-black font-extrabold mb-5 text-xl"> <img src="./productimages/icons8-naira-24.png" alt="" class="inline"><?php echo htmlspecialchars($row['price']); ?></p>
                <div>
                    <?php
                    $imagePath = "../admin/images/goods" . $row['imageName'];
                    if ($row['imageName'] == "" || !file_exists($imagePath)) {
                        echo "Image not available";
                    } else {
                        ?>
                        <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['title']; ?>" class="rounded-xl max-h-32 max-w-32">
                    <?php
                    }
                    ?>
                </div>
                <h3 class="text-2xl sm:text-3xl text-left mt-2 text-project-bg font-bold  before:font-serif before:absolute before:top-50 before:center-0 before:text-2xl before:text-project-bg before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-project-bg after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"><?php echo htmlspecialchars($row['title']); ?></h3>
                <p class="text-xl sm:text-xl text-left mt-2 text-black before:font-serif before:absolute before:top-0 before:left-0 before:text-xl before:text-black before:opacity-25 before:transform before:translate-x-2 before:translate-y-2 after:font-serif after:absolute after:-bottom-20 after:right-0 after:text-2xl after:text-black after:opacity-25 after:transform after:-translate-x-2 after:-translate-y-2"><?php echo htmlspecialchars($row['description']); ?></p>
                <form action="remove_from_cart.php" method="post">
                    <input type="hidden" name="cartId" value="<?php echo $cartId; ?>">
                    <button type="submit" class="border rounded-xl bg-red-500 p-2 text-2xl text-white">Remove From Cart</button>
                </form>
            </li>
    <?php
        }
    }
    echo '</ul>';
    echo '</div>';
} else {
    // Cart is empty
    echo "<h2>Your cart is empty.</h2>";
}
?>

<div class="bg-font-color w-[80%] my-10 mx-auto">
    <h2 class="font-sans text-3xl font-bold text-black p-1">Checkout:</h2>
    <form action="place_order.php" method="post" class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold text-black">Name:</label>
            <input type="text" id="name" name="name" class="mt-1 px-4 py-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-lg font-semibold text-black">Email:</label>
            <input type="email" id="email" name="email" class="mt-1 px-4 py-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="address" class="block text-lg font-semibold text-black">Address:</label>
            <textarea id="address" name="address" rows="4" class="mt-1 px-4 py-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="phone" class="block text-lg font-semibold text-black">Phone:</label>
            <input type="text" id="phone" name="phone" class="mt-1 px-4 py-2 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="col-span-2">
            <button type="submit" class="border rounded-xl bg-blue-500 p-2 text-2xl text-white">Place Order</button>
        </div>
    </form>
</div>

<?php include('./partials/footer.php'); ?>
