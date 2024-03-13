<?php include('./partials/header.php') ?>

<?php
// Check whether id is passed or not
if (isset($_GET['categoryId'])) {
    //Category id is set, get the id
    $categoryId = $_GET['categoryId'];
    //Get the category title based on category id
    $sql = "SELECT * FROM tbl_category WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('d', $categoryId);
    $stmt->execute();
    $res = $stmt->get_result();

    $count = $res->num_rows;

    if ( $count >0 ) {
        //  Get the title
        $row = $res->fetch_assoc(); // Fetch the row
        
        $categoryTitle = $row['title'];
    } else {
        //Handle the case where no category is found with the given id
        echo "Category not found";
        exit;  //Stop execution to avoid displaying further content
    }
} else {
    // Category not passed
    //  Redirect to the home page
    header('location:index.php');
    exit;  //Stop execution after redirect
}
?>

<!-- FOOD SEARCH Section Starts Here -->
<section class="w-[80%] my-10 mx-auto" >

    <div class="bg-project-bg-2 md:md:block w-full font-sans text-center text-white p-10  ">
        <h1 class="text-center  text-3xl font-extrabold"><a href=""> Products Of <?php echo htmlspecialchars($categoryTitle) ?></a></h1>
    </div>
</section>
<!-- FOOD SEARCH Section Ends Here -->

<!-- FOOD MENU Section Starts Here -->
<section>
    <div class="bg-font-color w-[80%] my-10 mx-auto">
        <h1 class="font-sans text-3xl font-bold text-center text-black p-1">Available for sale</h1>
        <ul class="grid md:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-4">

            <?php
            // Check if categoryId is set
            if (isset($_GET['categoryId'])) {
                // Get the categoryId
                $categoryId = $_GET['categoryId'];

                // SQL to get the data from the database
                $sql2 = "SELECT * FROM tbl_products WHERE categoryId = ? ORDER BY imageName DESC";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param('d', $categoryId);
                $stmt2->execute();
                $res2 = $stmt2->get_result();

                if ($res2->num_rows > 0) {
                    while ($row2 = $res2->fetch_assoc()) {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $imageName = $row2['imageName'];
            ?>
                        <li class="bg-font-color-hover py-2 px-7 rounded-3xl shadow-xl w-[230px] mx-auto my-5 lg:[400px]">
                            <p class="text-project-bg font-extrabold md:ml-[8rem] mb-5">$<?php echo htmlspecialchars($price) ?> ᐳ</p>
                            <div>
                                <?php
                                if ($imageName == "") {
                                    // Image not available
                                    echo "Image not available";
                                } else {
                                    // Image available
                                    $imagePath = "../admin/images/goods" . $imageName;

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
                            <button class="border rounded-xl bg-project-bg-2 p-2 text-2xl text-white"> <a href="cart.php?categoryid=<?php echo htmlspecialchars($id); ?>"> Cart 🛒 </a> </button>
                        </li>
            <?php
                    }
                } else {
                    echo "No products available for this category.";
                }
            } else {
                // CategoryId not set
                echo "Category not selected.";
            }
            ?>
        </ul>
    </div>
</section>

<!-- fOOD Menu Section Ends Here -->

<?php include('./partials/footer.php') ?>