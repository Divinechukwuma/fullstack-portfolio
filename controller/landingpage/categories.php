<?php
require view("landingpage/categories.view.php");
require base_path("controller/landingpage/products.php");

// Sql query to fetch data from database

$sql = "SELECT * FROM tbl_category LIMIT 6";
$stmt = $conn->prepare($sql);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
  while ($row = $res->fetch_assoc()) {
    $id = $row['id'];
    $title = $row['title'];
    $imageName = $row['imageName'];
  }}
