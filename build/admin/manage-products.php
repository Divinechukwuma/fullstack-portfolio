<?php include '../admin/partials/header.php'; ?><br><br>


<div class="my-10">
    <a class="  p-6  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color m-10" href="add-products.php"> Add Products</a>

    <div class="m-10 w-[80%] pb-5">
        <table>
            <thead>
                <tr class="text-4xl">
                    <th class="p-6">S.N</th>
                    <th class="p-6">Title</th>
                    <th class="p-6">Discription</th>
                    <th class="p-6">Prices</th>
                    <th class="p-6">Feature</th>
                    <th class="p-6">Active</th>
                    <th class="p-6">Actions</th>
                </tr>
            </thead><br>

                    <tbody class="text-xl border-t-0 border-gray-300">
                        <tr class="text-xl ">
                            <td class="p-6 border"></td>
                            <td class="p-6 border"></td>
                            <td class="p-6 border "></td>
                            <td class="p-6 border "></td>
                            <td class="p-6 border "></td>
                            <td class="p-6 border "></td>
                            <td class="p-2 border"><a class="  p-5  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color" href="update-admin.php?id=<?php echo $id; ?>"> Update Products</a></td>
                            <td class="p-2 border"><a class="  p-5  rounded-xl  bg-red-300 hover:bg-red-600 text-font-color" href="delete_admin.php?id=<?php echo $id ?>"> Delete Products</a></td>
                        </tr>
                    </tbody>

        </table>
    </div>

</div>

<?php include '../admin/partials/footer.php'; ?>