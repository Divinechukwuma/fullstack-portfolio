<?php include('./partials/header.php'); ?> <br><br>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Add Products</h1><br><br>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    ?>

    <form action="" enctype="multipart/form-data" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of products">
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" cols="30" rows="5" placeholder="Description of products"></textarea>
                </td>
            </tr>

            <tr>
                <td>Prices:</td>
                <td>
                    <input type="number" name="price" placeholder="Price">
                </td>
            </tr>

            <tr>
                <td>Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>


            <tr>
                <td>Category</td>
                <td>
                    <select name="categoryId">
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
                                $title = $row['title'];
                                $id = $row['id'];

                                echo "<option value='" . $id . "'>" . $title . "</option>";
                            }
                        } else {
                            // No category found
                            echo "<option value='0'>No category found</option>";
                        }
                        ?>


                    </select>
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="yes">yes
                    <input type="radio" name="featured" value="no">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="yes">yes
                    <input type="radio" name="active" value="no">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Add Products" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>




        </table>

        <?php

        if (isset($_POST['submit'])) {

            // echo 'im awesome';
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $categoryId = $_POST['categoryId'];

            //when using radio button make sure it is checked

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } else {
                $featured = "no";
            }
            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "no";
            }

            // || FILE UPLOAD

            //Check whether the image is selected or not
            if (isset($_FILES['image']['name'])) {

                $imageName = $_FILES['image']['name'];

                //File type validation
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'jfif', 'JPG'];
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
            } else {
                $imageName = ""; //setting default value to false 
            }




            //sql query to insert the data into the data base
            $sql = "INSERT INTO tbl_products (title,price,description,imageName,categoryId,featured,active) VALUES(?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sdssdss', $title, $price, $description, $imageName, $categoryId, $featured, $active);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Data inserted
                $_SESSION['add'] = "<div class='text-green-500 uppercase'>Product Added successfully.</div>";

                header("location: manage-products.php");
            } else {
                // Failed to insert data
                $_SESSION['add'] = "<div class='text-red-500 uppercase'>Failed to add product.</div>";
                header("location: add-products.php");
            }

            $stmt->close();
        }

        ?>

</div><br><br>
</form>

<?php include('./partials/footer.php'); ?>