<!-- <?php include('./partials/header.php') ?>

 FOOD SEARCH Section Starts Here
<section class="food-search text-center bg-gray-100 py-20">
    <div class="container mx-auto">
        <?php
        // // Get the search keyword
        // $search = isset($_POST['search']) ? $_POST['search'] : '';

        // if (!empty($search)) {
        //     // If search keyword is not empty, display it
        //     echo '<h2 class="text-4xl font-bold mb-4">Foods on Your Search <span class="text-red-500">"' . htmlspecialchars($search) . '"</span></h2>';
        // }
        ?>
    </div>
</section>
FOOD SEARCH Section Ends Here 

<?php
// if (!empty($search)) {
//     // If search keyword is not empty, execute search query
//     //sql query to get foods based on search keyword
//     $sql = "SELECT * FROM tbl_products WHERE title LIKE '%$search%'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $res = $stmt->get_result();

//     $count = $res->num_rows;

//     //Check whether food available or not 
//     if ($count > 0) {
        //Food available
?>
        FOOD MENU Section Starts Here
        <section class="pb-20">
            <div class="container mx-auto">
                <h2 class="text-center text-4xl font-bold text-unique-black mb-12">Products We Sell</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    // while ($row = $res->fetch_assoc()) {
                    //     // Get the details
                    //     $id = $row['id'];
                    //     $title = $row['title'];
                    //     $price = $row['price'];
                    //     $description = $row['description'];
                    //     $imageName = $row['imageName'];
                    ?>
                        <div class="food-menu-box bg-white rounded-lg overflow-hidden shadow-lg m-5">
                            <div class="food-menu-img">
                                <?php
                                // if ($imageName == "") {
                                //     // Image not available
                                //     echo "Image not available";
                                // } else {
                                //     // Image available
                                //     $imagePath = "../admin/images/goods" . $imageName;

                                //     if (file_exists($imagePath)) {
                                // ?>
                                //         <img src="<?php echo $imagePath; ?>" alt="<?php echo $title; ?>" class="rounded-xl max-h-32 max-w-32">
                                // <?php
                                //     } else {
                                //         echo "Image not found";
                                //     }
                                // }
                                ?>
                            </div>

                            <div class="food-menu-desc p-6">
                                <h4 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($title); ?></h4>
                                <p class="food-price text-lg font-semibold text-gray-700">$<?php echo htmlspecialchars($price); ?></p>
                                <p class="food-detail text-gray-600 mt-2">
                                    <?php echo htmlspecialchars($description); ?>
                                </p>
                                <button class="mt-4 block w-full px-4 py-2 bg-project-bg-2 text-white text-lg font-semibold rounded-md shadow-md hover:bg-red-600">
                                    <a href="cart.php?cartId=<?php echo htmlspecialchars($id); ?>">Add To Cart</a>
                                </button>
                            </div>
                        </div>
                    <?php
                    // }
                    ?>
                </div>
            </div>
        </section>
     FOOD MENU Section Ends Here 
    <?php
//     } else {
//         //Food not available
//         echo "<div class='error text-center text-red-500 font-bold'>Food not found</div>";
//     }
// }
?>

<?php include('./partials/footer.php'); ?> -->
