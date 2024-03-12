<?php include('./partials/header.php') ?>

<?php
//Check whether id is passed or not
if (isset($_GET['categoryId'])) {
    //Category id is set and get the id 
    $CategoryId = $_GET['categoryId'];
    //Get the category title based on category id
    $sql = "SELECT * FROM tbl_category WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('d', $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($row = $res->fetch_assoc()) {

        // Check if a valid row is fetche
        // Get the title
        $CategoryTitle = $row['title'];
    } else {
        // Handle the case where no category is found with the given id
        echo "Category not found";
    }
} else {
    //Category not passed 
    //Redirect to home page
    header('location:index.php');
}

?>


<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>products On <a href="#" class="text-white">"<?php echo htmlspecialchars($CategoryTitle); ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Products</h2>
        <?php
        // Create sql query to get foods based on the selected category 
        $sql2 = "SELECT * FROM tbl_products WHERE categoryId=?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param('d', $CategoryId);
        $stmt2->execute();
        $res2 = $stmt2->get_result();

        $count = $res2->num_rows; // Corrected the variable name

        // Check whether food is available or not
        if ($count > 0) {
            // Food is available
            while ($row2 = $res2->fetch_assoc()) { // Corrected the variable name
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
        ?>
                <div class="food-menu-box mt-8 p-4 bg-white rounded-lg shadow-md">
                    <div class="food-menu-img">
                        <?php
                        // Check if the image is available 
                        if ($image_name == "") { // Corrected the variable name
                            // Image not available
                            echo "<div class='text-red-600'>Image not available</div>";
                        } else {
                            // Image available
                        ?>
                            <img src="../admin/images/goods/<?php echo htmlspecialchars($image_name); ?>" alt="Products" class="w-full h-48 object-cover rounded-md">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc mt-4">
                        <h4 class="text-xl font-semibold"><?php echo htmlspecialchars($title); ?></h4>
                        <p class="text-gray-700">$<?php echo htmlspecialchars($price); ?></p>
                        <p class="text-gray-600"><?php echo htmlspecialchars($description); ?></p>

                        <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"> <a href="cart.php?categoryid=<?php echo htmlspecialchars($id); ?>"> Cart 🛒 </a> </button>
                    </div>
                </div>
        <?php
            }
        } else {
            // Food not available
            echo "<div class='text-red-600 mt-8'>Food not available.</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>

<!-- fOOD Menu Section Ends Here -->

<?php include('./partials/footer.php') ?>