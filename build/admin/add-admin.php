<?php include '../admin/partials/header.php'; ?><br><br>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Add Admin</h1><br><br>
    <?php
    if (isset($_SESSION['add'])) //checking if the session is set or not 
    {

        echo $_SESSION['add']; //addding sessiong message 
        unset($_SESSION['add']); //removing session message 
    }
    ?>

    <form action="" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full-name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" name="username" placeholder="Your Name">
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" name="password" placeholder="Your Password">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Add Admin" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>


        </table>
</div><br><br>
</form>

<?php include '../admin/partials/footer.php'; ?>

<?php
//First check if the submit button  is clicked

if (isset($_POST['submit'])) {
    // echo "im awesome";
    //Get data from the form 
    $full_name = $_POST['full-name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //insert into the database
    $sql = "INSERT INTO tbl_admin (fullname,username,password) VALUE(?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $full_name, $username, $password);
    $res = $stmt->execute();

    if ($res == true) {
        //data inserted
        //create a session variabe to display message 
        $_SESSION['add'] = "<div class='text-green-500'>Admin Added successfully.</div>";

        //redirect page to manage admin
        header("location: manage-admin.php"); //use a SITEURL constant 

    } else {
        //failed to insert data
        //create a session variabe to display message 
        $_SESSION['add'] = "<div class='text-red-500'>Failed To add admin.</div>";

        //redirect page to add admin
        header("location: manage-admin.php"); //use a SITEURL constant 

    }
}

?>