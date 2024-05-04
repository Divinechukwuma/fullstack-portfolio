<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$sql = $db->query("SELECT * FROM tbl_products  WHERE id = :id, title = :title, description = :description, price = :price, imageName = :imageName, categoryId  = :categoryId   ORDER BY imageName DESC",[

  'id' => $_GET['id'],
  'title' => $_GET['title'],
  'description' => $_GET['description'],
  'price' => $_GET['price'],
  'imageName' => $_GET['imageName'],
  'categoryId' => $_GET['categoryId']
]);
      // $stmt = $conn->prepare($sql);
      // $stmt->execute();
      // $res = $stmt->get_result();

      // if ($res->num_rows > 0) {
      //   while ($row = $res->fetch_assoc()) {
      //     $id = $row['id'];
      //     $title = $row['title'];
      //     $description = $row['description'];
      //     $price = $row['price'];
      //     $imageName = $row['imageName']; // Fixed variable name
      //     $categoryId = $row['categoryId'];
      //   }}