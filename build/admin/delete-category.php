<?php include('./config/database.php') ?>

<?php
//Get the id 

if (isset($_GET['id']) && isset($_GET['imageName'])) {

    //echo "im cool";

    $id = $_GET['id'];
    $imageName = $_GET['imageName'];

    //first delte image if image exist 

    if ($imageName != "") {

        $path = "./images/goods" . $imageName;

        $remove = unlink($path);

        if ($remove == true) {

            $_SESSION['delete'] = "<div class='text-green-500 uppercase'>Image remove successfully.</div>";

            header('location: manage-category.php');
            //Stop the process of deleted food image
            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
   

    if ($stmt->affected_rows > 0 ) {

        //Products deleted successfully 
        $_SESSION['del'] = "<div class='text-green-500 uppercas  '>products deleted successfully</div>";
        header("location:manage-category.php");
    } else {

        //food not deleted 

        $_SESSION['del'] = "<div class='text-red-500 uppercase'>products failed to delete</div>";
        header("location:manage-category.php");
    }
} else {
    //redirect to product page
    $_SESSION['delete'] = "<div class='text-red-500 uppercase'>Unauthorized Access</div>";
    header('location:manage-category.php');
}

?>
