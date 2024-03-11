<?php include('./config/database.php') ?>

<?php
//Get the id 

if (isset($_GET['id']) && isset($_GET['imageName'])) {

    //echo "im cool";

    $id = $_GET['id'];
    $imageName = $_GET['imageName'];

    //first delte image if image exist 

    if ($imageName != "") {

        $dir = "./images/goods/" . $imageName;
        
        if (file_exists($dir)) {
            $remove = unlink($dir);
            if ($remove) {
                // File successfully deleted
                $_SESSION['delete'] = "<div class='text-green-500 uppercase'>Image removed successfully.</div>";
                header('location: manage-products.php');
                // Stop the process after deleting the image
                die();
            } else {
                // Error in deleting the file
                echo "Error deleting file.";
            }
        } else {
            // File does not exist
            echo "File does not exist.";
        }
    }

    $sql = "DELETE FROM tbl_products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();


    if ($stmt->affected_rows > 0) {

        //Products deleted successfully 
        $_SESSION['del'] = "<div class='text-green-500 uppercas  '>products deleted successfully</div>";
        header("location:manage-products.php");
    } else {

        //food not deleted 

        $_SESSION['del'] = "<div class='text-red-500 uppercase'>products failed to delete</div>";
        header("location:manage-products.php");
    }
} else {
    //redirect to product page
    $_SESSION['delete'] = "<div class='text-red-500 uppercase'>Unauthorized Access</div>";
    header('location:manage-products.php');
}

?>
