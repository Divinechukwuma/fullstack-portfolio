<?php include '../admin/partials/header.php'; ?><br><br>

<?php
if (isset($_SESSION['add'])) {
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

?>

<?php
if (isset($_SESSION['delete'])) {
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

?>

<?php
if (isset($_SESSION['del'])) {
    echo $_SESSION['del'];
    unset($_SESSION['del']);
}

?>


<div class="my-10">
    <a class="  p-6  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color m-10" href="add-products.php"> Add Products</a>


    <div class="m-10 pb-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <thead>
                    <tr class="text-4xl">
                        <th class="p-6">S.N</th>
                        <th class="p-6">Title</th>
                        <th class="p-6">Discription</th>
                        <th class="p-6">Prices</th>
                        <th class="p-6">Image-Name</th>
                        <th class="p-6">Feature</th>
                        <th class="p-6">Active</th>
                        <th class="p-6">Actions</th>
                    </tr>
                </thead><br>

                <?php

                //sql query to get data
                $sql = "SELECT * FROM tbl_products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $res = $stmt->get_result();
                $sn = 1;

                //fetch data from database

                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $imageName = $row['imageName'];
                        $featured = $row['featured'];
                        $active = $row['active'];

                ?>


                        <tbody class="text-xl border-t-0 border-gray-300">
                            <tr class="text-xl ">
                                <td class="p-6 border"><?php echo htmlspecialchars($sn++) ?></td>
                                <td class="p-6 border"><?php echo htmlspecialchars($title) ?></td>
                                <td class="p-6 border "><?php echo htmlspecialchars($description) ?></td>
                                <td class="p-6 border ">$<?php echo htmlspecialchars($price) ?></td>
                                <td class="p-6 border ">
                                    <?php
                                    // Check whether we have an image or not 
                                    if ($imageName == "") {
                                        // We do not have an image. Display an error message
                                        echo "<div class='text-red-500 uppercase'> Image not added.</div>";
                                    } else {
                                        // We have an image, display the image 
                                    ?>
                                        <img src="./images/goods<?php echo htmlspecialchars($imageName); ?> " width="150px">
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="p-6 border "><?php echo htmlspecialchars($featured) ?></td>
                                <td class="p-6 border "><?php echo htmlspecialchars($active) ?></td>
                                <td class=" p-6 border"><a class="  p-5  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color" href="update-products.php?id=<?php echo $id; ?>"> Update Products</a></td>
                                <td class="p-2 border"><a class="  p-5  rounded-xl  bg-red-300 hover:bg-red-600 text-font-color" href="delete-products.php?id=<?php echo $id ?>&imageName=<?php echo $imageName ?>"> Delete Products</a></td>
                            </tr>
                        </tbody>



                <?php

                    }
                }



                ?>

            </table>
        </form>

    </div>

</div>

<?php include '../admin/partials/footer.php'; ?>