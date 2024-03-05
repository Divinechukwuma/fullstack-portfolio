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
                <td>Image:</td>
                <td>
                    <input type="file" name="image">
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
</div><br><br>
</form>

<?php include('./partials/footer.php'); ?>
<?php

if (isset($_POST['submit'])) {

    // echo 'im awesome';
    $title = $_POST['title'];

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
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg','jfif'];
        $ext = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions)) {
            //Invalid file type
            //Handle accordingly (show error message)

            echo "Invalid file type. Allowed types: 'jpg','jpeg','png','gif','svg','jfif'";
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
    $sql = "INSERT INTO tbl_category (title,image_name,featured,active) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $title, $imageName, $featured, $active);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Data inserted
        $_SESSION['add'] = "<div class='text-green-500 uppercase'>category Added successfully.</div>";

        header("location: manage-category.php");
    } else {
        // Failed to insert data
        $_SESSION['add'] = "<div class='text-red-500 uppercase'>Failed to add category.</div>";
        header("location: add-category.php");
    }

    $stmt->close();
}

?>