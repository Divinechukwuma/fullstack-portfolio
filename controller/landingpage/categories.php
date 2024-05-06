<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

 $stmt = $db->query( "SELECT * FROM tbl_category WHERE id = :id, title = :title, imageName = :imageName  LIMIT 6",[
    'id' => $_GET['id'] ,
    'title' => $_GET['title'],
    'imageName' => $_GET['imageName']
 ]);

require view("landingpage/categories.view.php");
require base_path("controller/landingpage/products.php");
