<?php include ('./partials/header.php'); ?><br><br>

<?php 
 if(isset($_GET['id'])){
      $id = $_GET['id'];
 }

 if(isset($_SESSION['pass'])){
    echo $_SESSION['pass'];
    unset($_SESSION['pass']);
 }

 if(isset($_SESSION['new'])){
    echo $_SESSION['new'];
    unset($_SESSION['new']);
 }
?>


<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Add Admin</h1><br><br>

    <form action="" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td>New passord:</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Update Paaword" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>


        </table>
</div><br><br>
</form>




<?php include ('./partials/footer.php'); ?>

<?php 

//Get the data from the from 

if(isset($_POST['submit'])){

    // echo "im awesome";
    $id = $_POST['id'];
     $new_password = $_POST['new_password'];
     $confirm_password = $_POST['confirm_password'];

     //ERROR HANDLING TO MAKE SURE THAT ALL INPUT MUST BE Filled

     if(empty($new_password) || empty($confirm_password)){
        $_SESSION['pass'] = "<div class='text-red-500 uppercase'>All input must be filled </div>";
        //redirect
        header("location:update-password.php");
        exit();
     }

     //Make sure that confirm pass word and new password are the same 

     if($new_password !== $confirm_password){
        $_SESSION['new'] = "<div class='text-red-500 uppercase'>Password doesn't match</div>";

        //Redirect
        header("location:update-password.php");
     }

     //Fist sql to retrive the password from the database 
     $sql = "SELECT password FROM tbl_admin WHERE id=?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param('i',$id);
     $stmt->execute();
     $res = $stmt->get_result();

     //Execute the query with a condition 

     if($res->num_rows >0){
        $row = $res->fetch_assoc();

        $currentPasswordFromDB = $row['password'];

        //Verify the password and call a command if there are the same thing 

       if( password_verify($new_password,$currentPasswordFromDB)){
       
        //A session message
        $_SESSION['new']= "<div class='text-green-500 uppercase'>Password is the same </div>";
        //Redirect
        header('location:update-password.php');

       }else{
         $hashedNewPassword = password_hash($new_password,PASSWORD_DEFAULT);

         //sql2 to update the password

         $sql2 = "UPDATE tbl_admin SET password = ? WHERE id=?";
         $stmt2 = $conn->prepare($sql2);
         $stmt2->bind_param('is',$hashedNewPassword,$id);
         $stmt2->execute();

         if($stmt->affected_rows > 0){
            //password updated successfully 
            $_SESSION['new'] = "<div class='text-green-500 uppercase'>password updated successfully";
            //Redirect 
            header("location: manage-admin.php");
         }else{
            //no rows affected

            $_SESSION['new'] = "<div class='text-red-500 uppercase'>password failed to update</div>";

            //Redirect 
            header("location:update-password.php");
         }
        


       }

     }else{
        //User doesn't exist

        echo 'User does  not exist ';
        die();
     }
}




?>