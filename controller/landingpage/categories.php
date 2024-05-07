<?php
// Load configuration
$config = require base_path('config.php');

// Create Database instance
$db = new Database($config['database']);

// Prepare SQL query
$stmt = $db->query("SELECT * FROM tbl_category WHERE id = :id AND title = :title AND imageName = :imageName LIMIT 6", [
    'id' => htmlspecialchars($_GET['id']),
    'title' => htmlspecialchars($_GET['title']),
    'imageName' => htmlspecialchars($_GET['imageName'])
])->get();



// Require the view file
require view("landingpage/categories.view.php");

// Require the products controller file
require base_path("controller/landingpage/products.php");
// } else {
//     // Handle case where required parameters are not set
//     echo "Missing required parameters";
// }
