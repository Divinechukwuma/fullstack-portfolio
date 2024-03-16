<?php include('./partials/header.php') ?>
<div id="order">

<?php if(isset($_GET['orderId'])){
     
     $orderId = $_GET['orderId'];
    //  echo "im too good";
     //sql query to get the data from the product

     $sql = "SELECT * FROM tbl_products WHERE id=?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param('d',$orderId);
     $stmt->execute();
     $res = $stmt->get_result();

     if($res->num_rows > 0){

        // echo "im too  good";

        

     }



} ?>

</div>



<?php include('./partials/footer.php') ?>