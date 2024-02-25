<?php include ('./partials/header.php'); ?> <br><br>

<div class="max-w-8xl">
    <h1 class=" text-4xl ml-10 font-extrabold">Add Products</h1><br><br>

    <form action="" method="POST">
        <table class="w-[30%] ml-20">

            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of products">
                </td>
            </tr>

            <tr>
                <td>Description:</td>
                <td>
                  <textarea name="description" cols="30" rows="5" placeholder="Description of food"></textarea>
                </td>
            </tr>

            <tr>
                <td>Prices:</td>
                <td>
                    <input type="number" name="price" placeholder="Price">
                </td>
            </tr>

            <tr>
                <td>Image:</td>
                <td>
                    <input type="file" name="image-name">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" value="yes">yes
                    <input type="radio" name="featured" value="no">No
                </td>
            </tr>

            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" value="yes">yes
                    <input type="radio" name="active" value="no">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Add Products" class="bg-project-bg-2 p-4 rounded-xl mt-3 hover:bg-blue-900 text-white">
                </td>
            </tr>

            


        </table>
</div><br><br>
</form>

<?php include ('./partials/footer.php'); ?>