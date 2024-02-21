<?php include '../admin/partials/header.php'; ?>

<div class="my-10">
    <a class="  p-6  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color m-10" href="add-admin.php"> Add Admin </a>

    <div class="m-10">
        <table class="table-fixed ">
            <thead>
                <tr class="text-4xl">
                    <th class="p-10">S.N</th>
                    <th>Full-Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead><br><br>
            <tbody class="text-xl border-t border-gray-300">
                <tr class="text-xl ">
                    <td class="p-">1</td>
                    <td>Full-name</td>
                    <td>Username</td>
                    <td><a class="  p-5  rounded-xl  bg-project-bg-2 hover:bg-blue-900 text-font-color" href="add-admin.php"> Change Password</a></td>
                    <td><a class="  p-5 rounded-xl  bg-green-300 hover:bg-green-600 text-font-color" href="add-admin.php"> Update Admin </a></td>
                    <td><a class="  p-5  rounded-xl  bg-red-300 hover:bg-red-600 text-font-color" href="add-admin.php"> Delete Admin </a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<?php include '../admin/partials/footer.php'; ?>