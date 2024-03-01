<?php include '../admin/partials/header.php'; ?><br><br>

<?php
if (isset($_SESSION['add'])) //checking if the session is set or not 
{

    echo $_SESSION['add']; //addding sessiong message 
    unset($_SESSION['add']); //removing session message 
}
if (isset($_SESSION['del'])) //checking if the session is set or not 
{

    echo $_SESSION['del']; //addding sessiong message 
    unset($_SESSION['del']); //removing session message 
}
if (isset($_SESSION['delete'])) //checking if the session is set or not 
{

    echo $_SESSION['delete']; //addding sessiong message 
    unset($_SESSION['delete']); //removing session message 
}


if (isset($_SESSION['wow'])) //checking if the session is set or not 
{

    echo $_SESSION['wow']; //addding sessiong message 
    unset($_SESSION['wow']); //removing session message 
}

if (isset($_SESSION['pass'])) //checking if the session is set or not 
{

    echo $_SESSION['pass']; //addding sessiong message 
    unset($_SESSION['pass']); //removing session message 
}



?>

<div class="my-10">
    <a class="  p-6  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color m-10" href="add-admin.php"> Add Admin </a>

    <div class="m-10 w-[80%] pb-5">
        <table>
            <thead>
                <tr class="text-4xl">
                    <th class="p-6">S.N</th>
                    <th class="p-6">Full-Name</th>
                    <th class="p-6">Username</th>
                    <th class="p-6">Actions</th>
                    <h1>omo sha</h1>
                </tr>
            </thead><br>
            <?php

            //The the sql too pull the data from the database
            $sql  = "SELECT * FROM tbl_admin";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $res = $stmt->get_result();
            $sn = 1;

            if ($res->num_rows > 0) {

                //Fetch the data from the database

                while ($row = $res->fetch_assoc()) {
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $username = $row['username'];
            ?>

                    <tbody class="text-xl border-t-0 border-gray-300">
                        <tr class="text-xl ">
                            <td class="p-6 border"><?php echo htmlspecialchars($sn++); ?></td>
                            <td class="p-6 border"><?php echo htmlspecialchars($fullname); ?></td>
                            <td class="p-6 border "><?php echo htmlspecialchars($username); ?></td>
                            <td class="p-2 border"><a class="  p-5  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color" href="update-admin.php?id=<?php echo $id; ?>"> Update Admin</a></td>
                            <td class="p-2 border"><a class="  p-5 rounded-xl  bg-green-300 hover:bg-green-600 text-font-color" href="update-password.php?id=<?php echo $id ?>"> Change Password </a></td>
                            <td class="p-2 border"><a class="  p-5  rounded-xl  bg-red-300 hover:bg-red-600 text-font-color" href="delete_admin.php?id=<?php echo $id ?>"> Delete Admin </a></td>
                        </tr>
                    </tbody>

            <?php
                }
            } else {
                echo "failed to add";
            }

            $stmt->close();
            $conn->close();


            ?>

        </table>
    </div>

</div>

<?php include '../admin/partials/footer.php'; ?>