<?php include '../admin/partials/header.php'; ?><br><br>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Add Admin</h1><br><br>

      <form action="" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" name="full-Name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Username:</td>
                <td>
                    <input  type="text" name="username" placeholder="Your Name">
                </td>
            </tr>

            <tr>
                <td>Password:</td>
                <td>
                    <input  type="text" name="password" placeholder="Your Password">
                </td>
            </tr>

            <tr>
                <td>
                    <button name="submit" class="bg-blue-400 text-white p-4 rounded-xl mt-4 hover:bg-blue-900">Add admin </button>
                </td>
               </tr>


        </table>
</div><br><br>
</form>

<?php include '../admin/partials/footer.php';
