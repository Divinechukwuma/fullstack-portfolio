<?php 
//Sql to get the data from the database
      $sql = "SELECT * FROM tbl_products ORDER BY imageName DESC";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $res = $stmt->get_result();

      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $id = $row['id'];
          $title = $row['title'];
          $description = $row['description'];
          $price = $row['price'];
          $imageName = $row['imageName']; // Fixed variable name
          $categoryId = $row['categoryId'];
        }}