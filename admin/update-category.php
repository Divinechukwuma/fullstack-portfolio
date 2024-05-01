<?php include('./partials/header.php') ?><br>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Update category</h1><br><br>
    <?php

    if (isset($_GET['id'])) {
        //Get the data

        $id = $_GET['id'];

        //sql query to get the data 

        $sql = "SELECT * FROM tbl_category WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $res = $stmt->get_result();

        //Fetch the data from form 
        $row = $res->fetch_assoc();

        $title = $row['title'];
        $CurrentImage = $row['imageName'];
        $featured = $row['featured'];
        $active = $row['active'];
    }


    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" Value="<?php echo htmlspecialchars($title); ?>">
                </td>
            </tr>

            <tr>
                <td>Current Image:</td>
                <td>
                    <?php
                    // Check whether we have an image or not 
                    if ($CurrentImage == "") {
                        // We do not have an image. Display an error message
                        echo "<div class='text-red-500 uppercase'> Image not added.</div>";
                    } else {
                        // We have an image, display the image 
                    ?>
                        <img src="./images/goods<?php echo htmlspecialchars($CurrentImage); ?> " width="150px">
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
                    <input type="hidden" name="currentImage" value="<?php echo $CurrentImage; ?>">
                    <input type="submit" name="submit" value="Update category" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>


        </table>
</div><br><br>
</form>

<?php
if (isset($_POST['submit'])) {

    // echo 'button clicked';
    //1.Get all the details from form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $CurrentImage = $_POST['currentImage'];
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

            if ($CurrentImage !== "") {
                //Current image is available
                //Remove the image 
                $Remove_path = "./images/goods" . $CurrentImage;

                $Remove = unlink($Remove_path);

                //Check whether the image is recovered or not

                if ($Remove == false) {
                    //Failed to remove the images is recovered or not 
                    $_SESSION['up'] = "<div class='text-red-500 uppercase'>Failed to remove current image.</div>";
                    //Redirect to food page
                    header('location:manage-category.php');
                    //stop process
                    die();
                }
            }
        } else {
            $imageName = $CurrentImage;
        }
    } else {
        $imageName = $CurrentImage;
    }

    //4.Update the food in database

    $sql2 = "UPDATE tbl_category SET 
        title = ?,
        imageName= ?,
        featured = ?,
        active = ?
        WHERE id = ?";

    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssssi", $title, $imageName, $featured, $active, $id);
    $stmt2->execute();
    $res2 = $stmt2->get_result();

    // Check whether the query is executed or not 
    if ($res2 === false) {
        // Query executed and menu updated 
        $_SESSION['updated'] = "<div class='text-green-500 uppercase'>products updated successfully.</div>";
        // Redirect
        header('location:manage-category.php');
    } else {
        // Failed to update
        $_SESSION['n-u'] = "<div class='text-red-500 uppercase'>Failed to update products.</div>";
        // Redirect
        header('location:manage-category.php');
    }
}
?>

<?php include('./partials/footer.php') ?>