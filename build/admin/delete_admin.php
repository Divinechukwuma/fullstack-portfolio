<?php 
include('./config/database.php') ;

//First get the id from the manage admin page

if(isset($_GET['id'])){

//Then confirm the id

$id = $_GET['id'];

//The the sql query to delete from databse

$sql = "DELETE  FROM tbl_admin WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i',$id);
$stmt->execute();
$res = $stmt->get_result();

if ($res===true) {
    //data inserted
    //create a session variabe to display message 
    $_SESSION['del'] = "<div class='text-green-500'>Admin Deleted successfully.</div>";

    //redirect page to manage admin
    header("location: manage-admin.php"); //use a SITEURL constant 

} else {
    //failed to insert data
    //create a session variabe to display message 
    $_SESSION['delete'] = "<div class='text-red-500'>Failed To Delete admin.</div>";

    //redirect page to add admin
    header("location: manage-admin.php"); //use a SITEURL constant 

}

}

$stmt->close();
$conn->close();

?>