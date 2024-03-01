<?php include('./partials/header.php'); ?><br><br>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //sql to get the data from the form 

    $sql = "SELECT * FROM tbl_admin WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {

        $row = $res->fetch_assoc();
        $fullname = $row['fullname'];
        $username = $row['username'];
    } else {
        //redirect to manage-admin page

        header("location:manage-admin.php");
    }

   
}
if( isset($_SESSION['wow'])){
    echo $_SESSION['wow'];
    unset($_SESSION['wow']);
}

?>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Update Admin</h1><br><br>

    <form action="" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td> Full Name:</td>
                <td>
                    <input type="text" name="fullname" placeholder="Full Name" value="<?php echo htmlspecialchars($fullname); ?>">
                </td>
            </tr>

            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder="Your Name" value="<?php echo htmlspecialchars($username); ?>">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Admin" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>


        </table>
</div><br><br>
</form>



<?php include('./partials/footer.php'); ?>

<?php
if (isset($_POST['submit'])) {

    // Get data from the form 

    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];

    //error handling 

    if (empty($fullname) || empty($username)) {
        $_SESSION['wow'] = "<div class='text-red-500 uppercase'>all input must be filled.</div>";
        //Redirect
        header("locaton:update-admin.php");
    }

    //sql to update the admin

    $sql2 = "UPDATE tbl_admin SET fullname = ?,username = ? WHERE id=?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssi",$fullname,$username,$id);
    $stmt2->execute();

    if($stmt2->affected_rows > 0){

        //Seesion message and redirect it 
        $_SESSION['wow'] = "<div class='text-green-500 uppercase'>admin updated successfully.</div>";
        //Redirect
        header('location:manage-admin.php');
    
    }else{
         //Seesion message and redirect it 
         $_SESSION['wow'] = "<div class='text-red-500 uppercase'>admin failed update .</div>";
         //Redirect
         header('location:update-admin.php');
    }
}


?>