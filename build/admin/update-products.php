<?php include('./partials/header.php') ?><br>

<?php

    if (isset($_GET['id'])) {
        //Get the data

        $id = $_GET['id'];

        //sql query to get the data 

        $sql = "SELECT * FROM tbl_products WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $res = $stmt->get_result();

        //Fetch the data from form 
        $row = $res->fetch_assoc();

        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $currentImage = $row['imageName'];
        $current_category = $row['categoryId'];
        $featured = $row['featured'];
        $active = $row['active'];
    }


    ?>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Update Products</h1><br><br>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" Value="<?php echo htmlspecialchars($title); ?>">
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo htmlspecialchars($description) ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Prices:</td>
                <td>
                    <input type="number" name="price" value="<?php echo htmlspecialchars($price) ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    // Check whether we have an image or not 
                    if ($currentImage == "") {
                        // We do not have an image. Display an error message
                        echo "<div class='text-red-500 uppercase'> Image not added.</div>";
                    } else {
                        // We have an image, display the image 
                    ?>
                        <img src="./images/goods<?php echo htmlspecialchars($currentImage); ?> " width="150px">
                    <?php
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>Select new image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>


            <tr>
                <td>Category:</td>
                <td>
                    <select name="category">

                        <?php
                        // Query to get active categories
                        $sql = "SELECT * FROM tbl_category WHERE active='yes'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $res = $stmt->get_result();

                        // Count rows
                        $count = $res->num_rows;

                        // Check whether category is available or not
                        if ($count > 0) {
                            // Category available
                            while ($row = mysqli_fetch_assoc($res)) {
                                $category_title = $row['title'];
                                $category_id = $row['id'];

                                ?>
                                <option <?php if ($current_category == $category_id) {
                                                echo "selected";
                                            } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                            <?php
                            }
                        } else {
                            // Category not available
                            echo "<option value='0'>Category not available.</option>";
                        }
                        ?>

                    </select>
                </td>
            </tr>           

            <tr>
                <td>Featured:</td>
                <td>
                    <input <?php if ($featured == "yes") {
                                echo "checked";
                            } ?> type="radio" name="featured" value="yes">Yes
                    <input <?php if ($featured == "no") {
                                echo "checked";
                            } ?> type="radio" name="featured" value="no">No
                </td>
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input <?php if ($active == "yes") {
                                echo "checked";
                            } ?> type="radio" name="active" value="yes">Yes
                    <input <?php if ($active == "no") {
                                echo "checked";
                            } ?> type="radio" name="active" value="no">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="currentImage" value="<?php echo $currentImage; ?>">
                    <input type="submit" name="submit" value="Update Products" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>


        </table>

        <?php
if (isset($_POST['submit'])) {

    // echo 'button clicked';
    //1.Get all the details from form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $currentImage = $_POST['currentImage'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    //2.Upload the image if selected 
    //Check whether  upload button is clicked or not

    if (isset($_FILES['image']['name'])) {
        // New image name
        //Rename the image 
        $imageName = $_FILES['image']['name']; //New image name 

        //Check whether the file is available or not 
        if ($imageName != "") {

            //File type validation
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg','jfif','JPG'];
            $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExtensions)) {
                //Invalid file type
                //Handle accordingly (show error message)

                echo "Invalid file type. Allowed types: 'jpg','jpeg','png','gif','svg','jfif','JPG'";
            } else {

                //Image file limit
                $maxFileSize = 5 * 1024 * 1024; //5 mb

                if ($_FILES['image']['size'] > $maxFileSize) {

                    //File size exceeds the limit 
                    //Handle accordinly show error message (REJECT UPLOAD)

                    echo " File size exceeds the limit of 5 mb";
                } else {

                    //Sanitize file name
                    $imageName = preg_replace("/[^a-zA-Z0-9.]/", "_", basename($imageName));

                    //Prevent file overwriting
                    $imageName = "divine-products" . rand(0000, 9999) . '_' . time() . '.' . $ext;

                    //Move uploaded files to non-web accessible directory

                    $src =  $_FILES['image']['tmp_name'];
                    $dst = "./images/goods" . $imageName;

                    $Upload = move_uploaded_file($src, $dst);

                    //Check whether image uploded or not 
                    if ($Upload == false) {

                        //Failed to upload the image
                        //Redirect to add food page with error message
                        echo "failed to upload image";
                    }
                }
            }
            //3.Remove the image if new image is uploaded and current image exist
            //B.remove current image if available 

            if ($currentImage !== "") {
                //Current image is available
                //Remove the image 
                $Remove_path = "./images/goods" . $currentImage;

                $Remove = unlink($Remove_path);

                //Check whether the image is recovered or not

                if ($Remove == false) {
                    //Failed to remove the images is recovered or not 
                    $_SESSION['up'] = "<div class='text-red-500 uppercase'>Failed to remove current image.</div>";
                    //Redirect to food page
                    header('location:manage-products.php');
                    //stop process
                    die();
                }
            }
        } else {
            $imageName = $currentImage;
        }
    } else {
        $imageName = $currentImage;
    }

    // 4. Update the product in the database
    $sql2 = "UPDATE tbl_products SET 
        title = ?,
        price = ?,
        description = ?,
        imageName= ?,
        featured = ?,
        active = ?,
        categoryId = ?
        WHERE id = ? ";
         // Add categoryId to the query

    $stmt2 = $conn->prepare($sql2);
   $stmt2->bind_param("sdssssii", $title, $price, $description, $imageName, $featured, $active, $current_category, $id);

    $stmt2->execute();
    $res2 = $stmt2->get_result();

    // Check whether the query is executed or not
    if ($res2 === false) {
        // Query executed and product updated
        $_SESSION['updated'] = "<div class='text-green-500 uppercase'>Product updated successfully.</div>";
        // Redirect
        header('location:manage-products.php');
    } else {
        // Failed to update
        $_SESSION['n-u'] = "<div class='text-red-500 uppercase'>Failed to update product.</div>";
        // Redirect
        header('location:manage-products.php');
    }
}
?>

</div><br><br>
</form>



<?php include('./partials/footer.php'); ?>